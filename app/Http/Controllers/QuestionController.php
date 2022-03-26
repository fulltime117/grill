<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $url = request()->url();
        $questions = Question::orderBy('created_at', 'desc')->get();
        $lessons = Lesson::orderBy('course_id', 'asc')->get(); 
        $courses = Course::where('active', '1')->get();
        return view('admin.questions.index', compact('url', 'questions', 'lessons', 'courses'));
    }
    
    public function index_lesson(Lesson $lesson){
        $courses = Course::where('active', '1')->get();
        $lessons = Lesson::orderBy('course_id', 'asc')->get(); 
        $url = request()->url();
        $questions = $lesson->questions;
        return view('admin.questions.index', compact('url', 'questions', 'courses', 'lessons', 'lesson'));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'q' => ['required',],
            'lesson_id'=> ['required'],
            'opt1' => ['required'],
            'opt2' => ['required'],
            'opt3' => ['required'],
            'opt4' => ['required'],
            'answer_number' => [],
            
        ]);
        $questions_count = Question::where('lesson_id', $request->lesson_id)->count();
        $saved = Question::create($data);
        DB::update('update questions set question_number = ? where id = ?', [$questions_count + 1, $saved->id]);
        return back();
    }

   
    
    
    //ajax edit modal
    public function edit(Question $question)
    {   
        $lesson = $question->lesson;
        $course = $lesson->course;
        return response()->json(compact('question', 'course', 'lesson'));
    }

    
    public function update(Request $request, Question $question)
    {   
        $data = $request->validate([
            'q' => ['required',],
            'lesson_id'=> ['required'],
            'opt1' => ['required'],
            'opt2' => ['required'],
            'opt3' => ['required'],
            'opt4' => ['required'],
            'answer_number' => [],
            
        ]);
        $question->update($data);
        return back();
    }

    
    public function delete(Question $question)
    {
        $question->delete();
        return back();
    }
    
    public function active(Request $request, Question $question)
    {   
        // dd($question);
        DB::update('update questions set active = ? where id = ?', [$request->active == '1' ? 0 : 1, $question->id]);
        return back();
    }
    
    public function order(Request $request)
    {
        foreach ($request->question_orders as $index => $question_id){
            DB::update('update questions set question_number = ? where id = ?', [$index + 1, $question_id]);
        }
        return '1';
    }
    
    public function create_ajax_questions(Request $request)
    {
        $file = $request->file('file');
        // $course_id = json_decode($request->data)->course_id;
        $lesson_name = json_decode($request->data)->lesson_name;
        $body = json_decode($request->data)->body;
        $vimeo = json_decode($request->data)->vimeo;
        $questions = json_decode(json_decode($request->data)->questions);
        
        dd(json_decode($request->data), $questions, $body, $vimeo, $lesson_name);
    }
}
