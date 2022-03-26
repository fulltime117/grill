<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AboutusController extends Controller
{
    public function __construct()
    {
    
    }
    
    
    
    public function show()
    {
        
        $url = request()->url();
        $contactus = Contactus::find(1);
        return view('admin.contactus.show');
    }
    
    public function edit()
    {
        $url = request()->url();
        $aboutus = Aboutus::find(1);
        return view('admin.aboutus.edit', compact('url', 'aboutus'));
    }
    
    public function update(Request $request)
    {
        $data = $request->only('banner_title', 'title', 'body');
       
        if($request->file('banner')) {
            $imagePath = $request->file('banner')->store('aboutus', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1920,500);
            $image->save('storage/' . $imagePath);
            $data = array_merge(
                $data, 
                ['banner' => '/storage/' . $imagePath]);
        }
        
        if($request->file('image')) {
            $imagePath = $request->file('image')->store('aboutus', 'public');
            $image = Image::make($request->file('image')->getRealPath())->fit(1000,1000);
            $image->save('storage/' . $imagePath);
            $data = array_merge(
                $data, 
                ['image' => '/storage/' . $imagePath]);
        }
        // dd($request->all(), $data); 
        DB::table('aboutuses')->where('id', $request->id)->update($data);
        return back();
    }
    
    
}
