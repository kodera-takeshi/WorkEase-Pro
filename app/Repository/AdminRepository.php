<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    /**
     * アカウント登録
     * @param $name
     * @param $email
     * @param $password
     * @return void
     */
    static function create($name, $email, $password)
    {
        $param = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        DB::table('admins')->insert($param);
    }

    /**
     * メールアドレスチェック
     * @param $email
     * @return Model|Builder|object|null
     */
    static function mailCheck($email)
    {
        $admin = DB::table('admins')
            ->where('email', $email)
            ->first();
        return $admin;
    }

    /**
     * セッション登録
     * @param $request
     * @param $id
     * @param $name
     * @param $email
     * @return void
     */
    static function sessionCreate($request, $id, $name, $email)
    {
        $session_param = [
            'id' => $id,
            'name' => $name,
            'email' => $email
        ];
        $request->session()->put('admin', $session_param);
    }
}
