<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use App\Service\AdminListService;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index()
    {
        $admins = AdminRepository::all();
        $admins_list = AdminListService::makeList($admins);
        return view('admin.admins.index', ['admins'=>$admins_list]);
    }
}
