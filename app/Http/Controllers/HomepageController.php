<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HomepageController extends Controller
{
    public function edit()
    {
    
        $url = request()->url();
        $welcome1 = Homepage::where('type', 'welcome1')->first();
        $welcome2 = Homepage::where('type', 'welcome2')->first();
        $course = Homepage::where('type', 'course')->first();
        $why = Homepage::where('type', 'why')->first();
        $post = Homepage::where('type', 'post')->first();
        $partner1 = Homepage::where('type', 'partner1')->first();
        $partner2 = Homepage::where('type', 'partner2')->first();
        $partner3 = Homepage::where('type', 'partner3')->first();
        $partner4 = Homepage::where('type', 'partner4')->first();
        $footer_logo = Homepage::where('type', 'footer_logo')->first();
        return view('admin.homepages.edit', compact('url', 'welcome1', 'welcome2', 'course', 'why', 'post', 'partner1', 'partner2', 'partner3', 'partner4', 'footer_logo'));
    }
    
    public function update(Request $request)
    {
        if($request->type == 'welcome1'){
            
            $data = $request->only('title', 'body');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(1900,900);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'welcome1')->update($data);
            return back();            
        }
        
        if($request->type == 'welcome2'){
            $data = $request->only('title', 'body');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(1900,900);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'welcome2')->update($data);
            return back();            
        }
        
        if($request->type == 'course'){
            $data = $request->only('title', 'body');
            DB::table('homepages')->where('type', 'course')->update($data);
            return back();            
        }
        
        if($request->type == 'why'){
            $data = $request->only('title', 'body', 'items');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(845,638);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'why')->update($data);
            return back();            
        }
        
        if($request->type == 'post'){
            $data = $request->only('title', 'body');
            DB::table('homepages')->where('type', 'post')->update($data);
            return back();            
        }
        
        if($request->type == 'partner1'){
            $data = $request->only('title', 'body', 'items');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(400,400);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'partner1')->update($data);
            return back();            
        }
        
        
        if($request->type == 'partner2'){
            $data = $request->only('title', 'body', 'items');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(400,400);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'partner2')->update($data);
            return back();            
        }
        
        
        if($request->type == 'partner3'){
            $data = $request->only('title', 'body', 'items');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(400,400);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'partner3')->update($data);
            return back();            
        }
        
        
        if($request->type == 'partner4'){
            $data = $request->only('title', 'body', 'items');
            if($request->file('image')){
                $imagePath = $request->file('image')->store('homepages', 'public');
                $image = Image::make($request->file('image')->getRealPath())->fit(400,400);
                $image->save('storage/' . $imagePath);
                $data = array_merge($data, ['image' => '/storage/' . $imagePath]);
            }
            DB::table('homepages')->where('type', 'partner4')->update($data);
            return back();            
        }
        
        
        if($request->type == 'footer_logo'){
            $data = $request->only('body');
            if($request->file('image')){
                $name = time().'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('storage/homepages'), $name);
                $data = array_merge($data, ['image' => '/storage/homepages/' . $name]);
            }
            DB::table('homepages')->where('type', 'footer_logo')->update($data);
            return back();            
        }
        
        
    }
}
