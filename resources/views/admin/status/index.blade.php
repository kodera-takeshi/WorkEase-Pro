@extends('admin.template')

@section('title', 'ステータス一覧')

@section('header_title', 'ステータス一覧')

@section('main')
    <div class="w-full mx-auto ">
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
            @foreach($status as $item)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $item->id }}</td>
                    <td class="border border-slate-500 px-3">{{ $item->name }}</td>
                    <td class="border border-slate-500 px-3">
                        <!-- todo:更新モーダルを作成 -->
                        <button class="rounded-lg rounded-full bg-blue-500 text-white px-4 flex mx-auto">更新</button>
                    </td>
                    <td class="border border-slate-500 px-3">
                        <!-- todo:削除モーダルを作成 -->
                        <button class="rounded-lg rounded-full bg-red-500 text-white px-4 flex mx-auto">削除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
