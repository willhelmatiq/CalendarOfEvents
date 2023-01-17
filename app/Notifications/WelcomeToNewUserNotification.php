<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeToNewUserNotification extends Notification
{
    use Queueable;
    private $myEvents;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($myEvents)
    {
        $this->myEvents = $myEvents;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $list = $this->myEvents->map(fn ($a) => '<a href="'.route('events.show', $a->id)."\">$a->title</a>")->implode(', ');
        return (new MailMessage)
            ->greeting("Hello Саша,")
            ->subject('Я тебя люблю. Будем ложиться спать?')
            ->line('The introduction to the notification.')
            ->line('Interested in our latest events? Look at one of the following:<br/>'.$list.'.')
            ->action('Log in and complete your profile', url('/home/profile'))
            ->line('Thank you for using our application!')
            ->salutation('Greetings from the full team');
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
            //
        ];
    }
}
