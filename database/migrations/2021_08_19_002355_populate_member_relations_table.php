<?php

use App\Models\MemberRelation;
use App\Models\MemberRelationType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateMemberRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('member_parents')->orderBy('id')->chunk(100, function($parents) {
            foreach($parents as $parent) {
                if( !trim($parent->name) ) {
                    continue;
                }

                MemberRelation::create([
                    'member_relation_type_id' => MemberRelationType::PARENT,
                    'member_id' => $parent->member_id,
                    'name' => $parent->name,
                    'gender' => $parent->gender,
                    'dob' => !in_array($parent->dob, ['0000-00-00', '1970-01-01', '', ' ']) ? date('Y-m-d', strtotime($parent->dob)) : null,
                    'relation_member_id' => $parent->parent_member_id > 0 ? $parent->parent_member_id : null,
                    'is_alive' => $parent->is_alive
                ]);
            }
        });

        DB::table('member_spouses')->orderBy('id')->chunk(100, function($spouses) {
            foreach($spouses as $spouse) {
                if( !trim($spouse->name) ) {
                    continue;
                }

                MemberRelation::create([
                    'member_relation_type_id' => MemberRelationType::SPOUSE,
                    'member_id' => $spouse->member_id,
                    'name' => $spouse->name,
                    'gender' => $spouse->gender,
                    'dob' => !in_array($spouse->dob, ['0000-00-00', '1970-01-01', '', ' ']) ? date('Y-m-d', strtotime($spouse->dob)) : null,
                    'relation_member_id' => $spouse->spouse_member_id > 0 ? $spouse->spouse_member_id : null,
                    'is_alive' => $spouse->is_alive
                ]);
            }
        });

        DB::table('member_children')->orderBy('id')->chunk(100, function($children) {
            foreach($children as $child) {
                if( !trim($child->name) ) {
                    continue;
                }

                MemberRelation::create([
                    'member_relation_type_id' => MemberRelationType::CHILD,
                    'member_id' => $child->member_id,
                    'name' => $child->name,
                    'gender' => $child->gender,
                    'dob' => !in_array($child->dob, ['0000-00-00', '1970-01-01', '', ' ']) ? date('Y-m-d', strtotime($child->dob)) : null,
                    'relation_member_id' => $child->child_member_id > 0 ? $child->child_member_id : null,
                    'is_alive' => $child->is_alive
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('member_relations')->truncate();
    }
}
