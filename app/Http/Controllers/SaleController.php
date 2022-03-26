<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $url = request()->url();
        $sales = Sale::latest()->get();
        $courses = Course::where('active', '1')->get();
        return view('admin.sales.index', compact('url', 'sales', 'courses'));
    }
    
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'discount' => $request->discount,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ];
        
        if($request->body){
            $data = array_merge($data, ['expired' => $request->body]);
        }
        
        if($request->expired){
            $data = array_merge($data, ['expired' => $request->expired]);
        }
        
        DB::table('sales')->upsert($data, 
            ['name', 'discount'], 
            ['updated_at', 'expired']);
        dd('suc');
        return back();
    }
    
    public function delete(Sale $sale)
    {
        $sale->delete();
        return back();
    }
    
    // ajax
    public function add_course(Course $course){
        $sales = Sale::latest()->get();
        return view('admin.sales.add_course', compact('sales', 'course'));
    }
    
    public function course_sale(Request $request){
        
        DB::table('course_sale')->where(['course_id'=>$request->course])->delete();
        if($request->sale !== '0') {
            DB::table('course_sale')->upsert(
                ['course_id'=>$request->course, 'sale_id'=>$request->sale, 'created_at'=>NOW(), 'updated_at'=>NOW()],
                ['course_id'],
                ['sale_id', 'updated_at']);
        }
        return 1;
    }
    
    
    
}
