<?php

namespace App\Http\Controllers;

use App\Service\RequestListParamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Service\ChangeRequestDataService;

class AdminRequestController extends Controller
{
    public function index()
    {
        // 新規承認取得
        $requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', false)
            ->where('cancel_flg', false);
        $requests = $requests->get()->all();
        $requests = RequestListParamService::makeList($requests);

        // 承認済み申請取得
        $approved_requests = DB::table('requests')
            ->where('approval_flg', true)
            ->where('denial_flg', false)
            ->where('cancel_flg', false);
        $approved_requests = $approved_requests->get()->all();
        $approved_requests = RequestListParamService::makeList($approved_requests);

        // 否認済み申請取得
        $denied_requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', true)
            ->where('cancel_flg', false);
        $denied_requests = $denied_requests->get()->all();
        $denied_requests = RequestListParamService::makeList($denied_requests);

        // キャンセル済み申請取得
        $canceled_requests = DB::table('requests')
            ->where('approval_flg', false)
            ->where('denial_flg', false)
            ->where('cancel_flg', true);
        $canceled_requests = $canceled_requests->get()->all();
        $canceled_requests = RequestListParamService::makeList($canceled_requests);

        $table_list = [
            'requests' => $requests,
            'approved_requests' => $approved_requests,
            'denied_requests' => $denied_requests,
            'canceled_requests' => $canceled_requests
        ];
//        dd($table_list);
        return view('admin.requests.index', $table_list);
    }

    public function approval(Request $request)
    {
        $request_id = $request->id;

        $approval_request = DB::table('requests')
            ->where('id', $request_id)
            ->first();

        $param = [
            'original_id' => $approval_request->original_id,
            'before_status' => $approval_request->before_status,
            'after_status' => $approval_request->after_status,
            'request_employee_id' => $approval_request->request_employee_id,
            'change_employee_id' => $approval_request->change_employee_id,
            'date' => date("Y-m-d H:i:s")
        ];

        $change_request = ChangeRequestDataService::changeRequest($approval_request->classification, $param['original_id'], $param['after_status']);

        $approval_request = DB::table('requests')
            ->where('id', $request_id)
            ->update([
                'change_employee_id' => $request->session()->get('admin.id'),
                'approval_flg'=>true,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return Redirect::route('admin.requests');
    }
}
