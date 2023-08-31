<?php

namespace App\Enums;

enum AdminRoleEnum
{

    // 基本情報
    const MASTER = 1;
    const OFFICER = 2;
    const MANAGER = 3;
    const STAFF = 4;

    public static function getDescription($value): string
    {
        if ($value == self::MASTER) {
            return 'Master';
        } elseif ($value == self::OFFICER) {
            return 'Officer';
        } elseif ($value == self::MANAGER) {
            return 'Manager';
        } elseif ($value == self::STAFF) {
            return 'Staff';
        } else {
            return '';
        }
    }

    public static function getValue(string $key)
    {
        if ($key === 'Master') {
            return self::MASTER;
        }elseif ($key === 'Officer') {
            return self::OFFICER;
        }elseif ($key === 'Manager') {
            return self::MANAGER;
        }elseif ($key === 'Staff') {
            return self::STAFF;
        }
    }
}
