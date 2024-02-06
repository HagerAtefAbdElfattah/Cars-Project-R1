<?php

namespace App\Listeners;

use App\Events\MessagesEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\ContactMessagesNotification;

class NotifyUserMessageListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessagesEvent $event): void
    {
         
        if (Auth::user() && $userAdmin = User::find(Auth::user()->id)) {
            Notification::send($userAdmin, new ContactMessagesNotification($event->message));
        }
    }
}
