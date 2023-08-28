<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminManagerialPositionRepository
{
    static function create($name)
    {
        DB::table('managerial_positions')->insert([
            'name' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ]);
    }

    static function update($id, $name)
    {
        DB::table('managerial_positions')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    static function delete($id)
    {
        DB::table('managerial_positions')
            ->where('id', $id)
            ->update([
                'updated_at' => date("Y-m-d H:i:s"),
                'del_flg' => true
            ]);
    }
}
