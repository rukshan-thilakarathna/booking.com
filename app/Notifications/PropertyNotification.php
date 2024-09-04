<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Orchid\Platform\Notifications\DashboardChannel;
use Illuminate\Notifications\Notification;
use Orchid\Platform\Notifications\DashboardMessage;

class PropertyNotification extends Notification
{
    use Queueable;

    public $title = '';
    public $text = '';

    /**
     * Create a new notification instance.
     */
    public function __construct($title , $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return [DashboardChannel::class];
    }

    public function toDashboard($notifiable)
    {
        return (new DashboardMessage)
            ->title($this->title)
            ->message( $this->text);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
