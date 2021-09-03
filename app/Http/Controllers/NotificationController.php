<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MemberAccount;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Subscribe To Unread Notifications
     *
     * Subscribe to Server Sent Events (SSEs) for real time notification of new notification
     * messages that come through for the logged in user
     */
    public function subscribeUnread(Request $request, $member_account_id)
    {
        return response()->stream(function () use ($member_account_id, $request) {
            $user = MemberAccount::find($member_account_id);

            $data = [];
            if ($user) {
                $data = $user->unreadNotifications()->get();
            }

            if (!empty($data)) {
                echo "retry: 3000\n\n"; // no retry would default to 3 seconds.
                echo 'data: ' . json_encode($data) . "\n\n";
                ob_flush();
                flush();

                /* update the table rows as sent */
                Notification::whereIn('id', $data->pluck('id')->all())->update(['sent' => 1]);
            }
        }, 200, [
            'Access-Control-Allow-Origin' => $request->headers->get('origin'),
            'Access-Control-Expose-Headers' => '*',
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
    public function markAsRead(Request $request, $id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->update(['read_at' => now()]);

            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['message' => 'Notification not found or already marked read'], 200);
    }

    /**
     * Mark All Read
     *
     * Mark all user unread notifications as read
     */
    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Notifications marked as read']);
    }
}
