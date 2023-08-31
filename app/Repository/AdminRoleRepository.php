<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminRoleRepository
{
    static function all()
    {
        $admin_roles = DB::table('admin_roles')
            ->where('del_flg', false)
            ->get()
            ->all();
        return $admin_roles;
    }
}
