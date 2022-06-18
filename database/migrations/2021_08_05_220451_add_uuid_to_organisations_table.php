<?php

use App\Models\Organisation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class AddUuidToOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasColumn('organisations', 'uuid') ) {
            Schema::table('organisations', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->index()->after('id');
            });
        }

        activity()->disableLogging();

        DB::table('organisations')->chunkById(50, function($organisations) {
            foreach($organisations as $organisation) {
                DB::table('organisations')
                    ->where('id', $organisation->id)
                    ->update(['uuid' => Uuid::uuid4()]);
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
        Schema::table('organisations', function (Blueprint $table) {
            $table->dropIndex(['uuid']);
            $table->dropColumn(['uuid']);
        });
    }
}
