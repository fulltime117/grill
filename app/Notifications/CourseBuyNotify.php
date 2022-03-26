<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CourseBuyNotify extends Notification
{
    use Queueable;
    
    public $user_id;
    public $course_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($buyInfo)
    {
        $this->user_id = $buyInfo['user_id'];
        $this->course_id = $buyInfo['course_id'];
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
        $user = User::find($this->user_id)->first();
        $course = Course::find($this->course_id)->first();
        dd($user, $course);
        return (new MailMessage)
                    ->line('Buyer Name: ' . $user->firstname . ' ' . $user->lastname)
                    ->line('Course Name: ' . $course->course_name)
                    ->action('Please click this url', url('/login'))
                    ->line('Thank you for buying our course!');
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
            'user' => $this->user_id,
            'course' =>$this->course_id
        ];
    }
}
