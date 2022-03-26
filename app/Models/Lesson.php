<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_name', 'lesson_image', 'type', 'media', 'media_name', 'media_size', 'body' , 'course_id', 
    ];
    
    public static function boot() {
        parent::boot();

        static::deleting(function($lesson) { // before delete() method call this
             $lesson->questions()->delete();
             // do the rest of the cleanup...
        });
    }
    
    
    public function lessonUsers() 
    {
        return $this->belongsToMany(User::class)
        ->withTimestamps()
        ->withPivot(['complete']);
    }
    
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    
    public function questions() 
    {
        return $this->hasMany(Question::class)->orderBy('question_number', 'asc');
    }
}
