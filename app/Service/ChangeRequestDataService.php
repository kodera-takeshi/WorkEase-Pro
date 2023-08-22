<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class ChangeRequestDataService
{
    static function changeRequest($classification, $status)
    {
        switch ($classification) {
            // 1 : ステータス追加
            case 1:
                DB::table('status')->insert([
                    'name' => $status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'del_flg' => false
                ]);
                break;
        }
    }
}
