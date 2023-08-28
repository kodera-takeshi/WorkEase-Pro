<?php

namespace App\Service;

use App\Repository\AdminUserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminUserProfile
{
    /**
     * @param $image
     * @param array $param
     * @return string
     */
    static function updateImage($image, array $param): string
    {
        // 登録チェック
        $admin = AdminUserRepository::check($param['id']);

        // プロフィール画像が登録済みの場合は、既に登録されているファイルを削除する
        if ($admin->img_url !== null) {
            Storage::delete($admin->img_url);
        }
        // 画像の保存と、pathの取得
        $path = $image->store('AdminUserImages', 'local');

        return $path;
    }
}
