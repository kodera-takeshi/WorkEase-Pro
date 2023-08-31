<?php

namespace App\Service;

use App\Enums\AdminRoleEnum;

class AdminListService
{
    static function makeList($params)
    {
        $admins = [];
        foreach ($params as $param) {
            $role = AdminRoleEnum::getDescription($param->admin_role_id);
            $admin = [
                'id' => $param->id,
                'name' => $param->name,
                'role_id' => $param->admin_role_id,
                'role' => $role,
            ];
            $admins[] = $admin;
        }
        return $admins;
    }
}
