<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationRolePermission;
use LaravelApiBase\Http\Controllers\ApiController;

class PermissionController extends ApiController
{
    public function __construct(OrganisationRolePermission $permission) {
        parent::__construct($permission);
    } 
}