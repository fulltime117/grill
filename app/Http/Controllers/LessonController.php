<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    // all lessons for all courses
    public function index()
    {
        $lessons = Lesson::with('course')->get();
        $url = request()->url();
        return view('admin.lessons.index', compact('url', 'lessons'));
    }
    
    // all lessons for specified course
    public function index_course(Course $course)
    {
        $lessons = $course->lessons()->where('active', '1')->with('questions')->get();
        $courses = Course::where('active', '1')->get();
        $url = request()->url();
        return view('admin.lessons.index', compact('url', 'lessons', 'course', 'courses'));
    }

    
    public function create()
    {
        $courses = Course::where('active', '1')->get();
        $url = request()->url();
        return view('admin.lessons.create', compact('url', 'courses'));
    }

    
    public function store(Request $request)
    {   
        // dd($request->all());
        $lessons_count = Lesson::where('course_id', $request->course_id)->count();
        if($request->type == 'vimeo') {
            
            $data = $this->validate($request, [
                'lesson_name' => ['required',],
                'lesson_image' => ['required', 'image'],
                'course_id' => ['required',],
                'type' => ['required',],
                'body' => [],    
            ]);
            
            $lessonImagePath = $request->lesson_image->store('lessons', 'public');
            
            $image = Image::make($request->file('lesson_image')->getRealPath())->fit(500,300);
            $image->save('storage/' . $lessonImagePath);
            
            $data = array_merge($data, [
                'lesson_image' => '/storage/' . $lessonImagePath,
                'media' => $request->vimeo,
            ]);
                    
        }else {
            $data = $this->validate($request, [
                'lesson_name' => ['required',],
                'lesson_image' => ['required', 'image'],
                'course_id' => ['required',],
                'type' => ['required',],
                'media' => ['required',],
                'body' => [],
            ]);
            
            $lessonImagePath = $request->lesson_image->store('lessons', 'public');
            $mediaPath = $request->media->store('lessons', 'public');
            if($request->type == 'image') {
                $image = Image::make($request->file('media')->getRealPath())->fit(750,500);
                $image->save('storage/' . $mediaPath);
            }
            $data = array_merge($data, [
                'lesson_image' => '/storage/' . $lessonImagePath,
                'media' => '/storage/' . $mediaPath,
                'media_name' => $request->media->getClientOriginalName(),
                'media_size' => number_format((float)$request->media->getSize()/1024/1024, 2, '.', ''),
            ]);
        }
        $saved = Lesson::create($data);
        DB::update('update lessons set lesson_number = ? where id = ?', [$lessons_count + 1, $saved->id]);
        return redirect()->route('admin.lessons');
        
    }
    
    public function store_with_questions(Request $request)
    {
        $lessons_count = Lesson::where('course_id', $request->course_id)->count();
        
        $data = $request->only('course_id', 'lesson_name', 'media', 'body');
        if($request->lesson_image) {
            $lessonImagePath = $request->lesson_image->store('lessons', 'public');
            $image = Image::make($request->file('lesson_image')->getRealPath())->fit(500,300);
            $image->save('storage/' . $lessonImagePath);
            $data = array_merge($data, ['lesson_image' => '/storage/' . $lessonImagePath ]);
        }
        $data = array_merge($data, ['lesson_number' => $lessons_count + 1], ['type' => 'vimeo']);
        $lesson_id = DB::table('lessons')->insertGetId($data);
        
        $allQuestions = [];
        for ($i=0; $i < count($request->q); $i++) { 
            $question = [
                'q' => $request->q[$i],
                'lesson_id'=> $lesson_id,
                'opt1' => $request->opt1[$i],
                'opt2' => $request->opt2[$i],
                'opt3' => $request->opt3[$i],
                'opt4' => $request->opt4[$i],
                'answer_number' => $request->answer_number[$i],
                'question_number' => $request->question_number[$i],
            ];
            $allQuestions[$i] = $question;
        }
        DB::table('questions')->insert($allQuestions);
        return "1";
    }
    
    public function update_with_questions(Lesson $lesson, Request $request) {
        // dd('update ajax only question');
        for ($i=0; $i < count($request->q); $i++) { 
            $question = [
                'q' => $request->q[$i],
                'lesson_id'=> $lesson->id,
                'opt1' => $request->opt1[$i],
                'opt2' => $request->opt2[$i],
                'opt3' => $request->opt3[$i],
                'opt4' => $request->opt4[$i],
                'answer_number' => $request->answer_number[$i],
                'question_number' => $request->question_number[$i],
            ];
            
            DB::table('questions')->where('id', $request->question_id[$i])->update($question);
        }
        return "1";
    }

    
    public function show(Lesson $lesson)
    {
        
        $url = request()->url();
        $lessons = $lesson->course->lessons;
        return view('admin.lessons.show', compact('url', 'lesson', 'lessons'));
    }

    
    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        $url = request()->url();
        return view('admin.lessons.edit', compact('url', 'courses', 'lesson'));
    }

    
    public function update(Request $request, Lesson $lesson)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'lesson_name' => ['required',],
            'course_id' => ['required',],
            'type' => ['required',],
            'body' => [], 
        ]);
        
        if($request->lesson_image){
            $lessonImagePath = $request->lesson_image->store('lessons', 'public');
            $image = Image::make($request->file('lesson_image')->getRealPath())->fit(500,300);
            $image->save('storage/' . $lessonImagePath);
            
            $data = array_merge($data, [
                'lesson_image' => '/storage/' . $lessonImagePath,
            ]);
            
        }
        
        if($request->type == 'vimeo') {
            $data = array_merge($data, [
                'media' => $request->vimeo,
            ]);
        }
        else {
            if($request->media){
                $mediaPath = $request->media->store('lessons', 'public');
                if($request->type == 'image') {
                    
                    $image = Image::make($request->file('media')->getRealPath())->fit(750,500);
                    $image->save('storage/' . $mediaPath);
                }
                $data = array_merge($data, [
                    'media' => '/storage/' . $mediaPath,
                    'media_name' => $request->media->getClientOriginalName(),
                    'media_size' => number_format((float)$request->media->getSize()/1024/1024, 2, '.', ''),
                ]);
            }else{
                $data = array_merge($data, [
                    'media' => $lesson->media,
                    'media_name' => $lesson->media_name,
                    'media_size' => $lesson->media_size,
                ]);
            }
        }
        $lesson->update($data);
        return back();
    }

    
    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        
        // decrease lesson number after deleted lesson
        // dump($lesson->course->lessons, $lesson->lesson_number);
        $afterLessons = $lesson->course->lessons()->where('lesson_number','>', $lesson->lesson_number)->get();
        if($afterLessons){
            foreach ($afterLessons as $le) {
                DB::update('update lessons set lesson_number = ? where id = ?', [$le->lesson_number - 1, $le->id]);
            }
        }
        // dd($afterLessons);
        return back();
    }
    
    public function active(Request $request, Lesson $lesson)
    {
        DB::update('update lessons set active = ? where id = ?', [$request->active ? 0 : 1, $lesson->id]);
        return back();
    }
    
    public function order(Request $request)
    {
        foreach ($request->lesson_orders as $index => $lesson_id){
            DB::update('update lessons set lesson_number = ? where id = ?', [$index + 1, $lesson_id]);
        }
        return '1';
    }
}
