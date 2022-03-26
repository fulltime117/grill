<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    public function store(Request $request)
    {
        
        $data = $this->validate($request, [
            'email' => ['required', 'email', 'max:255',],
            'password' => ['required', 'max:255'],
        ]);
        // dd($request->all(), auth()->attempt($request->only('email', 'password'), $request->remember));
        if(!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Invalid login details');
        }
        
        return redirect()->route('admin.dashboard.home'); // replace admin.home-dashboard
        
    }
    
    public function logout(User $user)
    {
        
        // dd($location, $location->created_at->timestamp, $location->updated_at);
        $user->locations()->where('login', 1)->update(['login' => 0, 'updated_at'=> NOW()]);
        Auth::logout();
        
        return redirect()->route('front');
    }
    
    public function admin_logout(User $user)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function forget()
    {
        return view('auth.forget');
    }
    
    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', ]
        ]);
        
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return back()->with('wrongemail', ' אנא בדוק את האיות של כתובת הדוא"ל שלך ');
        }
        $password = substr(md5($user->phone . date('Y-m-d H:i:s')), 0, 8);        
        $user->update(['password'=> Hash::make($password), 'updated_at'=>NOW()]);
        
        Mail::to($request->email)
            ->send(new ForgotPasswordMail([
                'user' => $user,
                'password' => $password,
            ]));
        
        return back()->with('mailsuccess', 'שלחנו אליך דואר. אנא בדוק את הדואר שלך.');
    }
    
}
