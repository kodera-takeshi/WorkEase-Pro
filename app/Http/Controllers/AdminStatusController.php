<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStatusController extends Controller
{
    public function index()
    {
        $status = DB::table('status')
            ->where('del_flg', false)
            ->get()
            ->all();
        return view('admin.status.index', [
            'status' => $status
        ]);
    }
}
