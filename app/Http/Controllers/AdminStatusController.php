<?php

namespace App\Http\Controllers;

use App\Repository\AdminRequestRepository;
use App\Repository\AdminStatusRepository;
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
        // 全ステータス取得
        $status = AdminStatusRepository::all();
        // ステータス申請
        $request = AdminRequestRepository::statusRequest($admin['id']);
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
        AdminStatusRepository::update($request->id, $request->name);

        return Redirect::route('admin.status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        AdminStatusRepository::create($request->name);

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
            AdminStatusRepository::delete($request->id);
            return Redirect::route('admin.status');
        } else {
            return Redirect::route('admin.status');
        }
    }

    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(1,null, null, $request->name, $admin['id']);

        return Redirect::route('admin.status');
    }

    public function updateRequest(Request $request)
    {
        $id = $request->id;

        $before_status = AdminStatusRepository::get($id);

        $original_id = $before_status->id;
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(2,$original_id, $before_status_name, $request->name, $admin['id']);

        return Redirect::route('admin.status');
    }

    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        // ステータス取得
        $before_status = AdminStatusRepository::get($id);
        // ステータスID取得
        $status_id = $before_status->id;
        // ステータス名取得
        $before_status_name = $before_status->name;
        // 変更社員ID取得
        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(3, $status_id, $before_status_name, $before_status_name, $admin['id']);

        return Redirect::route('admin.status');
    }
}
