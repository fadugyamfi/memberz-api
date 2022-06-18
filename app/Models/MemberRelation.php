<?php

namespace App\Models;

use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use Spatie\Activitylog\LogOptions;

class MemberRelation extends ApiModel
{
    use LogModelActivity, SoftDeletesWithActiveFlag;

    protected $table = 'member_relations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = ['member_id', 'name', 'gender', 'dob', 'relation_member_id', 'is_alive', 'member_relation_type_id', 'active'];

    protected $casts = [
        'dob' => 'datetime:Y-m-d'
    ];

    public function member_relation_type(){
        return $this->belongsTo(MemberRelationType::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function relative(){
        return $this->belongsTo(Member::class, 'relation_member_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        $member = $this->member;
        $relation_name = $this->name;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("member_profile")
            ->setDescriptionForEvent(function(string $eventName) use($member, $relation_name) {
                if( $eventName == 'created' ) {
                    return __("Added family relation \":relation_name\" to member :name", [
                        "relation_name" => $relation_name,
                        "name" => $member->name
                    ]);
                }

                if( $eventName == 'updated' ) {
                    return __("Updated family relation \":relation_name\" on member :name", [
                        "relation_name" => $relation_name,
                        "name" => $member->name
                    ]);
                }

                if( $eventName == 'deleted' ) {
                    return __("Deleted family relation \":relation_name\" from member :name", [
                        "relation_name" => $relation_name,
                        "name" => $member->name
                    ]);
                }
            });
    }
}
