<?php

namespace App\Http\Controllers;

use Config;
use App\Models\User;
use App\Models\Course;
use App\Models\Profile;
use Twilio\Rest\Client;
use App\Models\Location;
use App\Models\Usertemp;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Twilio\Exceptions\RestException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   
    public function index()
    {   
        $users = User::whereDoesntHave('roles')->with('profile')->get();
        $url = request()->url();
        return view('admin.users.index', compact('users', 'url'));
    }
    
    public function create()
    {   
        $url = request()->url();
        $courses = Course::where('active', '1')->get();
        return view('admin.users.create', compact('url', 'courses'));
    }
    
    public function edit(User $user) 
    {
        $url = request()->url();
        return view('admin.users.edit', compact('user', 'url'));
    }
    
   
    
    // user register himself with ask_pay
    public function storeUser(Request $request)
    {   
        $data = $this->validate($request, [
            'firstname' => ['required', 'max:50'],
            'lastname' => ['required', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'identity' => ['required', 'numeric', 'unique:users'],
            'address' => ['required', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
            'course_id' => [],
        ]);
        
        $phone_number = '+972' . str_replace("-", "", $request->phone);
        $phone_token = md5($phone_number . date('Y-m-d H:i:s'));
        
        DB::table('usertemps')->upsert(
            array_merge($data, 
                ['phone_token' => $phone_token], 
                ['phone' => $phone_number],
                ['ask_pay' => true],
                ['created_at'=>NOW(), 'updated_at'=>NOW()]
            ),
            ['email', 'course_id', 'phone'],
            ['phone_token', 'firstname', 'lastname', 'identity', 'company', 'address', 'password', 'updated_at']
        );
        
        
        DB::table('usertemps')->where('phone_token', $phone_token)->update([
            'lessons'=>NULL, 
            'amount'=>NULL,
            'coupon_code'=> NULL
        ]);
        
        if($request->selectedLessons){
            // spilt payment
            DB::table('usertemps')->where('phone_token', $phone_token)->update(['lessons'=>$request->selectedLessons, 'amount'=>$request->amountToPay_1]);   
        }
        
        // send sms
        $usertemp_id = DB::table('usertemps')->where('phone_token', $phone_token)->first()->id;
        $message = "Please click " . route('contract', $phone_token) . " for contract.";
        $twilio = new Client(config('t.acc_sid'), config('t.acc_auth'));
        try {
            $msg = $twilio->messages
                ->create($phone_number,
                    ["body" => $message, "from" => config('t.phone_number')]
                );
            return response()->json($usertemp_id);
        } catch(RestException $e) {
            return response()->json('wrong phone number');
        }

    }
    
    
    // user already registered
    public function storeUser2(User $user, Course $course, Request $request)
    {
        // store authUser into temp for contract
        $phone_number = '+972' . str_replace("-", "", $user->phone);
        $phone_token = md5($phone_number . date('Y-m-d H:i:s'));
        
        $data = [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email, 
            'phone' => $phone_number, 
            'identity' => $user->identity,
            'address' => $user->address,
            'company' => $user->company,
            'password' => '0',
            'course_id' => $course->id,
            'phone_token' => $phone_token,
            'ask_pay' => true,
        ];
        
        DB::table('usertemps')->upsert(
            array_merge($data, 
                ['phone_token' => $phone_token], 
                ['phone' => $phone_number],
                ['ask_pay' => true],
                ['created_at'=>NOW(), 'updated_at'=>NOW()]
            ),
            ['email', 'course_id', 'phone'],
            ['phone_token', 'firstname', 'lastname', 'identity', 'company', 'address', 'password', 'updated_at']
        );
        
        DB::table('usertemps')->where('phone_token', $phone_token)->update([
            'lessons'=>NULL, 
            'amount'=>NULL,
            'coupon_code'=> NULL
        ]);
        
        if($request->selectedLessons){
            // spilt payment
            DB::table('usertemps')->where('phone_token', $phone_token)->update([
                'lessons'=>$request->selectedLessons, 
                'amount'=>$request->amountToPay_1,
                'coupon_code'=> NULL
            ]);   
        }
        if($request->coupon_code){
            DB::table('usertemps')->where('phone_token', $phone_token)->update([
                'coupon_code' => $request->coupon_code, 
                'amount' => $request->amountToPay_2,
                'lessons'=>NULL,
            ]);  
        }
        
        // send sms
        $usertemp_id = DB::table('usertemps')->where('phone_token', $phone_token)->first()->id;
        $message = "Please click " . route('contract', $phone_token) . " for contract.";
        $twilio = new Client(config('t.acc_sid'), config('t.acc_auth'));
        try {
            $msg = $twilio->messages
                ->create($phone_number,
                    ["body" => $message, "from" => config('t.phone_number')]
                );
            return response()->json($usertemp_id);
        } catch(RestException $e) {
            return response()->json('wrong phone number');
        }
        
    }
    
    
     // admin register new user without ask_pay
     public function store_temp(Request $request)
     {
         $data = $this->validate($request, [
             'firstname' => ['required', 'max:50'],
             'lastname' => ['required', 'max:50'],
             'email' => ['required', 'email', 'unique:users'],
             'phone' => ['required', 'numeric', 'unique:users'],
             'identity' => ['required', 'numeric', 'unique:users'],
             'company' => ['required'],
             'address' => ['required', 'max:255'],
             'password' => ['required', 
                             'min:8', 
                             'confirmed'],
             'course_id' => [],
         ]);
         $phone_number = '+972' . str_replace("-", "", $request->phone);
         $phone_token = md5($phone_number . date('Y-m-d H:i:s'));
         Usertemp::create(array_merge($data, ['phone_token' => $phone_token], ['phone' => $phone_number]));
         return response()->json(['contract_url' => route('contract', $phone_token), 'token'=>$phone_token]);
     }
     
    
    
    public function send_sms(Request $request)
    {
        $user = Usertemp::where('phone_token', $request->token)->first();
        $message = "Please click " . route('contract', $request->token) . " for contract.";
        $twilio = new Client(config('t.acc_sid'), config('t.acc_auth'));
        try {
            $msg = $twilio->messages
                ->create($user->phone,
                    ["body" => $message, "from" => config('t.phone_number')]
                );
            return response()->json($user->id);
        } catch(RestException $e) {
            return response()->json('wrong phone number');
        }
    }
    
    
    public function resend_sms(Request $request)
    {
        $user = Usertemp::find($request->temp_id);
        
        if(!$user->phone_token) {
            return response()->json("phone_token is not exist, don't think in this case now");
        }
        $user->phone_token = md5($user->phone . date('Y-m-d H:i:s'));
        $user->save();
        
        $message = "Please click " . route('contract', $user->phone_token) . " for contract.";
        $twilio = new Client(config('t.acc_sid'), config('t.acc_auth'));
        try {
            $msg = $twilio->messages
                ->create($user->phone,
                    ["body" => $message, "from" => config('t.phone_number')]
                );
            
            return response()->json($user->id) ;
        } catch(RestException $e) {
            return response()->json('wrong phone number');
        }
    }
    
    public function remove_token(Request $request)
    {
        
        $user = Usertemp::find($request->temp_id);
        if($user == null) {
            // user already payed.
            return response()->json(1) ;    
        }
        
        // user didn't sign in 15 min.        
        $user->update(['phone_token' => '']);
        return response()->json(0) ;    
    }
    
    
    public function check_sign(Request $request)
    {
        $user = Usertemp::where('phone_token', $request->token)->first();
        if($user && $user->sign_data){
            return response()->json('1');
        }
        return response()->json('0');
    }
    
    public function save_user(Request $request)
    {
        
        // store into real user table from temp
        $temp_user = Usertemp::where('phone_token', $request->token)->first();
        $user = Usertemp::select('firstname', 'lastname', 'email', 'phone', 'identity', 'password', 'address', 'company')
            ->where('phone_token', $request->token)->first()->toArray();
            
        $password = ['password' => Hash::make($temp_user->password)];
        $phone = ['phone' => substr($temp_user->phone, 4)];
        $user = User::create(array_merge($user, $password, $phone));
        
        // update course_user table
        DB::table('course_user')->insert([
            'user_id' => $user->id,
            'course_id' => $temp_user->course_id,
            'active' => 1,
            'lesson_number' => 1,
            'sign_data' => $temp_user->sign_data,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        // send register email to user to access website
        Mail::to($temp_user->email)
            ->send(new RegisterMail($temp_user));
        
        Usertemp::where('phone_token', $request->token)->delete();      
        return response()->json('1');
        
    }
    
    public function show(User $user) 
    {
        $url = request()->url();
        return view('admin.users.show', compact('url', 'user'));
    }
    
    public function update(User $user, Request $request) 
    {
        $data1 = $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id),],
            'company' => ['required',],            
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($user->id),],
            'identity' => ['required', 'numeric', Rule::unique('users')->ignore($user->id),],
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
            $url = Storage::url($imagePath);
            
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
        
        return back();
        
    }
    
    public function delete(User $user) 
    {
        // delete all notifications for this user
        DB::table('notifications')->where('data', 'LIKE', '%{"user_id":"'.$user->id.'"%')->delete(); 
        
        $user->delete();
        return back();
    }
    
    public function active(Request $request, User $user)
    {
        // dd($request->active);
        
        DB::update("update users set status = ? where id = ?", [$request->active ? 0 : 1, $user->id]);
        return back();
    }
    
    public function logs()
    {
        $url = request()->url();
        $logs = Location::latest()->get();
        return view('admin.users.logs', compact('logs', 'url'));
        
    }
    
    public function user_logs(User $user)
    {
        $url = request()->url();
        $logs = $user->locations()->latest()->get();
        $view_all = true;
        return view('admin.users.logs', compact('logs', 'url', 'view_all', 'user'));
    }
}
