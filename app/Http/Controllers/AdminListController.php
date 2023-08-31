<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use App\Repository\AdminRoleRepository;
use App\Service\AdminListService;
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
        AdminRepository::roleUpdate($request->id, $request->role_id);

        return Redirect::route('admin.list');
    }
}
