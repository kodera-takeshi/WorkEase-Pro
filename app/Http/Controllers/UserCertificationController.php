<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeRepository;
use App\Service\PasswordService;
use Illuminate\Http\Request;
use App\Repository\CompanyRepository;
use App\Repository\OfficeRepository;
use App\Service\EmployeeService;
use Illuminate\Support\Facades\Hash;

class UserCertificationController extends Controller
{
    public function signup()
    {
        return view('user.authentications.signup');
    }

    public function create(Request $request)
    {
        /* 企業登録・取得 */
        $company = CompanyRepository::create($request->company);
        $company = CompanyRepository::advancedSearch($company);
        $company_id = $company->id;
        /* オフィス追加 */
        if ($request->add_office == 'on') {
            $office = OfficeRepository::create($company_id, $request->office, null, null, null);
            $office = OfficeRepository::advancedSearch($office);
            $office_id = $office->id;
        } else {
            $office_id =null;
        }
        /* ユーザー追加 */
        $employee = EmployeeService::signupEmployeeRecord($request->name, $request->email, $request->password, $company_id, $office_id);
        EmployeeRepository::create($employee);
        /* Session登録 */
        $employee = EmployeeRepository::advancedSearch($employee);
        EmployeeService::session($request, $employee);
        dd($request->session()->get('user'));

        // todo:ホーム画面に遷移させる
    }
}
