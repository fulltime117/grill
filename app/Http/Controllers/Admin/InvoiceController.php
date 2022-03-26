<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $url = request()->url();
        return view('admin.invoice.index', compact('url'));
    }
}
