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

class AdminStatusController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): view
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        $status = DB::table('status')
            ->where('del_flg', false)
            ->get()
            ->all();

        $request = DB::table('requests')
            ->where('request_employee_id', $admin['id'])
            ->get()
            ->all();
//        dd($request);
        $request_list_param = RequestListParamService::makeParam($request);

        return view('admin.status.index', [
            'status' => $status,
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

        DB::table('status')
            ->where('id', $request->id)
            ->update($param);

        return Redirect::route('admin.status');
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

        DB::table('status')->insert($param);

        return Redirect::route('admin.status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $check = DeleteService::check($request->delete);

        if ($check) {
            DB::table('status')
                ->where('id', $request->id)
                ->update([
                    'del_flg' => true
                ]);
            return Redirect::route('admin.status');
        } else {
            return Redirect::route('admin.status');
        }
    }

    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];
        $param = [
            'classification' => 1,
            'before_status' => null,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.status');
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
            'classification' => 2,
            'before_status' => $before_status_name,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.status');
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
            'classification' => 3,
            'before_status' => $before_status_name,
            'after_status' => $before_status_name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.status');
    }
}
