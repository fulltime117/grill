<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function post()
    {
        $url = request()->url();
        $post_page = Banner::where('type', 'post')->first(); 
        return view('admin.banners.post', compact('url', 'post_page'));
    }
    
    public function course()
    {
        $url = request()->url();
        $course_page = Banner::where('type', 'course')->first(); 
        return view('admin.banners.course', compact('url', 'course_page'));
    }
    
    public function course_update(Request $request)
    {
        $data = $request->only('title', 'id');
        if($request->file('banner')) {
            $imagePath = $request->file('banner')->store('banners', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1920,500);
            $image->save('storage/' . $imagePath);
            $data = array_merge(
                $data, 
                ['banner' => '/storage/' . $imagePath]);
        }
        DB::table('banners')->where('type','course')
            ->where('id', $request->id)
            ->update($data);
        return back();
    }
    
    public function post_update(Request $request)
    {
        $data = $request->only('title', 'id');
        if($request->file('banner')) {
            $imagePath = $request->file('banner')->store('banners', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1920,500);
            $image->save('storage/' . $imagePath);
            $data = array_merge(
                $data, 
                ['banner' => '/storage/' . $imagePath]);
        }
        
        DB::table('banners')->where('type','post')
            ->where('id', $request->id)->update($data);
        return back();
    }
    
    
}
