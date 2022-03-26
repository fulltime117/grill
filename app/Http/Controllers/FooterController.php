<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = request()->url();
        $pages = Footer::get();
        return view('admin.footer.index', compact('url', 'pages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = request()->url();
        return view('admin.footer.create', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' =>['required'],
            'slug' =>['required', 'unique:footers'],
        ]);
        $data = $request->only('banner_title', 'page_name', 'slug', 'is_top', 'is_bottom', 'meta_title', 'meta_description', 'meta_keyword', 'title', 'body');
        if($request->is_top) {
            $data = array_merge($data, ['is_top' => '1']);
        }
        if($request->is_bottom) {
            $data = array_merge($data, ['is_bottom' => '1']);
        }
        if($request->file('banner')){
            $imagePath = $request->file('banner')->store('static', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1900,900);
            $image->save('storage/' . $imagePath);
            $data = array_merge($data, ['banner' => '/storage/' . $imagePath]);
        }
        DB::table('footers')->insert($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        $url= request()->url();
        return view('admin.footer.edit', compact('url', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $request->validate([
            'page_name' =>['required'],
            'slug' =>['required', Rule::unique('footers')->ignore($footer->id)],
        ]);
        
        $data = $request->only('banner_title', 'page_name', 'slug', 'is_top', 'is_bottom', 'meta_title', 'meta_description', 'meta_keyword', 'title', 'body');
        
        $data = $request->is_bottom ? array_merge($data, ['is_bottom' => '1']) : array_merge($data, ['is_bottom' => '0']);
        
        $data = $request->is_top ? array_merge($data, ['is_top' => '1']) : array_merge($data, ['is_top' => '0']);
        
        if($request->file('banner')){
            $imagePath = $request->file('banner')->store('static', 'public');
            $image = Image::make($request->file('banner')->getRealPath())->fit(1900,500);
            $image->save('storage/' . $imagePath);
            $data = array_merge($data, ['banner' => '/storage/' . $imagePath]);
        }
        DB::table('footers')->where('id', $footer->id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        $footer->delete();
        return back();
    }
    
    public function ajax_footer_published(Footer $footer, Request $request)
    {
        DB::update("update footers set published = ? where id = ?", [$request->published === '1' ? 0 : 1, $footer->id]);
        return response()->json(1);
    }
}
