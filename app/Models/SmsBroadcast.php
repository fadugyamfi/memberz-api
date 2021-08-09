<?php

namespace App\Models;

use App\Scopes\LatestRecordsScope;
use App\Scopes\SmsAccountScope;
use App\Traits\SoftDeletesWithActiveFlag;

class SmsBroadcast extends ApiModel
{

    use SoftDeletesWithActiveFlag;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_sms_account_broadcasts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['module_sms_account_id', 'module_sms_broadcast_list_id', 'organisation_member_category_id', 'message', 'send_at', 'sent_offset', 'sent_count', 'sent_pages', 'sent', 'scheduled_by', 'created', 'modified', 'active'];

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
    protected $casts = ['sent' => 'boolean', 'active' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['send_at', 'created', 'modified'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SmsAccountScope);
        static::addGlobalScope(new LatestRecordsScope);
    }

    public function smsAccount() {
        return $this->belongsTo(SmsAccount::class, 'module_sms_account_id');
    }

    public function smsBroadcastList() {
        return $this->belongsTo(SmsBroadcastList::class, 'module_sms_broadcast_list_id');
    }

    public function organisationMemberCategory() {
        return $this->belongsTo(OrganisationMemberCategory::class);
    }

    public function scheduledBy() {
        return $this->belongsTo(OrganisationAccount::class, 'scheduled_by');
    }
}
