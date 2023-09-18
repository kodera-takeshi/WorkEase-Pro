<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeGroupRepository;
use App\Repository\EmployeeRepository;
use App\Service\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function index()
    {
        $company_id = Session::get('user.company_id');
        $employees = EmployeeRepository::employee($company_id);
        $employee_groups = EmployeeGroupRepository::get($company_id);
        return view('user.mail.index', compact('employees', 'employee_groups'));
    }

    public function send(Request $request)
    {
        MailService::send($request);
        return Redirect::route('mail');
    }
}
