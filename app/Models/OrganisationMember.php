<?php

namespace App\Models;

use App\Traits\SoftDeletesWithActiveFlag;
use Illuminate\Http\Request;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationMember extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag;

    protected $table = 'organisation_members';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = [
        'member_id', 'organisation_id', 'organisation_no', 'organisation_member_category_id', 'status', 'source',
        'approved', 'approved_by', 'active'
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMemberCategory() {
        return $this->belongsTo(OrganisationMemberCategory::class);
    }

    public function scopeInOrganisation($query, $organisaiton_id) {
        return $query->where('organisation_members.organisation_id', $organisaiton_id);
    }

    public function scopeActive($query) {
        return $query->where('organisation_members.active', 1);
    }

    public function scopeApproved($query) {
        return $query->where('organisation_members.approved', 1);
    }

    public function scopeUnapproved($query) {
        return $query->active()->where('organisation_members.approved', 0);
    }

    public function scopeOrganisationIds($query, int $member_id) {
        return $query->where('member_id', $member_id)->active()->approved()->get()->pluck('organisation_id')->all();
    }

    public function generateMembershipNo() {
        $category = $this->organisationMemberCategory;

        if( !$category || !$category->auto_gen_ids ) {
            return;
        }

        $nextID = $category->id_prefix . $category->id_next_increment . $category->id_suffix;
        $this->organisation_no = $nextID;
    }

    /**
     * Overriden to provide support for searching for members using multiple methods
     *
     * 1. Joins to the members table and adds fillables for fields in that table so users
     * can search on fields such as first_name, last_name, etc
     *
     * 2. Adds support for searching via generic search "term" which will find members using
     * fuzzy search logic
     */
    public function buildSearchParams(Request $request, $builder)
    {
        $this->fillable = array_merge($this->fillable, ['first_name', 'last_name', 'email', 'mobile_number', 'occupation', 'business_name']);
        $builder->approved()->active()
            ->join('members', 'members.id', '=', 'organisation_members.member_id')
            ->select('organisation_members.*');

        $builder = parent::buildSearchParams($request, $builder);

        if( $request->term ) {
            $term = $request->term;
            $builder->where(function($query) use($term) {
                return $query->where('members.first_name', 'like', "%{$term}%")
                    ->orWhere('members.last_name', 'like', "%{$term}%")
                    ->orWhere('members.email', 'like', "%{$term}%")
                    ->orWhere('members.mobile_number', 'like', "%{$term}%")
                    ->orWhere('members.business_name', 'like', "%{$term}%");
            });
        }

        return $builder;
    }

    public static function createDefaultMember(Organisation $organisation, OrganisationMemberCategory $category, OrganisationAccount $defaultAccount) {
        return self::create([
            'organisation_id' => $organisation->id,
            'member_id' => auth()->user()->member_id,
            'organisation_member_category_id' => $category->id,
            'approved' => 1,
            'approved_by' => $defaultAccount->id,
            'active' => 1
        ]);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $membership = $this;
        $member = $this->member;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("memberships")
            ->setDescriptionForEvent(function($eventName) use($member, $membership) {
                if( $eventName == 'created' ) {
                    return __('Added membership record for ":name"', [
                        'name' => $member->name
                    ]);
                }

                if( $eventName == 'updated' ) {
                    if( $membership->isDirty('approved') && $membership->approved == 1 ) {
                        return __("Approved membership application request for \":name\" ", [
                            'name' => $member->name
                        ]);
                    }

                    if( $membership->isDirty('active') && $membership->active == 0 ) {
                        return __("Rejected membership application request for \":name\" ", [
                            'name' => $member->name
                        ]);
                    }

                    return __('Updated member profile for ":name"', [
                        'name' => $member->name
                    ]);
                }
            });
    }
}
