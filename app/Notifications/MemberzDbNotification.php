<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

/**
 * Custom channel for laravel db notificaitons channel upgrade
 */
class MemberzDbNotification {

    public function send($notifiable, Notification $notification){
        $data = $notification->toDatabase($notifiable);

        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'notificaiton_type_id' => $data['notificaiton_type_id'],
            'organisation_id' => $data['organisation_id'],
            'source_id' => $data['source_id'],
            'target_id' => $data['target_id'],
            'member_account_id' => auth()->id,
            'type' => get_class($notification),
            'data' => $data,
            'read_at' => null,
        ]);
    }

}