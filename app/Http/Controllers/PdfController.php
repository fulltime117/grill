<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Course;
use App\Models\OtherPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function download_invoice()
    {
        $data = [
            'title' => 'Welcome to Grillman.com',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('pdf.download_invoice', $data);
    
        return $pdf->download('invoice.pdf');
    }
    
    public function download_contract(User $user, Course $course)
    {
        $contract_content = DB::table('contract_content')->first()->content; // content for contract 
        $logo = DB::table('homepages')->where('type', 'welcome1')->first()->body; // logo
        $contract = DB::table('course_user')->where(['user_id'=>$user->id, 'course_id'=>$course->id])->first();
        $data = [
            'user' => $user,
            'course' => $course,
            'contract' => $contract,
            'contract_content' => $contract_content,
            'logo' => $logo, 
        ];
        
        $pdf = PDF::loadView('pdf.admin_download_contract', $data);
        $pdf_name = "contract - " . $user->firstname;
        return $pdf->stream("$pdf_name.pdf");
    }
    
    
    public function admin_download_contract(User $user, Course $course)
    {
        $contract_content = DB::table('contract_content')->first()->content; // content for contract 
        $logo = DB::table('homepages')->where('type', 'welcome1')->first()->body; // logo
        $contract = DB::table('course_user')->where(['user_id'=>$user->id, 'course_id'=>$course->id])->first();
        $data = [
            'user' => $user,
            'course' => $course,
            'contract' => $contract,
            'contract_content' => $contract_content,
            'logo' => $logo, 
        ];
        
        // return view('pdf.admin_download_contract', $data);

        $pdf = PDF::loadView('pdf.admin_download_contract', $data);
        $pdf_name = "contract - " . $user->firstname;
        return $pdf->download("$pdf_name.pdf");
    }
    
}
