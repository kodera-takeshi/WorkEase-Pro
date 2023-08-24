@extends('admin.template')

@section('title', '役職一覧')

@section('header_title', '役職一覧')

@section('main')
    <div class="w-full mx-auto ">

        <!-- 更新 -->
        <div class="w-1/6 ml-auto">
            @include('admin.components.table_create_button')
        </div>
        @include('admin.components.table_create_form', ['title'=>'役職', 'role'=>\Illuminate\Support\Facades\Session::get('admin.role')])

        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-slate-300">ID</th>
                <th class="w-3/6 border border-slate-500 bg-slate-300 text-left px-3">ステータス名</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">更新</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">削除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($managerial_positions as $managerial_position)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $managerial_position->id }}</td>
                    <td class="border border-slate-500 px-3">{{ $managerial_position->name }}</td>
                    <td class="border border-slate-500 px-3">
                        <!--
                            todo:更新ボタン
                            ・処理動作アイコンの追加
                         -->
                        @include('admin.components.table_update_button', ['id' => $managerial_position->id])
                        @include('admin.components.table_update_form', ['title'=>'役職', 'id'=>$managerial_position->id, 'name'=>$managerial_position->name, 'role'=>\Illuminate\Support\Facades\Session::get('admin.role')])
                    </td>
                    <td class="border border-slate-500 px-3">
                        <!--
                            todo:削除ボタン
                            ・処理動作アイコンの追加
                         -->
                        @include('admin.components.table_delete_button', ['id' => $managerial_position->id])
                        @include('admin.components.table_delete_form', ['title'=>'役職', 'id'=>$managerial_position->id, 'role'=>\Illuminate\Support\Facades\Session::get('admin.role')])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2 class="mt-5">TODO:申請ログテーブルの実装</h2>
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-slate-300">ID</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300 text-left px-3">申請区分</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">変更前ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">変更後ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">ステータス</th>
                <th class="w-1/6 border border-slate-500 bg-slate-300">変更社員ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                @if($request['status'] == '承認')
                    <tr class="bg-green-100">
                @elseif($request['status'] == '否認')
                    <tr class="bg-red-100">
                @elseif($request['status'] == 'キャンセル')
                    <tr class="bg-yellow-100">
                @else
                    <tr>
                        @endif
                        <td class="border border-slate-500 text-center">{{ $request['id'] }}</td>
                        <td class="border border-slate-500 px-3">{{ \App\Enums\RequestClassificationEnum::getDescription($request['classification']) }}</td>
                        <td class="border border-slate-500 px-3">{{ $request['before_status'] }}</td>
                        <td class="border border-slate-500 px-3">{{ $request['after_status'] }}</td>
                        <td class="border border-slate-500 px-3">{{ $request['status'] }}</td>
                        <td class="border border-slate-500 px-3">{{ $request['change_employee'] }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
