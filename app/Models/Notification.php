<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at', 'notification_type_id', 'organisation_id', 'member_account_id', 'source_id', 'target_id', 'active', 'sent'
    ];
}
