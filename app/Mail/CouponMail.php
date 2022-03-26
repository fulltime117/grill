<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CouponMail extends Mailable
{
    use Queueable, SerializesModels;
    
    
    public $user;
    public $course_ids;
    
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $course_ids)
    {
        $this->user = $user;
        $this->course_ids = $course_ids;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.coupon')
            ->subject('Coupon code is assigned to you!');
    }
}
