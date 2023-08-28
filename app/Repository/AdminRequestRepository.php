<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminRequestRepository
{
    /**
     * 申請データ取得
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        $approval_request = DB::table('requests')
            ->where('id', $id)
            ->first();

        return $approval_request;
    }

    /**
     * 役職申請データ取得
     * @param $id
     * @return void
     */
    static function managerialPositionRequest($id)
    {
        DB::table('requests')
            ->where('request_employee_id', $id)
            ->where('classification', '>=', 7)
            ->where('classification', '<=', 9)
            ->get()
            ->all();
    }

    /**
     * 新規申請取得
     * @return array
     */
    static function newRequests()
    {
        $requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', false)
            ->where('cancel_flg', false)
            ->get()
            ->all();

        return $requests;
    }

    /**
     * 申請承認
     * @param $request_id
     * @param $admin_id
     * @return void
     */
    static function approval($request_id, $admin_id)
    {
        DB::table('requests')
            ->where('id', $request_id)
            ->update(
                [
                    'change_employee_id' => $admin_id,
                    'approval_flg'=>true,
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            );
    }

    /**
     * 承認済み申請取得
     * @return array
     */
    static function approvedRequest()
    {
        $requests = DB::table('requests')
            ->where('approval_flg', true)
            ->where('denial_flg', false)
            ->where('cancel_flg', false)
            ->get()
            ->all();

        return $requests;
    }

    /**
     * @return void
     */
    static function denial($request_id, $admin_id)
    {
        DB::table('requests')
            ->where('id', $request_id)
            ->update([
                'change_employee_id' => $admin_id,
                'denial_flg'=>true,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    /**
     * 否認済み申請取得
     * @return array
     */
    static function deniedRequest()
    {
        $requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', true)
            ->where('cancel_flg', false)
            ->get()
            ->all();

        return $requests;
    }

    /**
     * キャンセル済み申請取得
     * @return array
     */
    static function canceledRequest()
    {
        $requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', false)
            ->where('cancel_flg', true)
            ->get()
            ->all();

        return $requests;
    }
}
