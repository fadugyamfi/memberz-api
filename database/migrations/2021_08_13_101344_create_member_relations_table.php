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
            $table->integer('member_relation_id')->unsigned()->nullable();
			$table->enum('relation', ['children', 'parent', 'spouses'])->index();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
            $table->timestamps();
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
