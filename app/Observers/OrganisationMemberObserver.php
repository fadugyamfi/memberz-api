<?php

namespace App\Observers;

use App\Models\OrganisationMember;
use Illuminate\Support\Facades\Log;

class OrganisationMemberObserver
{

    /**
     * Auto generate a membership ID for the membership
     */
    public function autoGenerateMembershipNo(OrganisationMember $organisationMember) {
        if( !$organisationMember->approved ) {
            return;
        }

        $organisationMember->generateMembershipNo();
    }

    /**
     * Incremember the counter for membership IDs on the category for the membership
     */
    public function incrementMembershipIDCounter(OrganisationMember $organisationMember) {
        $organisationMember->organisationMemberCategory->incrementIdCounter();
    }

    /**
     * Handle the organisation member "creating" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function creating(OrganisationMember $organisationMember) {
        $this->autoGenerateMembershipNo($organisationMember);
    }

    /**
     * Handle the organisation member "created" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function created(OrganisationMember $organisationMember)
    {
        if( $organisationMember->isDirty('organisation_no') ) {
            $this->incrementMembershipIDCounter($organisationMember);
        }
    }

    /**
     * Handle the organisation member "updating" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function updating(OrganisationMember $organisationMember)
    {
        if( $organisationMember->isDirty('approved') && $organisationMember->approved == 1 ) {
            $this->autoGenerateMembershipNo($organisationMember);

            // we update the counter immediately after auto generating the number in the case of an update
            // since we can't determine if an update to the organisation_no was manual or auto generated.
            $this->incrementMembershipIDCounter($organisationMember);
        }
    }

    /**
     * Handle the organisation member "updated" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function updated(OrganisationMember $organisationMember)
    {

    }

    /**
     * Handle the organisation member "deleted" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function deleted(OrganisationMember $organisationMember)
    {
        //
    }

    /**
     * Handle the organisation member "restored" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function restored(OrganisationMember $organisationMember)
    {
        //
    }

    /**
     * Handle the organisation member "force deleted" event.
     *
     * @param  \App\OrganisationMember  $organisationMember
     * @return void
     */
    public function forceDeleted(OrganisationMember $organisationMember)
    {
        //
    }
}
