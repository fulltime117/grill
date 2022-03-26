<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $url = request()->url();
        return view('admin.files.index', compact('url'));
    }
}
