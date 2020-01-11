<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrganisationFileImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisation_file_imports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organisation_id')->unsigned()->nullable()->index('organisation_id');
			$table->integer('member_account_id')->nullable();
			$table->enum('import_type', array('members','contributions'))->nullable()->default('members');
			$table->integer('import_to_id')->unsigned()->nullable()->index('import_to_id')->comment('Organisation Member Category to import to');
			$table->string('file_path', 100)->nullable();
			$table->string('file_name', 50)->nullable();
			$table->enum('import_status', array('pending','processing','completed','failed'))->nullable()->default('pending');
			$table->integer('records_imported')->nullable()->default(0);
			$table->integer('records_linked')->nullable();
			$table->integer('records_existing')->nullable();
			$table->text('imported_ids', 65535)->nullable();
			$table->text('linked_ids', 65535)->nullable();
			$table->text('existing_ids', 65535)->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->boolean('active')->nullable()->default(1);
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
		Schema::drop('organisation_file_imports');
	}

}
