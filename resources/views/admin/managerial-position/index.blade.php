@extends('admin.template')

@section('title', '役職一覧')

@section('header_title', '役職一覧')

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
            @foreach($managerial_positions as $managerial_position)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $managerial_position->id }}</td>
                    <td class="border border-slate-500 px-3">{{ $managerial_position->name }}</td>
                    <td class="border border-slate-500 px-3">
                        <a
                            href="#update-modal_{{ $managerial_position->id }}"
                            class="block rounded-lg rounded-full bg-blue-500 text-white px-4 w-2/5 mx-auto text-center"
                        >
                            更新
                        </a>
                        <div id="update-modal_{{ $managerial_position->id }}" class="hidden target:block">
                            <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
                                <a href="" class="block w-full h-full cursor-default"></a>
                                <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
                                    <h2 class="font-bold">役職の更新</h2>
                                    <form action="{{ route('admin.managerial-position.update') }}" method="POST">
                                        @csrf
                                        <label for="id-{{ $managerial_position->id }}" class="block text-sm font-semibold leading-6 text-gray-900">ID</label>
                                        <input
                                            type="text"
                                            name="id"
                                            id="id-{{ $managerial_position->id }}"
                                            autocomplete="id"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                                            value="{{ $managerial_position->id }}"
                                            readonly
                                        >
                                        <label for="name-{{ $managerial_position->id }}" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">ステータス</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name-{{ $managerial_position->id }}"
                                            autocomplete="name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                                            value="{{ $managerial_position->name }}"
                                            required
                                        >
                                        <div class="mt-10">
                                            <button
                                                type="submit"
                                                class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                                            >
                                                更新
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
