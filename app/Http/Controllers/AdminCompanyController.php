<?php

namespace App\Http\Controllers;

use App\Repository\AdminCompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCompanyController extends Controller
{
    public function index()
    {
        $companies = AdminCompanyRepository::all();
        return view('admin.companies.index', [
            'companies' => $companies
        ]);
    }
}
