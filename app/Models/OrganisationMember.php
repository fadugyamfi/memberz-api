<?php

namespace App\Models;

use App\Models\Events\EventAttendee;
use App\Scopes\InActiveOrganisationScope;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use App\Traits\HasCakephpTimestamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Log;
use NunoMazer\Samehouse\BelongsToTenants;
use Spatie\Activitylog\LogOptions;

class OrganisationMember extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithActiveFlag, HasCakephpTimestamps, LogModelActivity;

    protected $table = 'organisation_members';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid', 'member_id', 'organisation_id', 'organisation_no', 'organisation_member_category_id', 'organisation_registration_form_id',
        'status', 'source', 'approved', 'approved_by', 'custom_attributes', 'active'
    ];

    protected $casts = ['custom_attributes' => 'array'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // static::addGlobalScope(new InActiveOrganisationScope);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMemberCategory() {
        return $this->belongsTo(OrganisationMemberCategory::class);
    }

    public function category() {
        return $this->belongsTo(OrganisationMemberCategory::class, 'organisation_member_category_id');
    }

    public function organisationRegistrationForm(){
        return $this->belongsTo(OrganisationRegistrationForm::class);
    }

    public function lastEventAttendance() {
        return $this->hasOne(EventAttendee::class, 'member_id', 'member_id')->latest();
    }

    public function lastContribution() {
        return $this->hasOne(Contribution::class)->latest();
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

    public function scopeMemberIds(Builder $query, int $organisaiton_id) {
        return $query->where('organisation_members.organisation_id', $organisaiton_id)->active()->approved()->get()->pluck('member_id')->all();
    }

    public function scopeBirthdayCelebrants(Builder $builder, $organisation_id) : Builder {
        return $builder->active()->approved()
           ->join('members', 'members.id', '=', 'organisation_members.member_id')
           ->where('organisation_members.organisation_id', $organisation_id)
           ->whereMonth('dob', '=', Carbon::now()->format('m'))
           ->whereDay('dob', '=', Carbon::now()->format('d'))
           ->select('members.*');
     }

    public function scopeNotInMemberIds(Builder $query, array $memberIds) : Builder {
        return $query->whereNotIn('member_id', $memberIds);
    }

    public function scopeRegisteredWith($query, $registration_form_id = null) {
        return $query->when($registration_form_id, function($iquery) use($registration_form_id) {
            $iquery->where('organisation_registration_form_id', $registration_form_id);
        });
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
        $this->fillable = array_merge($this->fillable, [
            'first_name', 'last_name', 'email', 'mobile_number', 'occupation', 'business_name', 'dob', 'marital_status'
        ]);

        $builder->approved()->active()
            ->join('members', 'members.id', '=', 'organisation_members.member_id')
            ->select('organisation_members.*', DB::raw("FLOOR(DATEDIFF(NOW(), dob) / 365.25) as age"));

        $builder = parent::buildSearchParams($request, $builder);

        if( $request->term ) {
            $term = $request->term;
            $builder->where(function($query) use($term) {
                return $query->where('organisation_members.organisation_no', 'like', "{$term}%")
                    ->orWhere('members.first_name', 'like', "%{$term}%")
                    ->orWhere(DB::raw("CONCAT(members.first_name, ' ', members.last_name)"), 'like', "%{$term}%")
                    ->orWhere('members.mobile_number', 'like', "%{$term}%");
            });
        }

        $builder = $this->advancedSearch($request, $builder);

        return $builder;
    }

    public function advancedSearch(Request $request, $builder) {
        if( $request->age_gte ) {
            $builder->where('dob', '<=', now()->subYears($request->age_gte));
        }

        if( $request->age_lte ) {
            $builder->where('dob', '>=', now()->subYears($request->age_lte));
        }

        if( $request->gender ) {
            $builder->where(DB::raw('members.gender'), $request->gender);
        }

        if( $request->marital_status ) {
            $builder->where(DB::raw('members.marital_status'), $request->marital_status);
        }

        if( $request->dayname ) {
            $builder->where(DB::raw('DAYNAME(members.dob)'), $request->dayname);
        }

        if( $request->monthname ) {
            $builder->where(DB::raw('MONTHNAME(members.dob)'), $request->monthname);
        }

        if( $request->organisation_group_type_id || $request->organisation_group_id ) {
            $builder->join('organisation_member_groups', function($join) {
                $join->on('organisation_member_groups.organisation_member_id', 'organisation_members.id')
                    ->where('organisation_member_groups.active', 1);
            })
            ->join('organisation_groups', function($join) use($request) {
                $join->on('organisation_groups.id', 'organisation_member_groups.organisation_group_id')
                    ->where('organisation_groups.active', 1);

                if( $request->organisation_group_type_id ) {
                    $join->where('organisation_groups.organisation_group_type_id', $request->organisation_group_type_id);
                }

                if( $request->organisation_group_id ) {
                    $join->where('organisation_groups.id', $request->organisation_group_id);
                }
            });
        }

        if( $request->organisation_anniversary_id ) {
            $builder->join('organisation_member_anniversaries', function($join) use($request) {
                $join->on('organisation_member_anniversaries.organisation_member_id', 'organisation_members.id')
                    ->where('organisation_member_anniversaries.organisation_anniversary_id', $request->organisation_anniversary_id)
                    ->where('organisation_member_anniversaries.active', 1);

                if( $request->anniversary_start_date ) {
                    $join->where('organisation_member_anniversaries.value', '>=', $request->anniversary_start_date);
                }

                if( $request->anniversary_end_date ) {
                    $join->where('organisation_member_anniversaries.value', '<=', $request->anniversary_end_date);
                }
            });
        }

        return $builder;
    }

    public static function createDefaultMember(Organisation $organisation, OrganisationMemberCategory $category, OrganisationAccount $defaultAccount) {
        return self::create([
            'organisation_id' => $organisation->id,
            'member_id' => $organisation->creator->member_id, // auth()->user()->member_id,
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

    public function shouldQualifyColumn($column_name)
    {
        if( !Schema::hasColumn($this->getTable(), $column_name) ) {
            return false;
        }

        if( in_array($column_name, ['organisation_id']) ) {
            return true;
        }

        return parent::shouldQualifyColumn($column_name);
    }
}
