<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    use Queueable;
    public $newuser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newuser)
    {
        $this->newuser = $newuser;
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
    
    public function toArray($notifiable)
    {
        return [
            'user_id'=>$this->newuser['id'],
            'name'=>$this->newuser['name'],
            'email'=>$this->newuser['email']
        ];
    }
}
