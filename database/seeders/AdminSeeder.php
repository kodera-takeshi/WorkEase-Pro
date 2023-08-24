<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'name' => '小寺剛史',
                'email' => 'kodera.timecapsule@gmail.com',
                'password' => Hash::make('Tcl_0401'),
                'img_url' => null,
                'admin_role_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false,
            ],
//            [
//                'name' => '退職',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//                'del_flg' => false
//            ],
//            [
//                'name' => '休職',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//                'del_flg' => false
//            ],
        ];

        foreach ($params as $param) {
            DB::table('admins')->insert($param);
        }
    }
}
