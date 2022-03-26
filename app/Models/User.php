<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Link;
use App\Models\Role;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Diploma;
use App\Models\Profile;
use App\Models\Location;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'phone',
        'identity',
        'address',
        'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected static function boot() {
        parent::boot();
        static::created(function($user) {
            $user->profile()->create();
            $user->link()->create();
        });
    }
    
    public function roles() 
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function userCourses() 
    {
        return $this->belongsToMany(Course::class)
        ->withTimestamps()
        ->withPivot(['active', 'lesson_number', 'end_date']);
    }
    
    public function userLessons() 
    {
        return $this->belongsToMany(Lesson::class)
        ->withTimestamps()
        ->withPivot(['complete']);
    }
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    
    public function address() {
        return $this->hasOne(Address::class);
    }
    
    public function link() {
        return $this->hasOne(Link::class);
    }
    
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    
    public function coupons() 
    {
        return $this->belongsToMany(Coupon::class)
            ->withTimestamps()
            ->withPivot(['status', 'coupon_code', 'use_date', 'course_id'])
            ->orderBy('created_at', 'desc');
    }
    
    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }
}
