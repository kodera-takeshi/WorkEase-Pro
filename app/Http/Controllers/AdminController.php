<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use App\Service\AdminUserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Service\PasswordService;
use App\Http\Requests\AdminSignupRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function signin()
    {
        $message = null;
        return view('admin.authentications.signin', ['message' => $message]);
    }

    public function check(Request $request)
    {
        /* メールアドレス判定 */
        $email = $request->email;
        $admin = AdminRepository::mailCheck($email);
        if (!$admin) {
            $message = '登録されていないメールアドレスです。';
            return view('admin.authentications.signin', ['message' => $message]);
        }

        /* パスワード判定 */
        $password = $request->password;
        $hash_password = $admin->password;
        $password_check = PasswordService::check($password, $hash_password);
        if (!$password_check) {
            $message = 'パスワードが違います。';
            return view('admin.authentications.signin', ['message' => $message]);
        }

        // sessionにログイン情報を登録
        AdminRepository::sessionCreate($request, $admin->id, $admin->name, $email);

        return Redirect::route('admin');
    }

    public function signup()
    {
        return view('admin.authentications.signup');
    }

    public function create(AdminSignupRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        // パスワードのハッシュ化
        $password = PasswordService::hash($request->password);

        // DBにアカウントを登録
        $admin = AdminRepository::create($name, $email, $password);

        if ($admin) {
            $admin_account = DB::table('admins')
                ->where([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                ])
                ->first();

            // sessionにログイン情報を登録
            $session_param = [
                'id' => $admin_account['id'],
                'name' => $name,
                'email' => $email
            ];
            $request->session()->put('admin', $session_param);
        } else {
            return redirect()->route('admin.authentications.signup');
        }

        return Redirect::route('admin');
    }

    public function edit()
    {
        return view('admin.user.profile');
    }

    public function update(Request $request)
    {
        $request_param = [
            'id' => $request->id,
            'file' =>$request->file,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        // 更新するレコードを取得
        $admin_db = DB::table('admins')->where('id', $request_param['id']);
        $admin = $admin_db->first();
        // パスワードチェック
        $check = PasswordService::check($request_param['password'], $admin->password);
        if ($check) {
            /* プロフィール画像の登録処理 */
            $image_data = $request->file('file');
            $image = AdminUserProfile::updateImage($image_data, $request_param);

            // データ更新
            $param = [
                'name' => $request->name,
                'email' => $request->email,
                'img_url' => $image,
                'updated_at' => date("Y-m-d H:i:s")
            ];
            $admin_db->update($param);
        }

        /*
        | todo:S3との接続
        | Reference
        |  https://taishou.ne.jp/laravel-s3-connect/
        |  https://zenn.dev/ikeo/articles/c55ecf1345e70c193f7a
        | Error
        |  League\Flysystem\Filesystem::write(): Argument #2 ($contents) must be of type string, null given, called in /Users/koderatakeshi/tc-app/tc-app/vendor/laravel/framework/src/Illuminate/Filesystem/FilesystemAdapter.php on line 375
        */
//        $s3 = Storage::disk('s3')->put('/', $request->file);

        return Redirect::route('admin.profile');
    }

    public function signout(Request $request)
    {
        $request->session()->forget('admin');

        return Redirect::route('admin.signin');
    }
}
