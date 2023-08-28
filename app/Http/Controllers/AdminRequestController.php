<?php

namespace App\Http\Controllers;

use App\Repository\AdminRequestRepository;
use App\Service\RequestListParamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Service\ChangeRequestDataService;

class AdminRequestController extends Controller
{
    public function index()
    {
        // 新規承認取得
        $requests = AdminRequestRepository::newRequests();
        $requests = RequestListParamService::makeList($requests);
        // 承認済み申請取得
        $approved_requests = AdminRequestRepository::approvedRequest();
        $approved_requests = RequestListParamService::makeList($approved_requests);
        // 否認済み申請取得
        $denied_requests = AdminRequestRepository::deniedRequest();
        $denied_requests = RequestListParamService::makeList($denied_requests);
        // キャンセル済み申請取得
        $canceled_requests = AdminRequestRepository::canceledRequest();
        $canceled_requests = RequestListParamService::makeList($canceled_requests);

        $table_data = [
            'requests' => $requests,
            'approved_requests' => $approved_requests,
            'denied_requests' => $denied_requests,
            'canceled_requests' => $canceled_requests
        ];

        return view('admin.requests.index', $table_data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function approval(Request $request)
    {
        // 更新するステータスを取得
        $approval_request = AdminRequestRepository::get($request->id);
        // ステータス更新
        ChangeRequestDataService::changeRequest($approval_request->classification, $approval_request->original_id, $approval_request->after_status);
        // 申請承認
        AdminRequestRepository::approval($request->id, $request->session()->get('admin.id'));

        return Redirect::route('admin.requests');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function denial(Request $request)
    {
        //申請否認
        AdminRequestRepository::denial($request->id, $request->session()->get('admin.id'));

        return Redirect::route('admin.requests');
    }
}
