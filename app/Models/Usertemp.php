<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usertemp extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'identity',
        'address',
        'company',
        'course_id',
        'phone_token',
        'ask_pay',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
