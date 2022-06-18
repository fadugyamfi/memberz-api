<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use Illuminate\Http\Request;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationMemberGroup extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_groups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'organisation_member_id', 'organisation_group_id', 'created', 'modified', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMember() {
        return $this->belongsTo(OrganisationMember::class);
    }

    public function organisationGroup() {
        return $this->belongsTo(OrganisationGroup::class);
    }

    public function buildSearchParams(Request $request, $builder)
    {
        $builder = parent::buildSearchParams($request, $builder);

        // $builder->join('organisation_members', 'organisation_members.id', '=', 'organisation_member_groups.organisation_member_id')
        //     ->join('members', 'members.id', '=', 'organisation_members.member_id')
        //     ->orderBy('members.last_name');

        return $builder;
    }

    /**
     * Format user activities description for organisation member group
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $org_name = $this->organisation->name;
        $group = $this->organisationGroup->name;
        $member = $this->organisationMember->member->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("groups")
            ->setDescriptionForEvent(function (string $eventName) use ($member, $org_name, $group) {
                if ($eventName == 'created') {
                    return __("Assigned \":member\" to group \":group\"", [
                        "org_name" => $org_name,
                        'group' => $group,
                        'member' => $member
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated group assignment for \":member\" to \":group\"", [
                        "org_name" => $org_name,
                        'group' => $group,
                        'member' => $member
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Unassigned \":member\" from group \":group\"", [
                        "org_name" => $org_name,
                        'group' => $group,
                        'member' => $member
                    ]);
                }
            });
    }

}
