<?php

namespace App\Models;

use NunoMazer\Samehouse\BelongsToTenants;

class ActivityLog extends ApiModel
{
    use BelongsToTenants;
    
    /**
     * Database table name
     */
    public $table = 'activity_log';

    public $primaryKey = 'id';

    /**
     * Protected columns from mass assignment
     */
    public $guarded  = ['id'];
    public $fillable = ['id', 'log_name', 'description', 'subject', 'causer', 'causer_id', 'properties', 'created_at'];

    public function causer() {
        return $this->belongsTo(MemberAccount::class, 'causer_id');
    }

}
