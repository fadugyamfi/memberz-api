<?php

namespace App\Models;

use App\Traits\HasCakephpTimestamps;
use App\Traits\LogModelActivity;
use NunoMazer\Samehouse\BelongsToTenants;

class OrganisationFileImport extends ApiModel
{

    use BelongsToTenants, LogModelActivity, HasCakephpTimestamps;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_file_imports';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'member_account_id', 'import_type', 'import_to_id', 'file_path', 'file_name', 'import_status', 'records_imported', 'records_linked', 'records_existing', 'imported_ids', 'linked_ids', 'existing_ids', 'created', 'modified', 'active', 'deleted'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['active' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];


    public function member_account() {
        return $this->belongsTo(MemberAccount::class);
    }

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

}
