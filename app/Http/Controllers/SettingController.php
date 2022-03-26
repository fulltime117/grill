<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function coming_soon(Request $request)
    {
        $res = DB::table('settings')->where('type', 'coming_soon')->update(['active' => $request->active]);
        return response()->json($res);
    }
}
