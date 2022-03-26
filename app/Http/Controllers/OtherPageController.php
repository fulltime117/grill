<?php

namespace App\Http\Controllers;

use App\Models\OtherPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OtherPageController extends Controller
{
    public function edit(){
        $url = request()->url();
        $other = OtherPage::find(1);
        return view('admin.otherpages.edit', compact('url', 'other'));
    }
    
    public function update(Request $request)
    {
        $data = $request->only('policy', 'product_supply', 'cancellation', 'business_responsibility');
        OtherPage::find(1)->update($data);
        return back();
    }
    
    // for contract page
    public function edit_content(){
        $url = request()->url();
        $content = DB::table('contract_content')->first();
        return view('admin.otherpages.contract', compact('url', 'content'));
    }
    
    public function update_content(Request $request, $id)
    {
        DB::table('contract_content')->where('id', $id)->update(['content' =>$request->contract]);
        return back();
    }
}
