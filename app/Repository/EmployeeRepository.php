<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class EmployeeRepository
{
    /**
     * @param array $param
     * @return void
     */
    static function create(array $param) {
        DB::table('employees')->insert($param);
    }

    /**
     * @param $param
     * @return Model|Builder|object|null
     */
    static function advancedSearch($param)
    {
        $company = DB::table('employees')
            ->where('company_id', $param['company_id'])
            ->where('office_id', $param['office_id'])
            ->where('name', $param['name'])
            ->first();
        return $company;
    }
}
