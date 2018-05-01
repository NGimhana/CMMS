<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduledJobNotification extends Notification
{
    use Queueable;
    public $job;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            //DataBase Columns
            'id' => $this->job->id,
            'type' => $this->job->type,
            'asset_id' => $this->job->asset_id,
            'priority' => $this->job->priority,
            'Scheduled_Date' => $this->job->Scheduled_Date,
            'End_Year' => $this->job->End_Year,
            'frequency' => $this->job->frequency,
            'Ended_Date' => $this->job->Ended_Date,
            'created_user_id' => $this->job->created_user_id,
            'assigned_person' => $this->job->Assigned_Person_id,
            'description' => $this->job->description,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return BroadcastMessage
     */
//    public function toBroadcast($notifiable)
//    {
//        return new BroadcastMessage([
//            //DataBase Columns
//            'id' => $this->job->id,
//            'type' => $this->job->type,
//            'asset_id' => $this->job->asset_id,
//            'priority' => $this->job->priority,
//            'Scheduled_Date' => $this->job->Scheduled_Date,
//            'End_Year' => $this->job->End_Year,
//            'frequency' => $this->job->frequency,
//            'Ended_Date' => $this->job->Ended_Date,
//            'created_user_id' => $this->job->created_user_id,
//            'assigned_person' => $this->job->Assigned_Person_id,
//            'description' => $this->job->description,
//        ]);
//    }

}
