<?php

namespace App\Notifications;

use App\Channels\MemberzDbNotification;
use App\Models\MemberAccount;
use Illuminate\Notifications\Notification;

abstract class BaseNotification extends Notification
{

    protected string $title;
    protected string $message;
    protected int $organisation_id;
    protected int $notification_type_id;
    protected array $replace_words_arr = [];

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [MemberzDbNotification::class];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    }

    public function formatMessage() : void {
        foreach($this->replace_words_arr as $key => $value){
            $this->message = str_ireplace($key, $value, $this->message);
        }
    }

    public function getData() : array {
        return [
            'message' => __($this->message),
            'title' => __($this->title),
            'organisation_id' => $this->organisation_id,
            'notification_type_id' => $this->notification_type_id,
        ];
    }

    public function getNotifiaBy(){
        $auth_member = MemberAccount::find(auth()->user()->id);
        return $auth_member->member->first_name. ' '. $auth_member->member->last_name;
    }

    public function toDatabase($notifiable) {
        return $this->toArray($notifiable);
    }

}
