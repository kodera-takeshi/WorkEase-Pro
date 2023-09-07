<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCertificationController extends Controller
{
    public function signup()
    {
        return view('user.authentications.signup');
    }

    public function create(Request $request)
    {
        dd([
            'company' => $request->company,
            'office_flg' => $request->office_flg,
        ]);
    }
}
