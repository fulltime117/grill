<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Question;
use App\Mail\DiplomaMail;
use Illuminate\Http\Request;
use App\Notifications\TestSuccess;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(Lesson $lesson)
    {
        $url = request()->url();
        $tests = DB::table('lesson_user')->get();
        $test_results = [];
        foreach ($tests as $test) {
            $test_results[] = [
                'user' => User::find($test->user_id),
                'lesson' => Lesson::find($test->lesson_id),
                'passed' => $test->complete,
                'date' => $test->updated_at,
                'score' => $test->score,
            ];
        }
        // dd($test_results[0]['user']->firstname);
        return view('admin.tests.index', compact('url', 'test_results'));
    }
    
    public function show(User $user, Lesson $lesson)
    {   
        return view('client.tests.show', compact('user', 'lesson'));
    }
    
    
    public function store(User $user, Lesson $lesson, Request $request)
    {   
    
        $test_result = 0;
        $complete = 0;
        $score = 0;
        $next_lesson = [];
        $last_lesson_number = $lesson->course->lessons->count();
        
        // notify to admin about testresult
        $admin = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first();
        
        foreach($lesson->questions as $question){
            $qid = 'qid_' . $question->id;
            if($request->$qid && $request->$qid == $question->answer_number) {
                $score++;
            } 
        }
        if($score > 3) {
            // test is passed, congratulations!    
            $test_result = 1;
            $complete = 1;
            
            // update current lesson
            $course_id = $lesson->course->id;
            
            if($lesson->lesson_number == $last_lesson_number) {
                $user->userCourses()->updateExistingPivot($course_id, ['end_date' => NOW()]);
                
                DB::table('lesson_user')
                ->upsert(
                    ['lesson_id'=>$lesson->id, 'user_id'=>$user->id, 'complete'=>$complete, 'created_at'=>NOW(), 'updated_at'=>NOW()],
                    ['lesson_id', 'user_id'],
                    ['complete', 'updated_at']
                );
                
                // add Diploma table
                DB::table('diplomas')->upsert(
                    ['user_id'=>$user->id, 'course_id'=>$course_id, 'created_at'=>NOW(), 'updated_at'=>NOW()],
                    ['course_id', 'user_id'],
                    ['updated_at']
                );
                
                
                //mail to admin for diploma
                Mail::to($user->email)
                    ->send(new DiplomaMail(['user_id'=>'$user->id', 'course_id'=>$course_id,]));
                
                
                
                return redirect()->route('client.diploma');
            }
            
            $next_lesson_number = (int) $lesson->lesson_number + 1;
            $next_lesson = Lesson::where('lesson_number', $next_lesson_number)->where('course_id', $lesson->course->id)->first();
            // dd($course_id, $next_lesson_number, $next_lesson_id);
            $user->userCourses()->updateExistingPivot($course_id, ['lesson_number' => $next_lesson_number]);
            
        }
        
        
        DB::table('lesson_user')
        ->upsert(
            ['lesson_id'=>$lesson->id, 'user_id'=>$user->id, 'score'=>$score, 'complete'=>$complete, 'created_at'=>NOW(), 'updated_at'=>NOW()],
            ['lesson_id', 'user_id'],
            ['complete', 'updated_at']
        );
        
        
        
        
        $testResult = [
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'passed' => $test_result,
            'score' => $score,
        ];
        
        $mailData = [
            'name' => $user->firstname .' '. $user->lastname,
            'body' => 'You have tested ' . $lesson->lesson_name . ' - #' . $lesson->lesson_number,
            'score' => 'You score is '. $score,
            'url' => route('login'),
            'thanks' => 'Please try more to move forward next lesson'
        ];
        
        $admin->notify(new TestSuccess($testResult, $mailData));
        $user->notify(new TestSuccess($testResult, $mailData));
        
        return view('client.tests.result', compact('user', 'lesson', 'test_result', 'next_lesson'));
    }
    
    
}
