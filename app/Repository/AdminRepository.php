<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    /**
     * Adminユーザー全取得
     * @return array
     */
    static function all()
    {
        $admin = DB::table('admins')
            ->where('del_flg', false)
            ->get()
            ->all();

        return $admin;
    }

    /**
     * Adminユーザー取得
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        $admin = DB::table('admins')
            ->where('id', $id)
            ->first();
        return $admin;
    }
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
        return DB::table('admins')->insert($param);
    }

    /**
     * Adminユーザー更新
     * @param $id
     * @param $name
     * @param $email
     * @param $image
     * @return void
     */
    static function update($id, $name, $email, $image)
    {
        $param = [
            'name' => $name,
            'email' => $email,
            'img_url' => $image,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        DB::table('admins')
            ->where('id', $id)
            ->update($param);
    }

    static function roleUpdate($id, $role_id)
    {
        $param = [
            'admin_role_id'=>$role_id,
            'updated_at'=>date("Y-m-d H:i:s")
        ];
        DB::table('admins')
            ->where('id', $id)
            ->update($param);
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
     * 詳細条件でアカウント取得
     * @param $name
     * @param $email
     * @param $password
     * @return Model|Builder|object|null
     */
    static function getAccount($name, $email, $password)
    {
        $admin_account = DB::table('admins')
            ->where([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ])
            ->first();
        return $admin_account;
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
