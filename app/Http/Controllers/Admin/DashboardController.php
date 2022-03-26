<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Setting;
use App\Models\Location;
use App\Models\Usertemp;
use App\Models\Comingsoon;
use Illuminate\Http\Request;
use App\Notifications\TestSuccess;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {   
        $url = request()->url();
        $total_users = User::whereDoesntHave('roles')->latest()->get();
        $blocked_users = User::whereDoesntHave('roles')->where('status', '0')->get();
        $pending_users = Usertemp::where('phone_token', '')->get();
        $total_courses = Course::get();
        $pending_courses = Course::where('active', '0')->get();
        $total_lessons = Lesson::get();
        $pending_lessons = Lesson::where('active', '0')->get();
        $total_orders = DB::table('course_user')->get();
        $pending_orders = DB::table('course_user')->where('active', '0')->get();
        
        $online_users = Location::where('login', '1')->with('user')->get();
        $total_visited_users = Location::pluck('user_id')->unique();
        
        $testResults = auth()->user()->notifications
            ->where('type', 'App\Notifications\TestSuccess')
            ->where('read_at', NULL)
            ->all();
        $contactNotifies = auth()->user()->notifications
            ->where('type', 'App\Notifications\ContactNotify')
            ->where('read_at', NULL)
            ->all();
    
        // dd(auth()->user()->unreadNotifications);
        
        $courseBuyNotifications = auth()->user()->notifications
            ->where('type', 'App\Notifications\CourseBuyNotify')
            ->where('read_at', NULL)
            ->all();
        
        $incomes = DB::select('select c.course_price from course_user cu join courses c on c.id=cu.course_id where cu.active=1');
        $income = 0;
        foreach ($incomes as $p){
            $income += $p->course_price;            
        }
        
        $coming_soon = Setting::where('type', 'coming_soon')->first();
        
        return view('admin.dashboard.home', 
            compact(
                'url', 
                'total_users',
                'blocked_users',
                'pending_users',
                'total_courses',
                'pending_courses',
                'total_lessons',
                'pending_lessons',
                'total_orders',
                'pending_orders',
                'income',
                'online_users',
                'total_visited_users',
                'testResults',
                'contactNotifies',
                'courseBuyNotifications',
                'coming_soon',
            ));
    }
    
    public function calendar()
    {
        $url = request()->url();
        return view('admin.dashboard.calendar', compact('url'));
    }
    
}
