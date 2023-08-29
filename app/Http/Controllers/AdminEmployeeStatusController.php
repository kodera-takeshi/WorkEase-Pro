<?php

namespace App\Http\Controllers;

use App\Repository\AdminEmployeeStatusRepository;
use App\Repository\AdminRequestRepository;
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
        // 全社員ステータス取得
        $employee_status = AdminEmployeeStatusRepository::all();
        // 社員ステータス申請取得
        $request = AdminRequestRepository::employeeRequest($admin['id']);
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
        //社員ステータス更新
        AdminEmployeeStatusRepository::update($request->id, $request->name);

        // todo:更新処理ステータスのメッセージを追加
        return Redirect::route('admin.employee-status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        // 社員ステータス作成
        AdminEmployeeStatusRepository::create($request->name);

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
            AdminEmployeeStatusRepository::delete($request->id);
            return Redirect::route('admin.employee-status');
        } else {
            return Redirect::route('admin.employee-status');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(4, null, null, $request->name, $admin['id']);

        return Redirect::route('admin.employee-status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateRequest(Request $request)
    {
        $id = $request->id;
        // 社員ステータス取得
        $before_status = AdminEmployeeStatusRepository::get($id);
        // 変更元社員ステータスID取得
        $original_id = $before_status->id;
        // 変更元ステータス名取得
        $before_status_name = $before_status->name;
        // 変更社員ID
        $session = $request->session()->all();
        $admin = $session['admin'];
        // 社員ステータス更新申請作成
        AdminRequestRepository::create(5, $original_id, $before_status_name, $request->name, $admin['id']);

        return Redirect::route('admin.employee-status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        // 社員ステータス取得
        $before_status = AdminEmployeeStatusRepository::get($id);
        // 変更元社員ステータスID取得
        $original_id = $before_status->id;
        // 変更元ステータス名取得
        $before_status_name = $before_status->name;
        // 変更社員ID
        $session = $request->session()->all();
        $admin = $session['admin'];
        // 社員ステータス削除申請作成
        AdminRequestRepository::create(6, $original_id, $before_status_name, $before_status_name, $admin['id']);

        return Redirect::route('admin.employee-status');
    }
}
