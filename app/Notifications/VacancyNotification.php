<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VacancyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vacancy $vacancy)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('We have a new vacancy you may interest!')
            ->line('This is a Graduate Management System Kurunegala, You have new vacancies on HRDA Kurunegala.Plase contact us to get more details.')
            ->action('View vacancy', url('https://hrdasite.qa.ceytechsystemsolutions.com'))
            ->line('Thank you for using our application!');
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

    public function toDatabase($notifiable)
    {
        return [
            // 'notifiable_id' => $notifiable->id,
            // 'notifiable_type' => $notifiable->type,
            // 'type' => $notifiable->type,
            // 'read_at' => $notifiable->read_at,
            // 'graduate_id' => 1,
        ];
    }

    // public function toNexmo($notifiable)
    // {
    //     return (new NexmoMessage)
    //         ->content('Hello World! this is a Graduate system North Western Province');
    // }
}
