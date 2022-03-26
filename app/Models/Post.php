<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'body', 'image'
    ];
    
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function likes() 
    {
        return $this->hasMany(Like::class);
    }
    
    
    public function ownedBy(User $user) 
    {
        return $user->id === $this->user_id;
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    } 
    
}