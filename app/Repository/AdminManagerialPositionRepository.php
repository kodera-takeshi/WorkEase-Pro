<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminManagerialPositionRepository
{
    static function all()
    {
        DB::table('managerial_positions')
            ->where('del_flg', false)
            ->get()
            ->all();
    }

    static function get($id)
    {
        $before_status = DB::table('managerial_positions')
            ->where('id', $id)
            ->first();

        return $before_status;
    }

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

    static function createRequest($id, $name)
    {
        $param = [
            'classification' => 7,
            'original_id' => null,
            'before_status' => null,
            'after_status' => $name,
            'request_employee_id' => $id,
            'created_at' => date("Y-m-d H:i:s")
        ];

        Self::request($param);
    }

    static function updateRequest($original_id, $before_status_name, $name, $id)
    {
        $param = [
            'classification' => 8,
            'original_id' => $original_id,
            'before_status' => $before_status_name,
            'after_status' => $name,
            'request_employee_id' => $id,
            'created_at' => date("Y-m-d H:i:s")
        ];

        Self::request($param);
    }

    static function deleteRequest($original_id, $before_status_name, $name, $id)
    {
        $param = [
            'classification' => 9,
            'original_id' => $original_id,
            'before_status' => $before_status_name,
            'after_status' => $name,
            'request_employee_id' => $id,
            'created_at' => date("Y-m-d H:i:s")
        ];

        Self::request($param);
    }

    private function request($param)
    {
        DB::table('requests')->insert($param);
    }
}
