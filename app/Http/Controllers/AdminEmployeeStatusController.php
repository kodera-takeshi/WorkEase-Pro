<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEmployeeStatusController extends Controller
{
    public function index()
    {
        $employee_status = DB::table('employee_status')
            ->where('del_flg', false)
            ->get()
            ->all();

        return view('admin.employee-status.index', [
            'employee_status' => $employee_status
        ]);
    }
}
