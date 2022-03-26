<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Usertemp;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $fillable = [
        'course_name', 'overview', 'course_price', 'type', 'media', 'media_name', 'media_size', 'body', 'cover_image'
    ];
    
    
    public static function boot() {
        parent::boot();
        
        static::deleting(function($course) { // before delete() method call this
            
            foreach($course->lessons as $lesson){
                $lesson->questions()->delete();
            }
            
            $course->lessons()->delete();
            
            // do the rest of the cleanup...
        });
        
    }
    
    public function courseUsers(){
        return $this->belongsToMany(User::class)
        ->withTimestamps()
        ->withPivot(['active', 'lesson_number', 'end_date']);
    }
   
   
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('lesson_number', 'asc');
    }
    
    public function usertemps()
    {
        return $this->hasMany(Usertemp::class);
    }
    
    public function discounted()
    {
        $sale =  DB::table('course_sale')->where('course_id', $this->id)->first();
        
        if($sale == null) {
            return null;
        }
        
        $discount = intval(Sale::find($sale->sale_id)->discount);
        $course_price = intval($this->course_price);
        $discounted = number_format($course_price*(1 - $discount/100), 2); 
        return $discounted;
        
    }
    
    public function has_sale()
    {   
        $sale =  DB::table('course_sale')->where(['course_id' => $this->id])->first();        
        if($sale) {
            return Sale::find($sale->sale_id);
        } 
        return false;
    }
}
