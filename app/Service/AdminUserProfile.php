<?php

namespace App\Service;

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
        $user_image = DB::table('admins')
            ->select('img_url')
            ->where('id', $param['id'])
            ->where('del_flg', false)
            ->first();

        // プロフィール画像が登録済みの場合は、既に登録されているファイルを削除する
        if ($user_image->img_url !== null) {
            Storage::delete($user_image->img_url);
        }
        // 画像の保存と、pathの取得
        $path = $image->store('AdminUserImages', 'local');

        return $path;
    }
}
