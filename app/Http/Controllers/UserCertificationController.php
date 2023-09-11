<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeRepository;
use App\Service\PasswordService;
use Illuminate\Http\Request;
use App\Repository\CompanyRepository;
use App\Repository\OfficeRepository;
use App\Service\EmployeeService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserCertificationController extends Controller
{
    const COMPANY_CODE = 5400;

    public function signup()
    {
        return view('user.authentications.signup');
    }

    public function create(Request $request)
    {
        /* 企業登録・取得 */
        $recordCount = CompanyRepository::count();
        $company_code = self::COMPANY_CODE + $recordCount;
        $company = CompanyRepository::create($company_code, $request->company);
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

    public function signin()
    {
        $message = null;
        return view('user.authentications.signin', ['message' => $message]);
    }

    public function check(Request $request)
    {
        /* メールアドレス判定 */
        $employee = EmployeeRepository::mailCheck($request->email);
        if (!$employee) {
            $message = '登録されていないメールアドレスです。';
            return view('user.authentications.signin', ['message' => $message]);
        }

        /* パスワード判定 */
        $password = $request->password; // 入力されたパスワード
        $hash_password = $employee->password; // 設定したパスワード取得
        $password_check = PasswordService::check($password, $hash_password);
        if (!$password_check) {
            $message = 'パスワードが違います。';
            return view('user.authentications.signin', ['message' => $message]);
        }

        /* sessionにログイン情報を登録 */
        EmployeeService::session($request, $employee);

        return Redirect::route('home');

    }

    public function join()
    {
        $message = null;
        return view('user.authentications.join', compact('message'));
    }

    public function joinCreate(Request $request)
    {
        dd([
            $request->company,
            $request->name,
            $request->email,
            $request->password,
        ]);
    }
}
