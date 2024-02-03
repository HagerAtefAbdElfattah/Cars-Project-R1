<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessagesNotification extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
       $this->message =$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('You have got a new message from '. $this->message['firstName'].' '. $this->message['lastName'])
                    ->action('See More!', route('showMessages', $this->message['id']))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'addtion'   => 'You have got a new message',
            'addName'      => $this->message['firstName'].''. $this->message['lastName'],
            'firstName' => $this->message['firstName'],
            'lastName'  => $this->message['lastName'],
            'content'   => $this->message['content'],
            'email'     => $this->message['email'],
            'id'        => $this->message['id'],
            'url'       =>  route('showMessages', $this->message['id']),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
