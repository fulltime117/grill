<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ContactNotify;

class ContactController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        $url = request()->url();
        $users = Contact::latest()->get();
        return view('admin.contact.index', compact('url', 'users'));
    }
    
    public function history()
    {
        $url = request()->url();
        // $contacts = Contacts::where('is_admin', 0)->get();
        return view('admin.contact.history', compact('url'));
    }
    
    public function store(Request $request)
    {   
        $contactInfo = [
            'name' => $request->firstname .' '. $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'body' => $request->message
        ];
        $contact = Contact::create($contactInfo);
        
        // notify to admin about testresult
        $admin = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first();
        
        $admin->notify(new ContactNotify($contactInfo));
        
        
        if($contact) {
            return response()->json('success');
        }
    }
    
}
