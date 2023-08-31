@extends('admin.template')

@section('title', '管理者一覧')

@section('header_title', '管理者一覧')

@section('main')
    <table class="w-full table-fixed border-collapse border border-slate-400">
        <thead class="w-full">
        <tr>
            <th class="w-1/6 border border-slate-500 bg-slate-300">ID</th>
            <th class="w-2/6 border border-slate-500 bg-slate-300">名前</th>
            <th class="w-1/6 border border-slate-500 bg-slate-300">権限</th>
            <th class="w-1/6 border border-slate-500 bg-slate-300">更新</th>
            <th class="w-1/6 border border-slate-500 bg-slate-300">削除</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach($status as $item)--}}
            <tr>
                <td class="border border-slate-500 text-center">1</td>
                <td class="border border-slate-500 text-center">小寺剛史</td>
                <td class="border border-slate-500 text-center">Officer</td>
                <td class="border border-slate-500 text-center">更新ボタン</td>
                <td class="border border-slate-500 text-center">削除ボタン</td>
{{--        @endforeach--}}
        </tbody>
    </table>
@endsection
