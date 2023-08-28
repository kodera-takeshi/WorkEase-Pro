<?php

namespace App\Service;

use App\Repository\AdminEmployeeStatusRepository;
use App\Repository\AdminStatusRepository;
use Illuminate\Support\Facades\DB;

class ChangeRequestDataService
{
    /**
     * @param $classification // 申請区分
     * @param $id // 変更元ID
     * @param $status // 変更後ステータス
     * @return void
     */
    static function changeRequest($classification, $id, $status)
    {
        switch ($classification) {
            case 1: // 1 : ステータス追加
                AdminStatusRepository::create($status);
                break;
            case 2: // 2 : ステータス更新
                AdminStatusRepository::update($id, $status);
                break;
            case 3: // 3 : ステータス削除
                AdminStatusRepository::delete($id);
                break;
            case 4: // 4 : 社員ステータス追加
                AdminEmployeeStatusRepository::create($status);
                break;
            case 5: // 5 : 社員ステータス更新
                AdminEmployeeStatusRepository::update($id, $status);
                break;
            case 6: // 6 : 社員ステータス削除
                AdminEmployeeStatusRepository::delete($id);
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
