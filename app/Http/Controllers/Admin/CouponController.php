<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Course;
use App\Mail\CouponMail;
use App\Models\CouponUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\CouponNotify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $url = request()->url();
        $users = User::whereDoesntHave('roles')->where('status','1')->get();
        $courses = Course::where('active', '1')->get();
        return view('admin.coupons.create', compact('url', 'users', 'courses'));
    }
    
    public function coupons()
    {
        $url = request()->url();
        $coupons = Coupon::all();
        $users = User::whereDoesntHave('roles')->where('status','1')->get();
        
        // dd($coupons);
        return view('admin.coupons.coupons', compact('url','coupons', 'users'));
    }
    
    public function store(Request $request)
    {
        // dump($request->all());
        $data = $request->only('name', 'body', 'expired', 'discount');
        if(!$request->expired){
            $data = array_merge($data, ['expired'=>'9999-12-31']);
        }
        $coupon = Coupon::create($data);
        
        $coupon_data = []; 
        foreach(json_decode($request->selected_users) as $user_id){
            
            $course_ids = [];
            foreach(json_decode($request->selected_courses) as $course_id){
                $uniqstr = strtoupper(uniqid(substr(sha1(time()), 0, 2)));
                $arr = str_split($uniqstr, 4);
                $uniqHypen = implode('-', $arr);
                $coupon_data[] = [
                    'user_id' => $user_id,
                    'course_id' => $course_id,
                    'coupon_id' => $coupon->id,
                    'coupon_code' => $uniqHypen,
                ];
                
                $course_ids[$course_id] = $uniqHypen;
            }
            
            
            // mail to user with coupon_code;  
            $user = User::find($user_id);
            Mail::to($user->email)->send(new CouponMail($user, $course_ids));                
        }
        DB::table('coupon_user')->insert($coupon_data);
        
        return back();
    }
    
    public function delete(Request $request, Coupon $coupon)
    {
        $coupon->delete();
        return back();
    }
    
    public function pivot_delete(request $request) 
    {
        DB::table('coupon_user')
            ->where([
                'coupon_id' => $request->coupon_id,
                'user_id' => $request->user_id,
                'course_id' => $request->course_id
            ])->delete();
        return response()->json(1);
    }
    
    
    
    // public function users()
    // {
    //     $url = request()->url();
    //     $users = User::whereDoesntHave('roles')->get();
        
    //     // dd(CouponUser::orderBy('coupon_id', 'desc')->get());
    //     // dd(Coupon::find(1)->users);
    //     // dd($coupons);
    //     return view('admin.coupons.users', compact('url','users'));
    // }
    
    // public function show(Coupon $coupon)
    // {
    //     $url = request()->url();
    //     return view('admin.coupons.index', compact('url'));
    // }
    
   
    
    
    // public function update(Request $request, Coupon $coupon)
    // {
    //     $coupon->update($request->only('name', 'body', 'expired', 'discount'));
    //     return back();
    // }
    
   
    
    // // ajax add users into this coupon
    
    
    // public function ajax_addusers($coupon)
    // {
    //     $users = User::whereDoesntHave('roles')->get();
    //     return view('admin.coupons.addusers', compact('users', 'coupon'));
    // }
    
    // public function addusers(Coupon $coupon)
    // {
    //     DB::table('coupon_user')->where('coupon_id', $coupon->id)->delete();
    //     if(request()->users){
    //         foreach (request()->users as $user) {
    //             DB::table('coupon_user')->insert([
    //                 ['user_id' => $user, 'coupon_id' => $coupon->id],
    //             ]);
    //         }
    //     }
    //     return response()->json(1);
    // }
    
    
    // public function ajax_addcoupons($user)
    // {
    //     $coupons = Coupon::all();
    //     return view('admin.coupons.addcoupons', compact('coupons', 'user'));
    // }
    
    // public function addcoupons(User $user)
    // {
    //     DB::table('coupon_user')->where('user_id', $user->id)->delete();
    //     $coupon_names = [];
    //     if(request()->coupons){
    //         foreach (request()->coupons as $coupon) {
    //             DB::table('coupon_user')->insert([
    //                 ['user_id' => $user->id, 'coupon_id' => $coupon],
    //             ]);
    //             $coupon_names[] = Coupon::find($coupon)->name;
    //         }
    //     }
        
    //     // send email to user for these coupons
        
    //     $user->notify(new CouponNotify([
    //         'user' => $user->firstname,
    //         'coupon' => implode(',', $coupon_names),
    //     ]));
    //     return response()->json(1);
    // }
}
