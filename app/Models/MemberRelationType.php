<?php

namespace App\Models;

class MemberRelationType extends ApiModel
{

    protected $table = 'member_relation_types';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public const PARENT = 2;
    public const CHILD = 1;
    public const SPOUSE = 3;

    public function member_relations(){
        return $this->hasMany(MemberRelation::class);
    }

}
