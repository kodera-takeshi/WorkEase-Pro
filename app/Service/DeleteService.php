<?php

namespace App\Service;

class DeleteService
{
    /**
     * @param string $text
     * @return bool
     */
    static function check(string $text): bool
    {
        if ("削除" === $text) {
            return true;
        } else {
            return false;
        }
    }
}
