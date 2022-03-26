<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $fillable = ['image'];
    
    public function getImage() 
    {
        $image = asset('assets/img/empty_user-200x200.jpg');
        return $this->image ? $this->image : $image;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
