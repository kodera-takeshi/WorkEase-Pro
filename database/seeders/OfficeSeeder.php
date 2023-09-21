<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params= [
            0 => [
                'company_id' => 1,
                'name' => '岐阜オフィス',
                'phone_number' => '058-214-9760',
                'postal_code' => '500-8323',
                'address' => '岐阜県岐阜市鹿島町1丁目5番地 鹿島スクエアビル9F',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            1 => [
                'company_id' => 1,
                'name' => '横須賀オフィス',
                'phone_number' => null,
                'postal_code' => '238-0004',
                'address' => '神奈川県横須賀市小川町19-5 富士ビル3階 16Startups',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            2 => [
                'company_id' => 1,
                'name' => '仙台オフィス',
                'phone_number' => null,
                'postal_code' => '983-0044',
                'address' => '仙台市宮城野区宮千代2-3-11 渡正ビル401',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            3 => [
                'company_id' => 1,
                'name' => '気仙沼オフィス',
                'phone_number' => null,
                'postal_code' => '988-0511',
                'address' => '気仙沼市唐桑町舘68番 ITベースこはらぎ荘',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            4 => [
                'company_id' => 1,
                'name' => '函館オフィス',
                'phone_number' => null,
                'postal_code' => '041-0806',
                'address' => '北海道函館市美原2-7-21 万勝ビル1階 MIRAI BASE',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            5 => [
                'company_id' => 1,
                'name' => '伊万里オフィス',
                'phone_number' => null,
                'postal_code' => '848-0027',
                'address' => '佐賀県伊万里市立花町3448番地8 伊万里市ビジネス支援オフィス バンリビル305',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            6 => [
                'company_id' => 1,
                'name' => '吉野ヶ里オフィス',
                'phone_number' => null,
                'postal_code' => '842-0032',
                'address' => '佐賀県神埼郡吉野ヶ里町立野560-5',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            7 => [
                'company_id' => 1,
                'name' => '高千穂オフィス',
                'phone_number' => null,
                'postal_code' => '882-1101',
                'address' => '宮崎県西臼杵郡高千穂町三田井778 真名井オフィス3階 高千穂ITセンター',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            8 => [
                'company_id' => 1,
                'name' => '四万十町オフィス',
                'phone_number' => null,
                'postal_code' => '786-0005',
                'address' => '高知県高岡郡四万十町本町５番１号 四万十町コワーキングスペース2階',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
            9 => [
                'company_id' => 1,
                'name' => '美濃オフィス',
                'phone_number' => null,
                'postal_code' => '501-3723',
                'address' => '岐阜県美濃市相生町2240-2 WASITA MINO',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => null,
                'del_flg' => false,
            ],
        ];
        foreach ($params as $param) {
            DB::table('offices')->insert($param);
        }
    }
}
