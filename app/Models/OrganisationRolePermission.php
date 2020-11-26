<?php

namespace App\Models;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LaravelApiBase\Models\ApiModelBehavior;
use LaravelApiBase\Models\ApiModelInterface;

class OrganisationRolePermission extends Permission implements ApiModelInterface
{
    use ApiModelBehavior;

    /**
     * Database table name
     */
    public $table = 'permissions';

    public $primaryKey = 'id';

    protected static $logName = "user_management";
    protected static $logFillable = true;
    protected static $logAttributes = '*';

    /**
     * Protected columns from mass assignment
     */
    public $guarded  = ['id'];
    public $fillable = ['guard_name', 'name', 'description'];

    /**
     * A permission can be applied to roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.role_has_permissions'),
            'permission_id'
        );
    }

}
