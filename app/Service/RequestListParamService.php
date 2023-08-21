<?php

namespace App\Service;

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
}
