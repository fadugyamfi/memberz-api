<?php

namespace App\Observers;

use App\Models\Organisation;
use App\Models\OrganisationBranch;
use Illuminate\Support\Facades\Log;

class OrganisationBranchObserver
{
    
    /**
     * Handle the OrganisationBranch "created" event.
     */
    public function creating(OrganisationBranch $organisationBranch): void
    {
        Log::info("[OrganisationBranchObserver] creating: " . json_encode($organisationBranch));

        if( $organisationBranch->primary_member_id == null ) {
            $branchOrganisation = Organisation::find($organisationBranch->branch_organisation_id);
            $organisationBranch->primary_member_id = $branchOrganisation?->creator?->member_id;
        }
    }

    /**
     * Handle the OrganisationBranch "created" event.
     */
    public function created(OrganisationBranch $organisationBranch): void
    {
        //
    }

    /**
     * Handle the OrganisationBranch "updated" event.
     */
    public function updated(OrganisationBranch $organisationBranch): void
    {
        Log::info("[OrganisationBranchObserver] updated: " . json_encode(request()->all())); 
        $tags = request()->input('tags');

        if( $tags && is_array($tags) ) {
            $organisationBranch->syncTags($tags);
        }
    }

    /**
     * Handle the OrganisationBranch "deleted" event.
     */
    public function deleted(OrganisationBranch $organisationBranch): void
    {
        //
    }

    /**
     * Handle the OrganisationBranch "restored" event.
     */
    public function restored(OrganisationBranch $organisationBranch): void
    {
        //
    }

    /**
     * Handle the OrganisationBranch "force deleted" event.
     */
    public function forceDeleted(OrganisationBranch $organisationBranch): void
    {
        //
    }
}
