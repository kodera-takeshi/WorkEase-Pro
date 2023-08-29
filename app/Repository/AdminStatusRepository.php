<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminStatusRepository
{
    /**
     * 全ステータス取得
     * @return array
     */
    static function all()
    {
        $status = DB::table('status')
            ->where('del_flg', false)
            ->get()
            ->all();

        return $status;
    }

    /**
     * ステータス取得
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        $status = DB::table('status')
            ->where('id', $id)
            ->first();

        return $status;
    }

    /**
     * ステータス登録
     * @param $name
     * @return void
     */
    static function create($name)
    {
        DB::table('status')->insert([
            'name' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ]);
    }

    /**
     * ステータス更新
     * @param $id
     * @param $name
     * @return void
     */
    static function update($id, $name)
    {
        DB::table('status')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    /**
     * ステータス削除
     * @param $id
     * @return void
     */
    static function delete($id)
    {
        DB::table('status')
            ->where('id', $id)
            ->update([
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => true
            ]);
    }
}
