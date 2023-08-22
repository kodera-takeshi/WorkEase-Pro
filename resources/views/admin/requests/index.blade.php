@extends('admin.template')

@section('title', '申請一覧')

@section('header_title', '申請一覧')

@section('main')
    <div class="w-full mx-auto ">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">申請リスト</h2>
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-blue-300">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-blue-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-blue-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-blue-300">申請社員</th>
                <th class="w-1/6 border border-slate-500 bg-blue-300">承認</th>
                <th class="w-1/6 border border-slate-500 bg-blue-300">否認</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $request['classification'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $request['before_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $request['after_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $request['request_employee'] }}</td>
                    <td class="border border-slate-500 text-center">
                        @include('admin.components.request_approval', ['id' => $request['id'],'request_employee_id'=>$request['request_employee_id'], 'request_employee'=>$request['request_employee']])
                    </td>
                    <td class="border border-slate-500 text-center">
                        {{ $request['id'] }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mt-5">承認済みリスト</h2>
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-green-300">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-green-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-green-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-green-300">申請社員</th>
                <th class="w-1/6 border border-slate-500 bg-green-300">変更社員</th>
                <th class="w-1/6 border border-slate-500 bg-green-300">承認日時</th>
            </tr>
            </thead>
            <tbody>
            @foreach($approved_requests as $approved_request)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $approved_request['classification'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $approved_request['before_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $approved_request['after_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $approved_request['request_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $approved_request['change_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $approved_request['updated_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mt-5">否認済みリスト</h2>
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-red-300">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-red-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-red-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-red-300">申請社員</th>
                <th class="w-1/6 border border-slate-500 bg-red-300">変更社員</th>
                <th class="w-1/6 border border-slate-500 bg-red-300">否認日時</th>
            </tr>
            </thead>
            <tbody>
            @foreach($denied_requests as $denied_request)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $denied_request['classification'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $denied_request['before_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $denied_request['after_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $denied_request['request_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $denied_request['change_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $denied_request['updated_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mt-5">キャンセルリスト</h2>
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">申請社員</th>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">変更社員</th>
                <th class="w-1/6 border border-slate-500 bg-yellow-300">キャンセル日時</th>
            </tr>
            </thead>
            <tbody>
            @foreach($canceled_requests as $canceled_request)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['classification'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['before_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['after_status'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['request_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['change_employee'] }}</td>
                    <td class="border border-slate-500 text-center">{{ $canceled_request['updated_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
