<?php

namespace App\Listeners;

use App\Events\MessagesEvent;
use App\Models\Message;
use App\Notifications\ContactSenderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifySenderMessageListener
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
        $user = Message::where('email', $event->message['email'])->first();

        Notification::send($user, new ContactSenderNotification($event->message));
        
    }
}
