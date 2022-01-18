<?php

namespace App\Models;

use Spatie\Activitylog\Traits\CausesActivity;

class MemberAccountCode extends ApiModel
{
    use CausesActivity;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $table = 'member_account_codes';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_account_id', 'code', 'expires_at'];

    public function memberAccout()
    {
        return $this->belongsTo(MemberAccount::class);
    }

}
