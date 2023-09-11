<?php

namespace App\Http\Controllers;

use App\Repository\CompanyRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function companyCheck($companyCode)
    {
        $company = CompanyRepository::fetch($companyCode);
        return $company;
    }
}
