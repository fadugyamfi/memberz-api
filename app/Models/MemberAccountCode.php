<?php

namespace App\Models;

use Spatie\Activitylog\Traits\CausesActivity;

class MemberAccountCode extends ApiModel
{
    use CausesActivity;


    protected $table = 'member_account_codes';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    protected $fillable = ['member_account_id', 'code'];

    public function memberAccout()
    {
        return $this->belongsTo(MemberAccount::class);
    }

}
