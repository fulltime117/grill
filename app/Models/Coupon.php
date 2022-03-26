<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'expired', 'discount', 'body'];
    
    
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['status', 'coupon_code', 'use_date', 'course_id'])
            ->orderBy('created_at', 'desc');
    }
}
