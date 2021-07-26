<?php

namespace App\Observers;

use App\Models\OrganisationFileImport;

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
        $path = request()->file('import_file')->storeAs("imports/{$organisation_id}", date('YmdHis') . "_member_import.xlsx");

        $import->member_account_id = auth()->id();
        $import->file_path = $path;
    }

    /**
     * Handle the OrganisationFileImport "created" event.
     *
     * @param  \App\Models\OrganisationFileImport  $import
     * @return void
     */
    public function created(OrganisationFileImport $import)
    {
        //
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
