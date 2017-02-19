<?php

namespace App\Notifications;

use App\Models\Bid;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewBid extends Notification
{
    use Queueable;
    public $user;
    public $from;
    public $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Bid $bid, User $from)
    {
        $this->from = $from;
        $this->user = $user;
        $this->bid = $bid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = '/notifications/'. $this->id;
        return (new MailMessage)->markdown('emails.newbidmade',
            [
                'url' => $url,
                'bid' => $this->bid,
                'from' => $this->from
            ]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->bid->message,
            'from' => $this->from->name,
            'bid' => $this->bid->id
        ];
    }
}
