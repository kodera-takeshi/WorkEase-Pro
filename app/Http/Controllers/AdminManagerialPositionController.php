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

class AdminManagerialPositionController extends Controller
{
    /**
     * @return View
     */
    public function index(): view
    {
        $managerial_positions = DB::table('managerial_positions')
            ->where('del_flg', false)
            ->get()
            ->all();

        return view('admin.managerial-position.index', [
            'managerial_positions' => $managerial_positions
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

        DB::table('managerial_positions')
            ->where('id', $request->id)
            ->update($param);

        return Redirect::route('admin.managerial-position');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $check = DeleteService::check($request->delete);

        if ($check) {
            DB::table('managerial_positions')
                ->where('id', $request->id)
                ->update([
                    'del_flg' => true
                ]);
            return Redirect::route('admin.managerial-position');
        } else {
            return Redirect::route('admin.managerial-position');
        }
    }
}
