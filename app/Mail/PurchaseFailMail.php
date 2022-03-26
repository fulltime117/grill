<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseFailMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $course;
        
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($temp_user)
    {
        $this->user = User::find($temp_user['user_id']);
        $this->course = Course::find($temp_user['course_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.purchasefail', [
            'user' => $this->user,
            'course' => $this->course,
        ]);
    }
}
