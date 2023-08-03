<?php

namespace App\Service;

use Illuminate\Support\Facades\Hash;

class PasswordService
{
    /**
     * パスワードをハッシュ化する
     * @param string $password
     * @return string
     */
    static function hash(string $password): string
    {
        return Hash::make($password);
    }

    /**
     * パスワードをチェックする
     * @param string $password
     * @param string $hash_password
     * @return bool
     */
    static function check(string $password, string $hash_password): bool
    {
        if (Hash::check($password, $hash_password)) {
            return true;
        } else {
            return false;
        }
    }
}
