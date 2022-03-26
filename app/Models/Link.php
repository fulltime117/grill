<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;
    
    protected $guard = [];
    
    protected $fillable = [
        'linkedin', 'twitter', 'facebook'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
