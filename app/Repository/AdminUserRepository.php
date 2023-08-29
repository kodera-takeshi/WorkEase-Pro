<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AdminUserRepository
{
    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    static function get($id)
    {
        $admin = DB::table('admins')
            ->where('id', $id)
            ->first();

        return $admin;
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    static function check($id)
    {
        $admin = DB::table('admins')
            ->where('id', $id)
            ->where('del_flg', false)
            ->first();

        return $admin;
    }
}
