<?php

namespace App\Http\Controllers;

use App\Enums\AdminRoleEnum;
use App\Repository\AdminRepository;
use App\Repository\AdminRoleRepository;
use App\Service\AdminListService;
use App\Service\DeleteService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminListController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $admins = AdminRepository::all();
        $admins_list = AdminListService::makeList($admins);

        $admin_roles = AdminRoleRepository::all();

        return view('admin.admins.index', ['admins'=>$admins_list, 'admin_roles'=>$admin_roles]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        /* 変更するユーザーの権限がMasterであり、それ以外のユーザーにMasterが存在しない場合は、更新せずリダイレクトさせる */
        $stop = $this->stop($request->id);
        // 更新処理
        if ($stop) {
            AdminRepository::roleUpdate($request->id, $request->role_id);
        } else {
            return Redirect::route('admin.list');
        }

        return Redirect::route('admin.list');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        // 削除の入力チェック
        if (!DeleteService::check($request->delete)) {
            return Redirect::route('admin.list');
        }
        // 変更するユーザーの権限がMasterであり、それ以外のユーザーにMasterが存在しない場合は、削除せずリダイレクトさせる
        $stop = $this->stop($request->id);
        // ユーザー削除
        if ($stop) {
            AdminRepository::delete($request->id);
        } else {
            return Redirect::route('admin.list');
        }

        return Redirect::route('admin.list');
    }

    private function stop($request_id)
    {
        $admin = AdminRepository::get($request_id);
        $master_admin = AdminRepository::masterGet($request_id);
        if ($admin->admin_role_id == AdminRoleEnum::MASTER && empty($master_admin)) {
            return false;
        }
        return true;
    }
}
