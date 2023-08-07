<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminEmployeeStatusController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        DB::table('employee_status')
            ->where('id', $request->id)
            ->update($param);

        // todo:更新処理ステータスのメッセージを追加
        return Redirect::route('admin.employee-status');
    }
}
