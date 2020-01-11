<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Torzer\Awesome\Landlord\BelongsToTenants;

class OrganisationMember extends ApiModel
{

    use BelongsToTenants;
    
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

    public function organisation_member_category() {
        return $this->belongsTo(OrganisationMemberCategory::class);
    }

    public function scopeActive($query) {
        $query->where('organisation_members.active', 1);
    }

    public function scopeApproved($query) {
        $query->where('organisation_members.approved', 1);
    }

    public function scopeUnapproved($query) {
        $query->active()->where('approved', 0);
    }

    public static function memberOrganisationIds(int $member_id) {
        return self::where('member_id', $member_id)->active()->approved()->get()->pluck('organisation_id')->all();
    }

    public function buildSearchParams(Request $request, $builder)
    {
        $this->fillable = array_merge($this->fillable, ['first_name', 'last_name', 'email', 'mobile_number', 'occupation', 'business_name']);
        $builder->approved()->active()->join('members', 'members.id', '=', 'organisation_members.member_id')->select('organisation_members.*');

        return parent::buildSearchParams($request, $builder);
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
}
