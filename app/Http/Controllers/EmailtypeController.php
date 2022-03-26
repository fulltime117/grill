<?php

namespace App\Http\Controllers;

use App\Models\Emailtype;
use Illuminate\Http\Request;

class EmailtypeController extends Controller
{
    public function index()
    {
        $url = request()->url();
        $emailtypes = Emailtype::get();
        return view('admin.emailtypes.index', compact('url', 'emailtypes'));
    }
}
