<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationMemberCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_member_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->default(0);
			$table->string('name', 200)->nullable();
			$table->string('slug', 200)->nullable();
			$table->string('description')->nullable();
			$table->boolean('auto_gen_ids')->nullable()->default(1);
			$table->string('id_prefix', 10)->nullable();
			$table->string('id_suffix', 10)->nullable();
			$table->integer('id_next_increment')->nullable()->default(1);
			$table->boolean('default')->nullable()->default(0);
			$table->integer('organisation_member_count')->nullable()->default(0);
			$table->boolean('rank')->nullable()->default(1);
			$table->boolean('paid_membership')->nullable();
			$table->boolean('payment_required')->nullable()->comment('Payment required before creating this membership');
			$table->float('price', 10)->nullable();
			$table->float('registration_fee', 10)->nullable();
			$table->enum('renewal_frequency', array('Never','Monthly','Quarterly','Biannually','Annually'))->nullable()->default('Never');
			$table->boolean('publicly_joinable')->nullable()->default(1)->comment('Members can choose to join this category from public interface');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->unique(['organisation_id','slug'], 'slug');
			$table->primary(['id','organisation_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organisation_member_categories');
	}

}
