<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('organisation_type_id')->nullable()->index('organisation_type_id');
			$table->string('name', 200)->nullable();
			$table->string('slug', 50)->nullable()->unique('slug_idx');
			$table->string('address', 200)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('state', 30)->nullable();
			$table->string('post_code', 20)->nullable();
			$table->smallInteger('country_id')->nullable();
			$table->smallInteger('currency_id')->nullable();
			$table->string('email', 100)->nullable();
			$table->string('phone', 50)->nullable();
			$table->string('website', 200)->nullable();
			$table->string('logo')->nullable();
			$table->text('short_description', 65535)->nullable();
			$table->text('long_description', 16777215)->nullable();
			$table->string('mission')->nullable();
			$table->string('cover_photo')->nullable();
			$table->integer('member_account_id')->unsigned()->nullable()->index('member_account_id');
			$table->integer('organisation_member_count')->nullable()->default(0);
			$table->boolean('organisation_account_count')->nullable()->default(0);
			$table->boolean('discoverable')->nullable()->default(1)->comment('Allow organization to found in public search');
			$table->boolean('allow_public_join')->nullable()->default(0)->comment('Allow people to join this organization through the public interface');
			$table->integer('default_public_join_category')->unsigned()->nullable()->comment('Category members will be pushed into when they join via the public interface');
			$table->boolean('public_directory_enabled')->nullable()->default(1);
			$table->boolean('locked')->nullable()->default(0);
			$table->boolean('verified')->nullable()->default(0);
			$table->integer('verified_by')->unsigned()->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(0);
			$table->boolean('trashed')->nullable()->default(0);
			$table->index(['name','slug'], 'organisation_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisations');
	}

}
