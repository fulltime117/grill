<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JamesMills\LaravelTimezone\Timezone;

class ContractController extends Controller
{
    public function index()
    {
        $url = request()->url();
        $contracts = DB::table('course_user')->get();
        return view('admin.contracts.index', compact('url', 'contracts'));
    }
}
