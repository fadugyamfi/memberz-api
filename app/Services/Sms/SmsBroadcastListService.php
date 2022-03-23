<?php

namespace App\Services\Sms;

use App\Models\OrganisationMember;
use App\Models\SmsBroadcastList;
use App\Services\Sms\SmsBroadcastListFilterService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SmsBroadcastListService {

    public function __construct(
        private SmsBroadcastListFilterService $smsBroadcastListFilterService
    ) {
        $this->filterTypes = collect($this->smsBroadcastListFilterService->getFilters())->flatten(2);
    }

    public function getContacts(SmsBroadcastList $smsBroadcastList): Collection {
        return $this->getContactsQuery($smsBroadcastList)->get();
    }

    public function buildContactsQuery() {
        return OrganisationMember::selectRaw('DISTINCT organisation_members.*, members.*')
            ->selectRaw('organisation_member_categories.name as membership_category_name, organisation_members.id as membership_id')
            ->join('members', 'members.id', '=', 'organisation_members.member_id')
            ->leftJoin('organisation_member_categories', 'organisation_member_categories.id', '=', 'organisation_members.organisation_member_category_id')
            ->orderBy('members.last_name');
    }

    public function getContactsQuery(SmsBroadcastList $smsBroadcastList) {
        $query = $this->buildContactsQuery();
        $filters = $smsBroadcastList->filters;

        $requiredConditions = collect($filters)->filter(function($item) {
            return isset($item['optional']) && $item['optional'] == false;
        });

        $optionalConditions = collect($filters)->filter(function($item) {
            return isset($item['optional']) && $item['optional'] == true;
        });

        foreach($requiredConditions as $filter) {
            if( str_contains($filter['field'], 'membership__group') ) {
                $this->queryMembershipGroup($query, $filter);
            } else {
                $this->queryMembership($query, $filter);
            }
        }

        if( $optionalConditions && $query ) {
            $query->where(function($query) use($optionalConditions) {
                $query->orWhere(function($orQuery) use($optionalConditions) {
                    foreach($optionalConditions as $filter) {
                        if( str_contains($filter['field'], 'membership__group') ) {
                            $this->queryMembershipGroup($orQuery, $filter);
                        } else {
                            $this->queryMembership($orQuery, $filter);
                        }
                    }
                });
            });
        }

        return $query;
    }

    public function queryMembership($query, $filter): Builder {
        $field = $this->filterTypes->where('id', $filter['field'])->first();

        if( !$field ) {
            return $query;
        }

        return $this->applyFilterConditions($query, $field, $filter);
    }

    public function queryMembershipGroup($query, $filter): Builder {
        $field = $this->filterTypes->where('id', $filter['field'])->first();

        if( !$field ) {
            return $query;
        }

        if( !$this->isJoined($query, 'organisation_member_groups') ) {
            $query->leftJoin('organisation_member_groups', function($join) {
                $join->on('organisation_member_groups.organisation_member_id', 'organisation_members.id')
                    ->where('organisation_member_groups.active', 1);
            });
        }

        return $this->applyFilterConditions($query, $field, $filter);
    }

    function isJoined($query, $table): bool {
        return collect($query->getQuery()->joins)->pluck('table')->contains($table);
    }

    private function applyFilterConditions($query, $field, $filter): Builder {
        $column = isset($field['raw']) && $field['raw'] == true ? DB::raw($field['column']) : "{$field['table']}.{$field['column']}";

        switch($filter['condition']) {
            case '=':
            case '>':
            case '>=':
            case '<=':
            case '<':
            case '!=':
                if( $filter['optional'] ) {
                    $query->orWhere($column, $filter['condition'], $filter['value']);
                } else {
                    $query->where($column, $filter['condition'], $filter['value']);
                }
                break;

            case '%{s}':
            case '%{s}%':
            case '{s}%':
                if( $filter['optional'] ) {
                    $query->orWhere($column, 'like', str_replace('{s}', $filter['value'], $filter['condition']));
                } else {
                    $query->where($column, 'like', str_replace('{s}', $filter['value'], $filter['condition']));
                }
                break;
        }

        return $query;
    }
}
