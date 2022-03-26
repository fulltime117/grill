<?php

namespace App\Http\Controllers;

use App\Models\Usertemp;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function index()
    {
        $url = request()->url();
        $pendings = Usertemp::where('phone_token', '')->get();
        return view('admin.pendings.index', compact('pendings', 'url'));
    }
}
