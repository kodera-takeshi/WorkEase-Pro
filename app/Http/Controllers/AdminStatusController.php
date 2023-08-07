<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
            'status' => $status
        ]);
    }


    public function update(Request $request)
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
}
