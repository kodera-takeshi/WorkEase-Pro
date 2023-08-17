<?php

namespace App\Service;

class RequestListParamService
{
    static function makeParam($requests)
    {
        $list = [];
        foreach ($requests as $request) {
            if ($request->change_employee_id) {
                $status = '処理済み';
            } else {
                $status = '申請中';
            }
            $param = [
                'id' => $request->id,
                'classification' => $request->classification, // todo:区分 Enumを作成
                'before_status' => $request->before_status, // 変更前ステータス
                'after_status' => $request->after_status, // 変更後ステータス
                'status' => $status, // ステータス
                'change_employee' => $request->change_employee_id, // 変更社員名
            ];
            $list[] = $param;
        }

        return $list;
    }
}
