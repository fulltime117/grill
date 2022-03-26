<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = request()->url();
        $diplomas = Diploma::get();
        return view('admin.diploma.index', compact('diplomas', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function show(Diploma $diploma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function edit(Diploma $diploma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diploma $diploma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diploma $diploma)
    {
        //
    }
    
    public function ajax_diploma_upload(Diploma $diploma, Request $request)
    {
        $request->validate([
            'diploma' =>['required'],
        ]);
        $name = time().'.'.$request->file('diploma')->getClientOriginalExtension();
        $request->file('diploma')->move(public_path('storage/diploma'), $name);
        DB::table('diplomas')->where('id', $diploma->id)->update(['diploma' => '/storage/diploma/'. $name]);
        return back();
    }
}
