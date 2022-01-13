<?php

namespace App\Models;

use App\Scopes\LatestRecordsScope;
use App\Scopes\SmsAccountScope;
use App\Services\Sms\SmsPersonalizer;
use App\Traits\LogModelActivity;
use App\Traits\SoftDeletesWithActiveFlag;
use Spatie\Activitylog\LogOptions;

class SmsBroadcast extends ApiModel
{

    use SoftDeletesWithActiveFlag, LogModelActivity;

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

    public function scheduler() {
        return $this->belongsTo(OrganisationAccount::class, 'scheduled_by');
    }

    public function rescheduleForAnHour() {
        $this->send_at = now()->addHour();
        $this->save();
    }

    public function scopeUnsent($query) {
        return $query->where('sent', 0);
    }

    public function scopeReadyToSend($query) {
        return $query->where('send_at', '<=', now()->format('Y-m-d H:i:s'));
    }

    public function getMessagePagesAttribute() {
        return ceil(strlen($this->message) / 160);
    }

    public function getSenderIdAttribute() {
        return $this->smsBroadcastList?->sender_id ?? $this->smsAccount->sender_id;
    }

     /**
     * Format user activities description for Sms Broadcast
     * @override
     */
    public function getActivitylogOptions(): LogOptions
    {
        $message = substr($this->message, 0, 50);
        $for = "";
        $for_name = "";

        if ($this->module_sms_broadcast_list_id){
            $for = "broadcast list";
            $for_name = $this->smsBroadcastList->name;
        } else if( $this->organisation_member_category_id ) {
            $for = "organisation category";
            $for_name = $this->organisationMemberCategory->name;
        } else {
            $for = "all members";
            $for_name = "All Members";
        }

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("sms")
            ->setDescriptionForEvent(function (string $eventName) use ($message, $for, $for_name) {
                if ($eventName == 'created') {
                    return __("Scheduled sms broadcast to \":for_name\". Message: \":message ...\"", [
                        "for" => $for,
                        'for_name' => $for_name,
                        'message' => $message
                    ]);
                }

                if ($eventName == 'updated') {
                    return __("Updated scheduled sms broadcast to \":for_name\". Message: \":message ...\"", [
                        "for" => $for,
                        'for_name' => $for_name,
                        'message' => $message
                    ]);
                }

                if ($eventName == 'deleted') {
                    return __("Deleted scheduled sms broadcast to \":for_name\". Message: \":message ...\"", [
                        "for" => $for,
                        'for_name' => $for_name,
                        'message' => $message
                    ]);
                }
            });
    }

    public function personalizeMessage(OrganisationMember $membership) {
        $attributes = [
            'title' => $membership->member->title,
            'first_name' => $membership->member->first_name,
            'last_name' => $membership->member->last_name,
            'full_name' => $membership->member->full_name,
            'org_name' => $this->smsAccount->organisation->name,
            'org_slug' => $this->smsAccount->organisation->slug
        ];

        return (new SmsPersonalizer)->format($this->message, $attributes);
    }
}
