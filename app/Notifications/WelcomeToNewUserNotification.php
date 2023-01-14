<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeToNewUserNotification extends Notification
{
    use Queueable;
    private $articles;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        $this->articles = $articles;
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
        $list = $this->articles->map(fn ($a) => '<a href="'.route('articles.show', $a->id)."\">$a->title</a>")->implode(', ');
        return (new MailMessage)
            ->greeting("Hello {$notifiable->name},")
            ->subject('Welcome to Harbour Space Demo')
            ->line('The introduction to the notification.')
            ->line('Interested in our latest publications? Read one of the following:<br/>'.$list.'.')
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
