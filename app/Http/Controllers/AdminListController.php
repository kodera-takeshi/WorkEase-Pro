<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index()
    {
        $admins = AdminRepository::all();
        return view('admin.admins.index');
    }
}
