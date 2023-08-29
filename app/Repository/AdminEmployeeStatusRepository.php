<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminEmployeeStatusRepository
{
    /**
     * 全社員ステータス取得
     * @return array
     */
    static function all()
    {
        $employee_status = DB::table('employee_status')
            ->where('del_flg', false)
            ->get()
            ->all();
        return $employee_status;
    }

    /**
     * 社員ステータス取得
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        $employee_status = DB::table('employee_status')
            ->where('id', $id)
            ->first();
        return $employee_status;
    }

    /**
     * 社員ステータス作成
     * @param $name
     * @return void
     */
    static function create($name)
    {
        DB::table('employee_status')->insert([
            'name' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ]);
    }

    /**
     * 社員ステータス更新
     * @param $id
     * @param $name
     * @return void
     */
    static function update($id, $name)
    {
        DB::table('employee_status')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    /**
     * 社員ステータス削除
     * @param $id
     * @return void
     */
    static function delete($id)
    {
        DB::table('employee_status')
            ->where('id', $id)
            ->update([
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => true
            ]);
    }
}
