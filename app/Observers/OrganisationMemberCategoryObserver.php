<?php

namespace App\Observers;

use App\Models\OrganisationMemberCategory;
use Illuminate\Support\Str;

class OrganisationMemberCategoryObserver
{

    public function unflagDefaultForOthers(OrganisationMemberCategory $category) {
        if( $category->default == 1 ) {
            OrganisationMemberCategory::where('id', '!=', $category->id)->update(['default' => 0]);
        }
    }

    /**
     * Handle the organisation member category "creating" event.
     *
     * @param  \App\Models\OrganisationMemberCategory  $category
     * @return void
     */
    public function creating(OrganisationMemberCategory $category)
    {
        $category->generateSlug();
    }

    /**
     * Handle the organisation member category "created" event.
     *
     * @param  \App\Models\OrganisationMemberCategory  $category
     * @return void
     */
    public function created(OrganisationMemberCategory $category)
    {
        $this->unflagDefaultForOthers($category);
    }

    /**
     * Handle the organisation member category "updated" event.
     *
     * @param  \App\Models\OrganisationMemberCategory  $category
     * @return void
     */
    public function updated(OrganisationMemberCategory $category)
    {
        $this->unflagDefaultForOthers($category);
    }


}
