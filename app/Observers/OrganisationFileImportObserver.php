<?php

namespace App\Observers;

use App\Imports\OrganisationMembersImport;
use App\Models\OrganisationFileImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use NunoMazer\Samehouse\Facades\Landlord;

class OrganisationFileImportObserver
{

    /**
     * Handle the OrganisationFileImport "created" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function creating(OrganisationFileImport $import)
    {
        $organisation_id = request()->input('organisation_id');
        $fileName = date('YmdHis') . "_member_import.xlsx";
        $path = request()->file('import_file')->storeAs("imports/{$organisation_id}", $fileName);

        $import->member_account_id = auth()->id();
        $import->file_path = $path;
        $import->file_name = $fileName;
    }

    /**
     * Handle the OrganisationFileImport "created" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function created(OrganisationFileImport $import)
    {
        Excel::queueImport( new OrganisationMembersImport($import, auth()->user()), request()->file('import_file') );
    }

    /**
     * Handle the OrganisationFileImport "updated" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function updated(OrganisationFileImport $import)
    {
        //
    }

    /**
     * Handle the OrganisationFileImport "deleted" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function deleted(OrganisationFileImport $import)
    {
        //
    }

    /**
     * Handle the OrganisationFileImport "restored" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function restored(OrganisationFileImport $import)
    {
        //
    }

    /**
     * Handle the OrganisationFileImport "force deleted" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function forceDeleted(OrganisationFileImport $import)
    {
        //
    }
}
