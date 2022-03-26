<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Mail\CouponMail;
use App\Mail\BlockedMail;
use App\Mail\DiplomaMail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function emails()
    {
        
    }
    
    public function welcome()
    {
        $url = request()->url();
        return view('admin.emails.welcome', compact('url'));
    }
    
    public function send(Request $request)
    {
        $user = User::find(2);
        $course = Course::find(1);
        // $user->passowrd = "some password";
        $data = [
            'user' => $user,
            'coupon_code' => 'Abse-3fsf-eff',
            'course' => $course
        ];
        
        Mail::to('difficulttask@outlook.com')->send( new SendMail(['subject'=>"subject", 'body' => 'body']));
        
        Mail::to($user->email)->send(new CouponMail($data));
        // Mail::to('difficulttask@outlook.com')
        //             ->send(new DiplomaMail(['user_id'=>'2', 'course_id'=>'1',]));
        
        return back()->with('success', 'Email sent successfully');
        
    }
    
    public function register(Request $request, User $user)
    {
        $data = [
            'subject' => $request->subject,
            'body' => $request->body,
            'user' => $user,
        ];
        
        
        
        Mail::to('difficulttask@outlook.com')
            ->send(new RegisterMail($data));
        
        return back()->with('success', 'Email sent successfully');
        
    }
}
