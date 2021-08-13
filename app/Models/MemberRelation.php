<?php

namespace App\Models;

class MemberRelation extends ApiModel
{

    protected $table = 'member_relations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_id', 'name', 'gender', 'dob', 'relation_member_id', 'is_alive', 'member_relation_type_id', 'active'];

    public function member_relation_type(){
        return $this->belongsTo(MemberRelationType::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function relation_member(){
        return $this->belongsTo(Member::class);
    }

}
