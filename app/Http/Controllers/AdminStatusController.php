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
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
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
    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
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
    public function delete(Request $request)
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
