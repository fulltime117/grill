<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Course;
use App\Models\Profile;
use App\Mail\BlockedMail;
use App\Http\Traits\MyTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    use MyTrait;
    
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function ipcheck(User $user)
    {
        if(!$user->status){
            Auth::logout();
            return redirect( route('login') )->with('blocked', 'Your account seems to be blocked. Please contact to admin.');
        }
        
        if($user->locations->pluck('login')->contains('1'))
        {
            // already logged in
            return redirect(route('client.profile', $user));
        }
        
        $ips = $user->locations->pluck('ip')->unique()->toArray();
        array_push($ips, request()->ip());
        if(collect($ips)->unique()->count() > 3){
            // blocked this user
            User::where('id', $user->id)->update(['status' => '0']);
            Auth::logout();
            
            // send mail for notifying blocked account
            Mail::to($user->email)->send(new BlockedMail($user));
            
            return redirect( route('login') )->with('ip_over', 'You looks like to attempt 3 ip addresses over');
        }
        // $position = Location::get('192.168.1.1');
        // dd($position);
        $user->locations()->create([
            'ip' => request()->ip(),
            'login' => '1',
        ]);
        
        
        //create channel;
        $this->create_channel($user);
        return redirect(route('client.courses', $user));
    
    }
    
    public function dashboard(User $user) 
    {   
        $this->authorize('view', $user);
        $purchasedCourses = $user->userCourses;
        $posts = $user->posts;
        
        $total_expense = 0;
        foreach ($purchasedCourses as $course){
            $total_expense += $course->course_price;
        }
        
        // dd($posts, $total_expense);
        return view('client.dashboard', compact('user', 'purchasedCourses', 'posts', 'total_expense'));
    }
    
    
    public function profile(User $user) 
    {
        $this->authorize('view', $user);
        return view('client.profile', compact('user'));
    }
    
    public function edit(User $user)
    {
        $this->authorize('view', $user);
        return view('client.users.edit', compact('user'));
    }    
    
    public function update(User $user, Request $request)
    {
        $this->authorize('view', $user);
        
        $data1 = $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id),],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($user->id),],
            'identity' => ['required', 'numeric', Rule::unique('users')->ignore($user->id),],
            'company' => ['required'],
            'address' => ['required', 'max:255'],
        ]);
        
        if($request->password) {
            $this->validate($request, [
                'password' => ['required', 'confirmed', 'min:6']
            ]);
            $password = ['password' => Hash::make($request->password)];
            $user->update(array_merge($data1, $password));
        }else {
            $user->update($data1);
        }
        
        if($request->image) {
            $imagePath = $request->image->store('profile', 'public');
            $image = Image::make($request->file('image')->getRealPath())->fit(200,200);
            $image->save('storage/' . $imagePath);
            
            $user->profile->update([
                'image' => '/storage/' . $imagePath,
            ]);
        }
        
        if($request->dob) {
            $profile = Profile::find($user->profile->id);
            $profile->dob = $request->dob;
            $profile->save();
        }
        
        
        $data3 = $this->validate($request, [
            'linkedin' => ['url', 'required'],
            'facebook' => ['url', 'required'],
            'twitter' => ['url', 'required'],
        ]);
        
        $user->link->update($data3);
        
        return redirect()->route('client.profile', $user);

    }    
    
    
    public function courses(User $user) 
    {
        $this->authorize('view', $user);
        $courses = $user->userCourses;
        $allCourses = Course::where('active', '1')->with('lessons')->paginate(6);
        return view('client.courses', compact('user', 'courses', 'allCourses'));
    }
    
    
    public function chat(User $user) 
    {
        $this->authorize('view', $user);
        return view('client.chat', compact('user'));
    }
    
    
    public function contact(User $user) 
    {
        $this->authorize('view', $user);
        $contacts = DB::table('contacts')->where('email', '=', $user->email)->latest()->get();
        return view('client.contact', compact('user', 'contacts'));
    }
    
    public function contact_store(User $user, Request $request) 
    {
        $this->authorize('view', $user);
        
        $request->validate([
            'message' => ['required'],
        ]);
        
        $data = [
            'name' => $user->firstname . ' ' . $user->lastname,
            'email' => $user->email, 
            'phone' => $user->phone,
            'body' => $request->message,
            'is_login' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('contacts')->insert($data);
        return back();
    }
    
    
    public function paymnet(User $user) 
    {
        $this->authorize('view', $user);
        $courses = $user->userCourses;
        return view('client.payment', compact('user', 'courses'));
    }

    public function diploma(User $user) 
    {
        $this->authorize('view', $user);
        $diplomas = $user->diplomas;
        return view('client.diploma',compact('user', 'diplomas'));
    }
    
    public function check_coupon(User $user, Request $request)
    {
        $coupon_code = $request->coupon_code;
        $coupon_user = DB::table('coupon_user')->where(['user_id'=>$user->id, 'coupon_code'=>$coupon_code])->first();
        if(!$coupon_user) {
            return ['status' => 'invalid'];
        }
        if( $coupon_user->use_date !== null ) {
            return ['status' => 'used'];
        }
        
        $coupon = DB::table('coupons')->where(['id'=>$coupon_user->coupon_id])->first();
        if( strtotime($coupon->expired) < strtotime(NOW()) ){
            // coupon was expired
            return ['status' => 'expired'];
        }
        
        // now coupon is valid to use
        return ['status' => 'valid', 'discount'=>$coupon->discount];
    }
}
