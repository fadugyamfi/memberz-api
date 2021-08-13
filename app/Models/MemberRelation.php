<?php

namespace App\Models;

class MemberRelation extends ApiModel
{

    protected $table = 'member_relations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_id', 'name', 'gender', 'dob', 'member_relation_id', 'is_alive', 'relation', 'active'];

}
