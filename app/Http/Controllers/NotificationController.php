<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display notification and mark it as read.
     */
    public function notification(string $id)
    {
        $notifications = Auth::user()->notifications->where('id', $id)->first();

        $notifications->markAsRead();

        return redirect($notifications->data['url']);
    }

    /**
     * Display notification and mark it as read.
     */
    public function allNotification()
    {
        $notifications = Auth::user()->notifications;

        $notifications->markAsRead();

        return redirect()->route('messagesList');
    }
}
