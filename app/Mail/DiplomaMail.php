<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiplomaMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $course;
        
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user = User::find($data['user_id']);
        $this->course = Course::find($data['course_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.diploma', [
            'user' => $this->user,
            'course' => $this->course,
        ]);
    }
}
