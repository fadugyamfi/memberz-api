<?php

namespace App\Observers;

use App\Mail\MemberFormRegistrationCompleted;
use App\Mail\MemberRegistrationStatusUpdated;
use App\Models\OrganisationMember;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
     * @param  \App\Models\OrganisationMember  $organisationMember
     * @return void
     */
    public function creating(OrganisationMember $organisationMember) {
        $organisationMember->uuid = Str::uuid();
        $this->autoGenerateMembershipNo($organisationMember);
    }

    /**
     * Handle the organisation member "created" event.
     *
     * @param  \App\Models\OrganisationMember  $organisationMember
     * @return void
     */
    public function created(OrganisationMember $organisationMember)
    {
        if( $organisationMember->isDirty('organisation_no') ) {
            $this->incrementMembershipIDCounter($organisationMember);
        }

        if( $organisationMember->source == 'registration' && $organisationMember->member->email ) {
            Mail::to($organisationMember->member->email)->send(new MemberFormRegistrationCompleted($organisationMember));
        }
    }


    /**
     * Handle the organisation member "updating" event.
     *
     * @param  \App\Models\OrganisationMember  $organisationMember
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
     * @param  \App\Models\OrganisationMember  $organisationMember
     * @return void
     */
    public function updated(OrganisationMember $organisationMember)
    {
        $this->notifyRegistrationUpdate($organisationMember);
    }

    private function notifyRegistrationUpdate(OrganisationMember $organisationMember) {
        $registrationApproved = $organisationMember->isDirty('approved') && $organisationMember->approved == 1 && $organisationMember->active == 1;
        $registrationRejected = $organisationMember->isDirty('active') && $organisationMember->approved == 0 && $organisationMember->active == 0;
        $membershipDeleted = $organisationMember->isDirty('active') && $organisationMember->approved == 1 && $organisationMember->active == 0;

        if( ($registrationApproved|| $registrationRejected) && $organisationMember->member->email ) {
            Mail::to($organisationMember->member->email)->send(new MemberRegistrationStatusUpdated($organisationMember));
        }

        // TODO: Notify membership deleted
    }
}
