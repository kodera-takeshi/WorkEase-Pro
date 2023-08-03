<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PasswordService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function signup()
    {
        return view('admin.signup.index');
    }

    public function create(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        // パスワードのハッシュ化
        $passwordService = new PasswordService();
        $password = $passwordService->hash($request->password);

        $param = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $session_param = [
            'name' => $name,
            'email' => $email
        ];

        $admin = DB::table('admins')->insert($param);

        if ($admin) {
            $request->session()->put('admin', $session_param);
//            dd($request->session()->all());
        } else {
            return redirect()->route('admin.signup');
        }

        return Redirect::route('admin');
    }
}
