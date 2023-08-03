<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Service\PasswordService;
use App\Http\Requests\AdminSignupRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function signin()
    {
        $message = null;
        return view('admin.authentications.signin', ['message' => $message]);
    }

    public function check(Request $request)
    {
        /* メールアドレス判定 */
        $email = $request->email;
        $admin = DB::table('admins')
            ->where('email', $email)
            ->first();
        if (!$admin) {
            $message = '登録されていないメールアドレスです。';
            return view('admin.authentications.signin', ['message' => $message]);
        }

        /* パスワード判定 */
        $password = $request->password;
        $hash_password = $admin->password;
        $password_check = PasswordService::check($password, $hash_password);
        if (!$password_check) {
            $message = 'パスワードが違います。';
            return view('admin.authentications.signin', ['message' => $message]);
        }

        /* sessionにログイン情報を登録 */
        $session_param = [
            'name' => $admin->name,
            'email' => $email
        ];
        $request->session()->put('admin', $session_param);

        return Redirect::route('admin');
    }

    public function signup()
    {
        return view('admin.authentications.signup');
    }

    public function create(AdminSignupRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        // パスワードのハッシュ化
        $password = PasswordService::hash($request->password);

        // DBにアカウントを登録
        $param = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $admin = DB::table('admins')->insert($param);

        if ($admin) {
            // sessionにログイン情報を登録
            $session_param = [
                'name' => $name,
                'email' => $email
            ];
            $request->session()->put('admin', $session_param);
        } else {
            return redirect()->route('admin.authentications.signup');
        }

        return Redirect::route('admin');
    }
}
