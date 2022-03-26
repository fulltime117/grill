<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    
    public function store(Request $request) {
        
        
        $data = $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'username' => ['required', 'max:255', 'unique:users'],
            'phone' => ['required', 'integer', 'unique:users'],
            'identity' => ['required', 'integer', 'unique:users'],
            'company' => [],
            'address' => ['required', 'max:255'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        
        $password = ['password' => Hash::make($request->password)];
        if(User::create(array_merge($data, $password))){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            
            return redirect()->route('admin.dashboard.home');
        }
        
        return redirect()->route('login');
    }
}
