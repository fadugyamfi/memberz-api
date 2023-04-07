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
    public function autoGenerateMembershipNo(OrganisationMember $membership) {
        if( !$membership->approved ) {
            return;
        }

        $membership->generateMembershipNo();
    }

    /**
     * Incremember the counter for membership IDs on the category for the membership
     */
    public function incrementMembershipIDCounter(OrganisationMember $membership) {
        activity()->withoutLogs(function() use($membership) {
            $membership->category->incrementIdCounter();
        });
    }

    /**
     * Handle the organisation member "creating" event.
     *
     * @param  \App\Models\OrganisationMember  $membership
     * @return void
     */
    public function creating(OrganisationMember $membership) {
        $membership->uuid = Str::uuid();
        $this->autoGenerateMembershipNo($membership);
    }

    /**
     * Handle the organisation member "created" event.
     *
     * @param  \App\Models\OrganisationMember  $membership
     * @return void
     */
    public function created(OrganisationMember $membership)
    {
        if( $membership->isDirty('organisation_no') ) {
            $this->incrementMembershipIDCounter($membership);
        }

        if( $membership->source == 'registration' && $membership->member->email ) {
            Mail::to($membership->member->email)->queue(new MemberFormRegistrationCompleted($membership));
        }
    }


    /**
     * Handle the organisation member "updating" event.
     *
     * @param  \App\Models\OrganisationMember  $membership
     * @return void
     */
    public function updating(OrganisationMember $membership)
    {
        if( $membership->uuid == null ) {
            $membership->uuid = Str::uuid();
        }

        if( $membership->isDirty('approved') && $membership->approved == 1 ) {
            $this->autoGenerateMembershipNo($membership);

            // we update the counter immediately after auto generating the number in the case of an update
            // since we can't determine if an update to the organisation_no was manual or auto generated.
            $this->incrementMembershipIDCounter($membership);

            // set membership start date
            $membership->setInitialMembershipStartDate();
        }
    }


    /**
     * Handle the organisation member "updated" event.
     *
     * @param  \App\Models\OrganisationMember  $membership
     * @return void
     */
    public function updated(OrganisationMember $membership)
    {
        $this->notifyRegistrationUpdate($membership);
    }

    private function notifyRegistrationUpdate(OrganisationMember $membership) {
        $registrationApproved = $membership->isDirty('approved') && $membership->approved == 1 && $membership->active == 1;
        $registrationRejected = $membership->isDirty('active') && $membership->approved == 0 && $membership->active == 0;
        $membershipCanceled = ($membership->isDirty('active') && $membership->isDirty('approved')) && $membership->approved == 0 && $membership->active == 0;
        $membershipDeleted = $membership->isDirty('active') && $membership->approved == 1 && $membership->active == 0;

        if( ($registrationApproved || $registrationRejected || $membershipCanceled) && $membership->member->email ) {
            Mail::to($membership->member->email)->queue(new MemberRegistrationStatusUpdated($membership));
        }

        // TODO: Notify membership deleted
    }
}
