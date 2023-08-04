<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCompanyController extends Controller
{
    public function index() {
        $companies = DB::table('companies')
            ->where('del_flg', false)
            ->get()
            ->all();
        return view('admin.companies.index', [
            'companies' => $companies
        ]);
    }
}
