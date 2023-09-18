<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class EmployeeGroupMemberRepository
{
    static function getMember($employee_group_id)
    {
        return DB::table('employee_group_members')
            ->where('employee_group_id', $employee_group_id)
            ->get();
    }
}
