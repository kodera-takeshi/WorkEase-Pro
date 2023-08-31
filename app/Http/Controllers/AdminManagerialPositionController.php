<?php

namespace App\Http\Controllers;

use App\Repository\AdminManagerialPositionRepository;
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

class AdminManagerialPositionController extends Controller
{
    /**
     * @return View
     */
    public function index(Request $request): view
    {
        $session = $request->session()->all();
        $admin = $session['admin'];
        // 役職取得
        $managerial_positions = AdminManagerialPositionRepository::all();
        // 役職申請データ取得
        $request = AdminRequestRepository::managerialPositionRequest($admin['id']);
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
        AdminManagerialPositionRepository::update($request->id, $request->name);

        return Redirect::route('admin.managerial-position');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        AdminManagerialPositionRepository::create($request->name);

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
            AdminManagerialPositionRepository::delete($request->id);
            return Redirect::route('admin.managerial-position');
        } else {
            return Redirect::route('admin.managerial-position');
        }
    }

    public function request(Request $request)
    {
        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(7, null, null, $request->name, $admin['id']);

        return Redirect::route('admin.managerial-position.update');
    }

    public function updateRequest(Request $request)
    {
        $id = $request->id;

        $before_status = AdminManagerialPositionRepository::get($id);

        $original_id = $before_status->id;
        $before_status_name = $before_status->name;
        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(8, $original_id, $before_status_name, $request->name, $admin['id']);

        return Redirect::route('admin.managerial-position.update');
    }

    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        $before_status = AdminManagerialPositionRepository::get($id);
        $original_id = $before_status->id;
        $before_status_name = $before_status->name;

        $session = $request->session()->all();
        $admin = $session['admin'];

        AdminRequestRepository::create(9, $original_id, $before_status_name, $before_status_name, $admin['id']);

        return Redirect::route('admin.managerial-position.update');
    }
}
