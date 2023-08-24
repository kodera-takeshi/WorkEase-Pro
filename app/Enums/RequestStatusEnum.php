<?php

namespace App\Enums;

enum RequestStatus: int
{
    // 基本情報
    case approval = 1;
    case denial = 2;
    case cancel = 3;

    // 日本語を追加
    public function label(): string
    {
        return match($this)
        {
            Category::Approval => '承認',
            Category::Denial => '否認',
            Category::Cancel => 'キャンセル',
        };
    }
}
