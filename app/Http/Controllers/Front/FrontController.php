<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Post;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Usertemp;
use App\Models\Contactus;
use App\Models\OtherPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function getSiteInfo() 
    {
    //    dd('getSiteInfo');
    }
    
    
    public function index() 
    {
        $coming_soon = Setting::where('type', 'coming_soon')->first();
        if($coming_soon->active) {
            return view('coming_soon');
        }
        
        $contactus = Contactus::find(1);
        $posts = Post::orderBy('updated_at', 'desc')->paginate(3);
        $users = User::whereDoesntHave('roles')->paginate(5);
        $courses = Course::orderBy('updated_at', 'desc')->where('active', '1')->paginate(3);

        // homepages
        $welcome1 = DB::table('homepages')->where('type', 'welcome1')->first();
        $welcome2 = DB::table('homepages')->where('type', 'welcome2')->first();
        $why = DB::table('homepages')->where('type', 'why')->first();
        $frontpost = DB::table('homepages')->where('type', 'post')->first();
        $frontcourse = DB::table('homepages')->where('type', 'course')->first();
        $partner1 = DB::table('homepages')->where('type', 'partner1')->first();
        $partner2 = DB::table('homepages')->where('type', 'partner2')->first();
        $partner3 = DB::table('homepages')->where('type', 'partner3')->first();
        $partner4 = DB::table('homepages')->where('type', 'partner4')->first();

        // contact info
        $contact = Contactus::find(1)->get()[0];

        
        return view('front.index', compact(
            'welcome1', 'welcome2', 'why', 'frontcourse', 'frontpost', 'partner1', 'partner2', 'partner3', 'partner4', 
            'contact',
            'posts',
            'users', 
            'courses', 
            'contactus'));
    }
    
    
    public function contactus() 
    {
        $contactus = Contactus::find(1);
        return view('front.contactus', compact('contactus'));
    }
    
    
    public function aboutus() 
    {
        $aboutus = DB::table('aboutuses')->where('id', '1')->first();
        return view('front.aboutus', compact('aboutus'));
    }
    
    
    public function courses() 
    {
        $banners = DB::table('banners')->where('type', 'course')->first();
        $courses = Course::where('active', '1')->with('lessons')->paginate(6);
        return view('front.courses', compact('courses','banners'));
    }
    
    public function static($slug)
    {
        $page = DB::table('footers')->where(['slug'=>$slug, 'published'=>true])->first();
        return view('front.static', compact('page'));
    }
    


    public function coursedetail(Course $course) 
    {   
        // dd(auth()->user()->userCourses, auth()->user()->userCourses->find($course));
        
        $progressing_lesson_number = 0;
        if(auth()->user()) {
            
            if(auth()->user()->userCourses->contains($course)) {
                $purchasedCourse = auth()->user()->userCourses->find($course);
                
                if($purchasedCourse->id == $course->id) {
                    $progressing_lesson_number = $purchasedCourse->pivot->lesson_number;
                }
                // dd($purchasedCourse->pivot->lesson_number);
            }
        }
        // dd($progressing_lesson_number);
        $courses = Course::where('active', '1')->with('lessons')->paginate(6);
        return view('front.coursedetail', compact('course', 'courses', 'progressing_lesson_number'));    
    }
    
    public function lessondetail(Lesson $lesson) 
    {
        $this->authorize('view', $lesson);
        return view('client.lessondetail', compact('lesson'));
    }
    
    // added controller
    
    public function faq() 
    {
        $faqs = Faq::get();
        return view('front.faqs.index', compact('faqs'));
    }

    public function contract($token)
    {
        $user = Usertemp::where('phone_token', $token)->with('course')->first();
        $course = Course::find($user->course_id); 
        $discount = null;
        if($user->coupon_code){
            $coupon_code = $user->coupon_code;
            $coupon_user = DB::table('coupon_user')->where(['coupon_code'=>$coupon_code])->first();
            $discount = Coupon::find($coupon_user->coupon_id)->discount;
        }
        if($user == null) {
            return view('errors.error404');
        }
        $contract_content = DB::table('contract_content')->first()->content;
        return view('front.contract', compact('user', 'contract_content', 'course', 'discount'));
    }
    
    public function complete_contract($token)
    {
        $user = Usertemp::where('phone_token', $token)->with('course')->first();
        if($user == null) {
            return view('errors.error404');
        }
        Usertemp::where('phone_token', $token)->update(['sign_data' => request()->sign_data]);
        return view('front.complete_contract');
    }

}
