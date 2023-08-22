<?php

namespace App\Http\Controllers;

use App\Service\RequestListParamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminRequestController extends Controller
{
    public function index()
    {
        $requests = DB::table('requests');

        // 新規承認取得
        $requests = $requests
            ->where('approval_flg', false)
            ->where('denial_flg', false)
            ->where('cancel_flg', false);

        $requests = $requests->get()->all();
        $requests = RequestListParamService::makeList($requests);
//        dd($requests);
        return view('admin.requests.index', ['requests'=>$requests]);
    }

    public function approval(Request $request)
    {
        $request_id = $request->id;

        $approval_request = DB::table('requests')
            ->where('id', $request_id)
            ->first();
        $param = [
            'before_status' => $approval_request->before_status,
            'after_status' => $approval_request->after_status,
            'request_employee_id' => $approval_request->request_employee_id,
            'change_employee_id' => $approval_request->change_employee_id,
            'date' => date("Y-m-d H:i:s")
        ];
        switch ($approval_request->classification) {
            case 1:
                DB::table('status')->insert([
                    'name' => $param['after_status'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'del_flg' => false
                ]);
                break;
        }

        $approval_request = DB::table('requests')
            ->where('id', $request_id)
            ->update([
                'change_employee_id' => $param['change_employee_id'],
                'approval_flg'=>true,
            ]);

        return Redirect::route('admin.requests');
    }
}
