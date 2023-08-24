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

class AdminManagerialPositionController extends Controller
{
    /**
     * @return View
     */
    public function index(Request $request): view
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        $managerial_positions = DB::table('managerial_positions')
            ->where('del_flg', false)
            ->get()
            ->all();

        $request = DB::table('requests')
            ->where('request_employee_id', $admin['id'])
            ->where('classification', '>=', 7)
            ->where('classification', '<=', 9)
            ->get()
            ->all();
        $request_list_param = RequestListParamService::makeParam($request);

        return view('admin.managerial-position.index', [
            'managerial_positions' => $managerial_positions,
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

        DB::table('managerial_positions')
            ->where('id', $request->id)
            ->update($param);

        return Redirect::route('admin.managerial-position');
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

        DB::table('managerial_positions')->insert($param);

        return Redirect::route('admin.managerial-position');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $check = DeleteService::check($request->delete);

        if ($check) {
            DB::table('managerial_positions')
                ->where('id', $request->id)
                ->update([
                    'del_flg' => true
                ]);
            return Redirect::route('admin.managerial-position');
        } else {
            return Redirect::route('admin.managerial-position');
        }
    }

    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        $param = [
            'classification' => 7,
            'original_id' => null,
            'before_status' => null,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.managerial-position.update');
    }

    public function updateRequest(Request $request)
    {
        $id = $request->id;
        $before_status = DB::table('managerial_positions')
            ->where('id', $id)
            ->first();
        $original_id = $before_status->id;
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];
        $param = [
            'classification' => 8,
            'original_id' => $original_id,
            'before_status' => $before_status_name,
            'after_status' => $request->name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.managerial-position.update');
    }

    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        $before_status = DB::table('managerial_positions')
            ->where('id', $id)
            ->first();
        $original_id = $before_status->id;
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];
        $param = [
            'classification' => 9,
            'original_id' => $original_id,
            'before_status' => $before_status_name,
            'after_status' => $before_status_name,
            'request_employee_id' => $admin['id'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        DB::table('requests')->insert($param);

        return Redirect::route('admin.managerial-position.update');
    }
}
