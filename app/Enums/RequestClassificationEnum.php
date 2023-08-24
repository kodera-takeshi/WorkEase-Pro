<?php

namespace App\Enums;

class RequestClassificationEnum
{
    // 基本情報
    const STATUS_CREATE = 1;
    const STATUS_UPDATE = 2;
    const STATUS_DELETE = 3;
    const EMPLOYEE_STATUS_CREATE = 4;
    const EMPLOYEE_STATUS_UPDATE = 5;
    const EMPLOYEE_STATUS_DELETE = 6;
    const MANAGERIAL_POSITION_CREATE = 7;
    const MANAGERIAL_POSITION_UPDATE = 8;
    const MANAGERIAL_POSITION_DELETE = 9;

    public static function getDescription($value): string
    {
        if ($value == self::STATUS_CREATE) {
            return 'ステータス作成';
        } elseif ($value == self::STATUS_UPDATE) {
            return 'ステータス更新';
        } elseif ($value == self::STATUS_DELETE) {
            return 'ステータス削除';
        } elseif ($value == self::EMPLOYEE_STATUS_CREATE) {
            return '社員ステータス作成';
        } elseif ($value == self::EMPLOYEE_STATUS_UPDATE) {
            return '社員ステータス更新';
        } elseif ($value == self::EMPLOYEE_STATUS_DELETE) {
            return '社員ステータス削除';
        } elseif ($value == self::MANAGERIAL_POSITION_CREATE) {
            return '役職作成';
        } elseif ($value == self::MANAGERIAL_POSITION_UPDATE) {
            return '役職更新';
        } elseif ($value == self::MANAGERIAL_POSITION_DELETE) {
            return '役職削除';
        }
    }

    public static function getValue(string $key)
    {
        if ($key === 'ステータス作成') {
            return self::STATUS_CREATE;
        }elseif ($key === 'ステータス更新') {
            return self::STATUS_UPDATE;
        }elseif ($key === 'ステータス削除') {
            return self::STATUS_DELETE;
        }elseif ($key === '社員ステータス作成') {
            return self::EMPLOYEE_STATUS_CREATE;
        }elseif ($key === '社員ステータス更新') {
            return self::EMPLOYEE_STATUS_UPDATE;
        }elseif ($key === '社員ステータス削除') {
            return self::EMPLOYEE_STATUS_DELETE;
        }elseif ($key === '役職作成') {
            return self::MANAGERIAL_POSITION_CREATE;
        }elseif ($key === '役職更新') {
            return self::MANAGERIAL_POSITION_UPDATE;
        }elseif ($key === '役職削除') {
            return self::MANAGERIAL_POSITION_DELETE;
        }
    }
}
