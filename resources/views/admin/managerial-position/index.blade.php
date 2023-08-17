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
                        <div id="update-modal_{{ $managerial_position->id }}" class="hidden target:block">
                            <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
                                <a href="" class="block w-full h-full cursor-default"></a>
                                <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
                                    <h2 class="font-bold">役職の更新</h2>
                                    <form action="{{ route('admin.managerial-position.update') }}" method="POST">
                                        @csrf
                                        <!-- todo:権限の適用 -->
                                        @include('admin.components.table_update_form', ['id'=>$managerial_position->id, 'name'=>$managerial_position->name])
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="border border-slate-500 px-3">
                        <!--
                            todo:削除ボタン
                            ・処理動作アイコンの追加
                         -->
                        @include('admin.components.table_delete_button', ['id' => $managerial_position->id])
                        <div id="delete-modal_{{ $managerial_position->id }}" class="hidden target:block">
                            <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
                                <a href="" class="block w-full h-full cursor-default"></a>
                                <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
                                    <h2 class="font-bold">役職の削除</h2>
                                    <form action="{{ route('admin.managerial-position.delete') }}" method="POST">
                                        @csrf
                                        <!-- todo:権限の適用 -->
                                        @include('admin.components.table_delete_form', ['id'=>$managerial_position->id])
                                    </form>
                                </div>
                            </div>
                        </div>
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
            @foreach($managerial_positions as $managerial_position)
                <tr>
                    <td class="border border-slate-500 text-center">1</td>
                    <td class="border border-slate-500 px-3">ステータス登録</td>
                    <td class="border border-slate-500 px-3"></td>
                    <td class="border border-slate-500 px-3">ヨイショ山口</td>
                    <td class="border border-slate-500 px-3">申請中</td>
                    <td class="border border-slate-500 px-3">山崎</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
