<?php

namespace App\Observers;

use App\Models\OrganisationMemberGroup;

class OrganisationMemberGroupObserver
{

    public function creating(OrganisationMemberGroup $organisationMemberGroup): void
    {
        // prevent duplicate entries
        $existing = OrganisationMemberGroup::where('organisation_member_id', $organisationMemberGroup->organisation_member_id)
            ->where('organisation_group_id', $organisationMemberGroup->organisation_group_id)
            ->first();

        if ($existing) {
            // If the record exists, we can use it
            $organisationMemberGroup->id = $existing->id;
        }
    }

    /**
     * Handle the OrganisationMemberGroup "created" event.
     */
    public function created(OrganisationMemberGroup $organisationMemberGroup): void
    {
        //
    }

    /**
     * Handle the OrganisationMemberGroup "updated" event.
     */
    public function updated(OrganisationMemberGroup $organisationMemberGroup): void
    {
        //
    }

    /**
     * Handle the OrganisationMemberGroup "deleted" event.
     */
    public function deleted(OrganisationMemberGroup $organisationMemberGroup): void
    {
        //
    }

    /**
     * Handle the OrganisationMemberGroup "restored" event.
     */
    public function restored(OrganisationMemberGroup $organisationMemberGroup): void
    {
        //
    }

    /**
     * Handle the OrganisationMemberGroup "force deleted" event.
     */
    public function forceDeleted(OrganisationMemberGroup $organisationMemberGroup): void
    {
        //
    }
}
