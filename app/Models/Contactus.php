<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;
    
    protected $fillable = ['email', 'phone', 'address'];
    
    
    protected static function boot()
    {
        parent::boot();

    }
}
