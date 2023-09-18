<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class EmployeeGroupRepository
{
    /**
     * @param $company_id
     * @return array
     */
    static function get($company_id)
    {
        return DB::table('employee_groups')
            ->where('company_id')
            ->get()
            ->all();
    }
}
