<?php
namespace App\Http\Controllers;

use App\Models\MemberAccount;
use App\Models\Notification;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Notifications
 */
class NotificationController extends ApiController
{

    public function __construct(Notification $notification) {
        parent::__construct($notification);
    }

    /**
     * Subscribe To Notifications
     *
     * Subscribe to Server Sent Events (SSEs) for real time notification of new notification
     * messages that come through for the logged in user
     */
    public function subscribe(Request $request, $member_account_id) {

        return response()->stream(function() use($member_account_id, $request) {

            $user = MemberAccount::find($member_account_id);

            $data = null;
            $data = $user->unsentNotifications()->get();

            echo "retry: 60000\n\n"; // retry connection after 60 seconds
            echo 'data: ' . json_encode($data) . "\n\n";
            ob_flush();
            flush();
            sleep(5);

            /* update the table rows as sent */
            if( $data ) {
                Notification::whereIn('id', $data->pluck('id')->all())->update(['sent' => 1]);
            }

        }, 200, [
            'Access-Control-Allow-Origin' => $request->headers->get('origin'),
            'Access-Control-Expose-Headers' => '*',
            'Access-Control-Allow-Credentials' => 'true',
            'Content-Type' => 'text/event-stream',
            'X-Accel-Buffering' => 'no',
            'Cache-Control' => 'no-cache',
        ]);
    }

    /**
     * Mark As Read
     *
     * Mark a specific notification as read
     */
    public function markRead(Request $request, $id) {
        $notification = $request->user()->unreadNotifications()->where('id', $id)->first();

        if( $notification ) {
            $notification->markAsRead();

            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['message' => 'Notification not found or already marked read'], 200);
    }

    /**
     * Mark All Read
     *
     * Mark all unread notifications as read
     */
    public function markAllRead(Request $request) {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Notifications marked as read']);
    }

    /**
     * Get Unread
     */
    public function unread(Request $request) {
        $limit = $request->limit ?? 10;
        $notifications = $request->user()->unreadNotifications()->paginate($limit);

        return $this->Resource::collection($notifications);
    }

}
