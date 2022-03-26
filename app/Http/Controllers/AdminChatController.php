<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function chat(Request $request) 
    {
        $url = $request->url();
        $users = User::whereDoesntHave('roles')->latest()->get();
        return view('admin.chat.chat', compact('users', 'url'));
    }
    
    public function chatwith(User $user) 
    {   
        return view('admin.chat.chatwith', compact('user'));
    }
    
}
