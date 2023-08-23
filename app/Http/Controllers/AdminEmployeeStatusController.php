<?php

namespace App\Http\Controllers;

use App\Service\DeleteService;
use App\Service\RequestListParamService;
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
    public function index(Request $request): view
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        $employee_status = DB::table('employee_status')
            ->where('del_flg', false)
            ->get()
            ->all();

        $request = DB::table('requests')
            ->where('request_employee_id', $admin['id'])
            ->where('classification', '>=',4)
            ->where('classification', '<=',6)
            ->get()
            ->all();
        $request_list_param = RequestListParamService::makeParam($request);

        return view('admin.employee-status.index', [
            'employee_status' => $employee_status,
            'requests' => $request_list_param
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

    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        $param = [
            'classification' => 4,
            'before_status' => null,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.employee-status');
    }

    public function updateRequest(Request $request)
    {
        $id = $request->id;
        $before_status = DB::table('status')
            ->where('id', $id)
            ->first();
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];
        $param = [
            'classification' => 5,
            'before_status' => $before_status_name,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.employee-status');
    }

    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        $before_status = DB::table('status')
            ->where('id', $id)
            ->first();
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];
        $param = [
            'classification' => 6,
            'before_status' => $before_status_name,
            'after_status' => $before_status_name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.employee-status');
    }
}
