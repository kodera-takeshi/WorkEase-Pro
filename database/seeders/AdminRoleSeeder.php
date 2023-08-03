<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'name' => 'Master',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => 'Officer',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => 'Manager',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
            [
                'name' => 'Staff',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => false
            ],
        ];

        foreach ($params as $param) {
            DB::table('admin_roles')->insert($param);
        }
    }
}
