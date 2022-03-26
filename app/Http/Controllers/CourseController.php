<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    
    public function index()
    {   
        // $course = Course::first();
        $url = request()->url();
        $courses = Course::with('courseUsers', 'lessons')->get();
        return view('admin.courses.index', compact('url', 'courses'));
    }

    
    public function create()
    {
        $url = request()->url();
        return view('admin.courses.create', compact('url'));
    }

    
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'course_name' => ['required', 'max:255'],
            'course_price' => ['required', 'integer'],
            'overview' =>['required',],
            'type' => ['required',],
            'cover_image' => ['required','image'],
            'vimeo' => [],
            'media' => [],
            'body' => [],
        ]);
        
        if($request->type == 'vimeo' && $request->vimeo) {
            $data = array_merge($data, ['media' => $request->vimeo]);
        }
        if($request->type != 'vimeo' && $request->media){
            
            $mediaPath = $request->media->store('courses', 'public');
            if($request->type == 'image') {
                $image = Image::make($request->file('media')->getRealPath())->fit(750,500);
                $image->save('storage/' . $mediaPath);
            }
            $data = array_merge($data, [
                'media' => '/storage/' . $mediaPath,
                'media_name' => $request->media->getClientOriginalName(),
                'media_size' => number_format((float)$request->media->getSize()/1024/1024, 2, '.', ''),
            ]);
        }
        
        $imagePath = $request->cover_image->store('courses', 'public');
        $image = Image::make($request->file('cover_image')->getRealPath())->fit(500,300);
        $image->save('storage/' . $imagePath);
        
        $data = array_merge($data, ['cover_image' => '/storage/'. $imagePath]);
        Course::create($data);
        return redirect()->route('admin.courses');
    }

    
    public function show(Course $course)
    {
        $url = request()->url();
        // dd($course->has_sale(4));
        $courses = Course::with('courseUsers', 'lessons')->get();
        return view('admin.courses.show', compact('url', 'course', 'courses'));
    }

    
    public function edit(Course $course)
    {
        $url = request()->url();
        return view('admin.courses.edit', compact('url', 'course'));
    }

    
    public function update(Request $request, Course $course)
    {
        $data = $this->validate($request, [
            'course_name' => ['required', 'max:255'],
            'course_price' => ['required', 'integer'],
            'overview' =>['required',],
            'type' => ['required',],
            'body' => [],
        ]);
        
        $data = array_merge($data, [
            'media' => $course->media
        ]);
        
        if($request->vimeo) {
            $data = array_merge($data, [
                'media' => $request->vimeo
            ]);
        }
            
        if($request->media) {
            $mediaPath = $request->media->store('courses', 'public');
            if($request->type == 'image') {
                $image = Image::make($request->file('media')->getRealPath())->fit(750,500);
                $image->save('storage/' . $mediaPath);
            }
            $data = array_merge($data, [
                'media' => '/storage/' . $mediaPath,
                'media_name' => $request->media->getClientOriginalName(),
                'media_size' => number_format((float)$request->media->getSize()/1024/1024, 2, '.', ''),
            ]);
        }
        
        if($request->cover_image){
        
            $imagePath = $request->cover_image->store('courses', 'public');
            $image = Image::make($request->file('cover_image')->getRealPath())->fit(500,300);
            $image->save('storage/' . $imagePath);
            
            $data = array_merge($data, ['cover_image' => '/storage/'. $imagePath]);
        }
        
            
        $course->update($data);
        return back();
    }

    
    public function delete(Course $course)
    {
        $course->delete();
        return back();
    }
    
    public function active(Request $request, Course $course)
    {
        // dd($request->active);
        
        DB::update("update courses set active = ? where id = ?", [$request->active ? 0 : 1, $course->id]);
        return back();
    }
}
