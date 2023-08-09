<?php

namespace App\Http\Controllers;

use App\Service\DeleteService;
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
     * @return View
     */
    public function index(): view
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
    public function update(Request $request): RedirectResponse
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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ];

        DB::table('employee_status')->insert($param);

        return Redirect::route('admin.employee-status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $check = DeleteService::check($request->delete);

        if ($check) {
            DB::table('employee_status')
                ->where('id', $request->id)
                ->update([
                    'del_flg' => true
                ]);
            return Redirect::route('admin.employee-status');
        } else {
            return Redirect::route('admin.employee-status');
        }
    }
}
