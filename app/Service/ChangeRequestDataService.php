<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class ChangeRequestDataService
{
    static function changeRequest($classification, $id, $status)
    {
        switch ($classification) {
            case 1: // 1 : ステータス追加
                DB::table('status')->insert([
                    'name' => $status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'del_flg' => false
                ]);
                break;
            case 2: // 2 : ステータス更新
                DB::table('status')
                    ->where('id', $id)
                    ->update([
                        'name' => $status,
                        'updated_at' => date("Y-m-d H:i:s")
                    ]);
                break;
            case 3: // 3 : ステータス削除
                DB::table('status')
                    ->where('id', $id)
                    ->update([
                        'updated_at' => date("Y-m-d H:i:s"),
                        'del_flg' => true
                    ]);
                break;
            case 4: // 4 : 社員ステータス追加
                DB::table('employee_status')->insert([
                    'name' => $status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'del_flg' => false
                ]);
                break;
            case 5: // 5 : 社員ステータス更新
                DB::table('employee_status')
                    ->where('id', $id)
                    ->update([
                        'name' => $status,
                        'updated_at' => date("Y-m-d H:i:s")
                    ]);
                break;
            case 6: // 6 : 社員ステータス削除
                DB::table('employee_status')
                    ->where('id', $id)
                    ->update([
                        'name' => $status,
                        'updated_at' => date("Y-m-d H:i:s")
                    ]);
                break;
            case 7: // 4 : 役職追加
                DB::table('managerial_positions')->insert([
                        'name' => $status,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'del_flg' => false
                    ]);
                break;
            case 8: // 5 : 役職更新
                DB::table('managerial_positions')
                    ->where('id', $id)
                    ->update([
                        'name' => $status,
                        'updated_at' => date("Y-m-d H:i:s")
                    ]);
                break;
            case 9: // 6 : 役職削除
                DB::table('managerial_positions')
                    ->where('id', $id)
                    ->update([
                        'updated_at' => date("Y-m-d H:i:s"),
                        'del_flg' => true
                    ]);
                break;
        }
    }
}
