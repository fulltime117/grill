<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $guard = [];
    
    protected $fillable = [
        'q', 'lesson_id', 'opt1', 'opt2', 'opt3', 'opt4', 'answer_number'
    ];
    
    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
