<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerialPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'name' => '取締役会',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '会長',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '社長・CEO',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '副社長・COO',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '専務',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '常務',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '部長・チーフマネージャー',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '次長・マネージャー',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '室長・グループリーダー',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => '課長・チームリーダー',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => 'スタッフ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
        ];

        foreach ($params as $param) {
            DB::table('managerial_positions')->insert($param);
        }
    }
}
