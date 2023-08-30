<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminCompanyRepository
{
    static function all()
    {
        $companies = DB::table('companies')
            ->where('del_flg', false)
            ->get()
            ->all();
        return $companies;
    }
}
