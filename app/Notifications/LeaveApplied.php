<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveApplied extends Notification implements ShouldQueue
{
    use Queueable;
    public $application;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
        // $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('Leave Applied Notification')
                    ->action('Notification Action', url('/'))
                    ->line('Your Application has been applied!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $team_lead = \App\User::where('id', $this->application->team_lead)->get();
        $url = route('app-view', ['id' => $this->application->id]);
        return [
            'url' => $url,
            'name' => $this->application->user->name,
            'useremail' => $this->application->user->email,
            'team_lead' => $team_lead[0]->name
        ];
    }
}
