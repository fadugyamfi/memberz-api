<?php

namespace App\Observers;

use App\Models\OrganisationGroup;
use App\Models\OrganisationGroupLeader;
use Illuminate\Support\Facades\Log;

class OrganisationGroupObserver
{

    public function updateLeaders(OrganisationGroup $organisationGroup) {
        $leaders = request()->get('organisation_group_leaders');

        if( !$leaders ) {
            return;
        }

        foreach($leaders as $leader) {
            if( empty($leader['organisation_member_id']) ) {
                continue;
            }

            OrganisationGroupLeader::updateOrCreate([
                'id' => $leader['id'],
                'organisation_member_id' => $leader['organisation_member_id'],
                'organisation_id' => $organisationGroup->organisation_id,
            ], [
                'organisation_group_id' => $organisationGroup->id,
                'role' => $leader['role'],
                'active' => 1
            ]);
        }
    }

    /**
     * Handle the OrganisationGroup "created" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function created(OrganisationGroup $organisationGroup)
    {
        $this->updateLeaders($organisationGroup);
    }

    /**
     * Handle the OrganisationGroup "updated" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function updated(OrganisationGroup $organisationGroup)
    {
        $this->updateLeaders($organisationGroup);
    }

    /**
     * Handle the OrganisationGroup "saved" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function saved(OrganisationGroup $organisationGroup)
    {
        $this->updateLeaders($organisationGroup);
    }

    /**
     * Handle the OrganisationGroup "deleted" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function deleted(OrganisationGroup $organisationGroup)
    {
        //
    }

    /**
     * Handle the OrganisationGroup "restored" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function restored(OrganisationGroup $organisationGroup)
    {
        //
    }

    /**
     * Handle the OrganisationGroup "force deleted" event.
     *
     * @param  \App\Models\OrganisationGroup  $organisationGroup
     * @return void
     */
    public function forceDeleted(OrganisationGroup $organisationGroup)
    {
        //
    }
}
