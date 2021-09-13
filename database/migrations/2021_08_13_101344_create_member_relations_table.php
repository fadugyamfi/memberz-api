<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->string('name', 150)->nullable();
			$table->string('gender', 10)->nullable();
			$table->date('dob')->nullable();
			$table->boolean('is_alive')->nullable()->default(1);
            $table->integer('relation_member_id')->unsigned()->nullable();
			$table->foreignId('member_relation_type_id');
			$table->boolean('active')->nullable()->default(1);
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_relations');
    }
}
