@extends('admin.template')

@section('title', '申請一覧')

@section('header_title', '申請一覧')

@section('main')
    <div class="w-full mx-auto ">
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-slate-300">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">申請社員</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">申請承認</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">申請否認</th>
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
    </div>
@endsection
