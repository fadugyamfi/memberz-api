<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationMemberController extends ApiController
{
    public function __construct(OrganisationMember $organisationMember) {
        parent::__construct($organisationMember);
    } 

    public function destroy($id)
    {
        $model = $this->Model::find($id);

        if( $model ) {
            $model->active = 0;
            $model->approved = 0;
            $model->save();

            return response()->json(['data' => $model]);
        }

        return response()->json(['error' => 'Could not find member record to delete'], 404);
    }

    public function statistics(int $organisation_id) {

        $data = $this->Model::join('organisation_member_categories', 'organisation_member_categories.id', '=', 'organisation_members.organisation_member_category_id')
                     ->select( DB::raw('organisation_member_categories.name as category_name'), DB::raw('count(organisation_members.id) as total'))
                     ->groupBy('category_name')
                     ->where('organisation_members.organisation_id', $organisation_id)
                     ->get();

        return response()->json(['data' => $data]);
    }
}