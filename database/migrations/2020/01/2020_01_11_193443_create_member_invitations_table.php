<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMemberInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_invitations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('invite_type', array('join_org','join_memberz'))->nullable()->default('join_memberz');
			$table->integer('member_id')->unsigned()->nullable()->index('member_id');
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id')->comment('member_account_id of inviter');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id')->comment('organisation_id of inviter');
			$table->boolean('send_email')->nullable()->default(0);
			$table->boolean('send_sms')->nullable()->default(0);
			$table->boolean('email_sent')->nullable()->default(0);
			$table->boolean('sms_sent')->nullable()->default(0);
			$table->boolean('accepted')->nullable()->default(0);
			$table->boolean('declined')->nullable()->default(0);
			$table->dateTime('responded')->nullable()->comment('When member responded to invitation');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('deleted')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_invitations');
	}

}
