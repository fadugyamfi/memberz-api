<?php

namespace App\Observers;

use App\Models\MemberRelation;

class MemberRelationObserver
{
    /**
     * Handle the MemberRelation "created" event.
     */
    public function created(MemberRelation $memberRelation): void
    {
        $member = $memberRelation->member;
        $spouseProfile = $member->spouse()->first();

        if( !$spouseProfile ) {
            return;
        }

        if( $memberRelation->isChild() ) {

        }
    }

    /**
     * Handle the MemberRelation "updated" event.
     */
    public function updated(MemberRelation $memberRelation): void
    {
        //
    }

    /**
     * Handle the MemberRelation "deleted" event.
     */
    public function deleted(MemberRelation $memberRelation): void
    {
        //
    }

    /**
     * Handle the MemberRelation "restored" event.
     */
    public function restored(MemberRelation $memberRelation): void
    {
        //
    }

    /**
     * Handle the MemberRelation "force deleted" event.
     */
    public function forceDeleted(MemberRelation $memberRelation): void
    {
        //
    }
}
