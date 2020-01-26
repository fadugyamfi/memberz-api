<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationRole;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationRoleController extends ApiController
{
    public function __construct(OrganisationRole $organisationRole) {
        parent::__construct($organisationRole);
    } 

    /**
     * Get Permissions
     */
    public function permissions(Request $request, $id) {
        $role = $this->Model::find($id);
        $permissions = $role->permissions;

        return $this->Resource::collection($permissions);
    }

     /**
     * Sync Permissions
     */
    public function syncPermissions(Request $request, $id) {
        $role = $this->Model::where('id', $id)->withCount(['organisation_account'])->first();
        $role->syncPermissions($request->input('permissions'));

        return new $this->Resource($role);
    }
}