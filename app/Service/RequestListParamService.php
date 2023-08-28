<?php

namespace App\Service;

use App\Repository\AdminUserRepository;
use Illuminate\Support\Facades\DB;

class RequestListParamService
{
    static function makeParam($requests)
    {
        $list = [];
        foreach ($requests as $request) {
            if ($request->approval_flg) {
                $status = '承認';
            } elseif($request->denial_flg) {
                $status = '否認';
            } elseif ($request->cancel_flg) {
                $status = 'キャンセル';
            } else {
                $status = '処理中';
            }
            $param = [
                'id' => $request->id,
                'classification' => $request->classification, // todo:区分 Enumを作成
                'before_status' => $request->before_status, // 変更前ステータス
                'after_status' => $request->after_status, // 変更後ステータス
                'status' => $status, // ステータス
                'change_employee' => $request->change_employee_id, // todo:変更社員名を表示させる
            ];
            $list[] = $param;
        }

        return $list;
    }

    static function makeList($requests)
    {
        $list = [];
        foreach ($requests as $request) {
            // ステータスの取得
            if ($request->approval_flg) {
                $status = '承認';
            } elseif($request->denial_flg) {
                $status = '否認';
            } elseif ($request->cancel_flg) {
                $status = 'キャンセル';
            } else {
                $status = '処理中';
            }
            // todo:申請区分の振り分け

            // 申請社員の名前を取得
            $request_employee_data = AdminUserRepository::get($request->request_employee_id);
            $request_employee = $request_employee_data->name;
            // 変更社員の名前を取得
            $change_employee_data = AdminUserRepository::get($request->change_employee_id);
            $change_employee = $change_employee_data?->name;

            $param = [
                'id' => $request->id,
                'classification' => $request->classification,
                'before_status' => $request->before_status,
                'after_status' => $request->after_status,
                'status' => $status,
                'request_employee_id' => $request->request_employee_id,
                'request_employee' => $request_employee,
                'change_employee_id' => $request->change_employee_id,
                'change_employee' => $change_employee,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
            ];
            $list[] = $param;
        }
        return $list;
    }
}
