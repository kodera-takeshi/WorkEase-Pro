<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class OfficeRepository
{
    /**
     * @param $company_id
     * @param $name
     * @param $phone_number
     * @param $postal_code
     * @param $address
     * @return array
     */
    static function create($company_id, $name, $phone_number, $postal_code, $address)
    {
        $param = [
            'company_id' => $company_id,
            'name' => $name,
            'phone_number' => $phone_number,
            'postal_code' => $postal_code,
            'address' => $address,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ];
        DB::table('offices')->insert($param);

        return $param;
    }

    static function advancedSearch($param)
    {
        $company = DB::table('offices')
            ->where('company_id', $param['company_id'])
            ->where('name', $param['name'])
            ->first();
        return $company;
    }
}
