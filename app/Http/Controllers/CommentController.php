<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index($post) 
    {   
        // dd(auth()->user()->id);
        $comments = Comment::orderBy('updated_at', 'desc')
            ->with(['user'])
            ->where('post_id', '=', $post)
            ->get()->toArray();
            
            // dd($comments);
        return response()->json($comments);
    }
    
    public function store(Post $post, Request $request) 
    {   
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();
        $comment = Comment::where('id', $comment->id)->with('user')->get()->toArray();
        return response()->json($comment[0]);
    }
}
