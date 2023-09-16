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
    static function create(array $param)
    {
        DB::table('employees')->insert($param);
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        return DB::table('employees')
            ->where('id', $id)
            ->first();
    }

    static function employee($company_id)
    {
        return DB::table('employees')
            ->where('company_id', $company_id)
            ->where('employee_status_id', 1)
            ->get()
            ->all();
    }

    /**
     * @param $param
     * @return Model|Builder|object|null
     */
    static function advancedSearch($param)
    {
        $employee = DB::table('employees')
            ->where('company_id', $param['company_id'])
            ->where('office_id', $param['office_id'])
            ->where('name', $param['name'])
            ->first();
        return $employee;
    }

    /**
     * メールアドレスチェック
     * @param $email
     * @return Model|Builder|object|null
     */
    static function mailCheck($email)
    {
        $employee = DB::table('employees')
            ->where('email', $email)
            ->first();
        return $employee;
    }
}
