<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ContactusController extends Controller
{
    public function __construct()
    {
    
    }
    
    
    public function index()
    {
        
    }
    
    public function show()
    {
        
        $url = request()->url();
        $contactus = Contactus::find(1);
        return view('admin.contactus.show');
    }
    
    public function edit(Contactus $contactus)
    {
        
        $url = request()->url();
        $contactus = Contactus::find(1);
        return view('admin.contactus.edit', compact('url', 'contactus'));
    }
    
    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => [],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'address' => ['required'],
            'business' => [],
            'post' => [],
        ]);
        
        if($request->file('image')) {
            $imagePath = $request->file('image')->store('contactus', 'public');
            $image = Image::make($request->file('image')->getRealPath())->fit(1000,1000);
            $image->save('storage/' . $imagePath);
            $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
        }
        
        if($request->file('banner')) {
            $imagePath = $request->file('banner')->store('contactus', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1920,600);
            $image->save('storage/' . $imagePath);
            $data = array_merge($data, ['banner' => '/storage/' . $imagePath]);
        }
        
        
        DB::table('contactuses')->where('id', $request->id)->update($data);
        return back();
    }
    
    
}
