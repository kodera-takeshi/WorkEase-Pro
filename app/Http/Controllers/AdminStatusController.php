<?php

namespace App\Http\Controllers;

use App\Service\DeleteService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminStatusController extends Controller
{
    /**
     * @return View
     */
    public function index(): view
    {
        $status = DB::table('status')
            ->where('del_flg', false)
            ->get()
            ->all();

        return view('admin.status.index', [
            'status' => $status,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $param = [
            'name' => $request->name,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        DB::table('status')
            ->where('id', $request->id)
            ->update($param);

        return Redirect::route('admin.status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ];

        DB::table('status')->insert($param);

        return Redirect::route('admin.status');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $check = DeleteService::check($request->delete);

        if ($check) {
            DB::table('status')
                ->where('id', $request->id)
                ->update([
                    'del_flg' => true
                ]);
            return Redirect::route('admin.status');
        } else {
            return Redirect::route('admin.status');
        }
    }
}
