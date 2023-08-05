<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminManagerialPositionController extends Controller
{
    public function index()
    {
        $managerial_positions = DB::table('managerial_positions')
            ->where('del_flg', false)
            ->get()
            ->all();

        return view('admin.managerial-position.index', [
            'managerial_positions' => $managerial_positions
        ]);
    }
}
