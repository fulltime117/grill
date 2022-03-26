<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\DB;


class PostController extends Controller
{

    public function __construct() 
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $banners = DB::table('banners')->where('type', 'post')->first();
        $posts = Post::orderBy('updated_at', 'desc')->with('user')->simplePaginate(6);
        return view('posts.index', compact('posts','banners'));
    }

    public function admin_index()
    {
        $url = request()->url();
        $posts = Post::orderBy('updated_at', 'desc')->with('user')->get();
        return view('posts.admin_index', compact('posts','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = request()->url();
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();
        // dd($categories, $tags);
        return view('posts.create', compact('url', 'categories', 'tags', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => ['required', 'max:255'],
            'body' => ['required',],
            'image' => ['required','image'],
        ]);
        
        $imagePath = $request->image->store('posts', 'public');
        
        $image = Image::make($request->file('image')->getRealPath())->fit(1000,570);
        $image->save('storage/' . $imagePath);
            
        $data = array_merge($data, [
            'image' => '/storage/' . $imagePath,
        ]);  
        
        
        $request->user()->posts()->create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $url = request()->url();
        return view('posts.edit', compact('post', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $this->validate($request, [
            'title' => ['required', 'max:255'],
            'body' => ['required',],
            'image' => ['required','image'],
        ]);
        $imagePath = $request->image->store('posts', 'public');
        $image = Image::make($request->file('image')->getRealPath())->fit(1000,570);
        $image->save('storage/' . $imagePath);
        $data = array_merge($data, [
            'image' => '/storage/' . $imagePath,
        ]);        
        $post->update($data);
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
    
    public function indexOfUser(User $user) {
        $posts = $user->posts()->latest()->paginate(5);
        
        return view('posts.indexOfUser', compact('posts'));
    }
    
    public function like(Request $request, Post $post)
    {
        // dd($request->user());
        // dd($post->likedBy($request->user()));
        
        $post->likes()->create(['user_id' => $request->user()->id]);
        return back();
    }
    
    public function dislike(Request $request, Post $post)
    {
        // dd($request->user());
        $post->likes()->delete(['user_id' => $request->user()->id]);
        return back();
    }
}
