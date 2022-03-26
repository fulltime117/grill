<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    
    protected $fillable = ['top_image', 'at_glance', 'side_image', 'why_us'];
    
    protected static function boot()
    {
        parent::boot();
        
        
    }
}
