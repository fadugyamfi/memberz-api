<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Notification extends ApiModel
{

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $fillable = [
        'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at', 'notification_type_id', 'organisation_id', 'member_account_id', 'source_id', 'target_id', 'active', 'sent'
    ];

    public function scopeActive(Builder $query) {
        $query->where('active', 1);
    }

    public function scopeSent(Builder $query) {
        $query->where('sent', 1);
    }

    public function notification_type(){
        return $this->belongsTo(NotificationType::class);
    }

    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function member_account(){
        return $this->belongsTo(MemberAccount::class);
    }

    public function notification_params(){
        return $this->hasMany(NotificationParam::class);
    }
}
