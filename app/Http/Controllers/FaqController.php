<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $url = request()->url();
        return view('admin.faqs.index', compact('url', 'faqs'));
    }
    
    
    public function store(Request $request)
    {
        Faq::create($request->only('question', 'answer'));
        return back();
    }
    
    
    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->only('question', 'answer'));
        return back();
    }
    
    
    public function delete(Faq $faq)
    {
        $faq->delete();
        return back();
    }
    
    
}
