<?php

namespace App\Http\Controllers;

use App\Models\OrganisationMemberCategory;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Member Categories
 */
class OrganisationMemberCategoryController extends ApiController
{
    public function __construct(OrganisationMemberCategory $organisationMemberCategory) {
        parent::__construct($organisationMemberCategory);
    }

    public function destroy($id)
    {
        $model = $this->Model::find($id);

        if( $model ) {
            $model->active = 0;
            $model->save();

            return response()->json(['data' => $model]);
        }

        return response()->json(['error' => 'Could not find member record to delete'], 404);
    }
}
