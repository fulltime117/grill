<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Traits\MyTrait;
use Illuminate\Http\Request;
use App\Notifications\ChatNotify;

class MessageController extends Controller
{

    use MyTrait;
    
    public function index(Request $request) 
    {
        $url = $request->url();
        $users = User::whereDoesntHave('roles')->latest()->get();
        return view('admin.chat.index', compact('users', 'url'));
    }
    
    
    // in case admin
    public function chat(Request $request, User $user)
    {
        $admin = $request->user(); // this is admin;
        
        $unreadNotifications = auth()->user()->unreadNotifications()
			->where('type', 'App\Notifications\ChatNotify')
			->where('data', 'LIKE','%'.$user->id.'%')->get();
		if ($unreadNotifications) {
			$unreadNotifications->markAsRead();
        }
        
        // create channel for chat
        $this->create_channel($user);
        
        return view('admin.chat.chat', compact('admin', 'user'));
    }
    
    public function mark_as_read($admin){
		$unreadNotifications = auth()->user()->unreadNotifications()
			->where('type', 'App\Notifications\ChatNotify')
			->where('data', 'LIKE','%'.$admin->id.'%')->get();
		if ($unreadNotifications) {
			$unreadNotifications->markAsRead();
			return response()->json([
				'type' => 'unreadNotifications',
				'person_id' => $admin->id
			]);
		}	
    }
    
    
    // in case user
    public function chat_user(Request $request, User $user)
    {
        $this->authorize('view', $user);
        $otherUser = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first(); // admin;
        return view('client.chat', compact('user', 'otherUser'));
    }
    
    
    // in case user send chat to admin
    public function store(Request $request) {
        
        $admin = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first();
        $message = [
			'user_id' => $request->authUser_id,
			'message'=>$request->message,
		];
		$admin->notify(new ChatNotify($message));	
    }
    
}
