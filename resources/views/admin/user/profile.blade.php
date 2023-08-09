@extends('admin.template')

@section('title', 'プロフィール')

@section('header_title', 'プロフィール')

@section('main')
    <div class="w-4/5 mx-auto">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="file" class="block text-sm font-semibold leading-6 text-gray-900">Icon</label>
                    <!-- todo:登録した画像の表示 -->
                    <img src="{{ asset("storage/app/". \Illuminate\Support\Facades\Session::get('admin.img_url')) }}" >
                    <div class="mt-2.5">
                        <input
                            type="file"
                            name="file"
                            id="file"
                            accept=".jpg"
                            autocomplete="file"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="id" class="block text-sm font-semibold leading-6 text-gray-900">ID</label>
                    <div class="mt-2.5">
                        <input
                            type="text"
                            name="id"
                            id="id"
                            autocomplete="id"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ \Illuminate\Support\Facades\Session::get('admin.id') }}"
                            readonly
                        >
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">名前</label>
                    <div class="mt-2.5">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            autocomplete="name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ \Illuminate\Support\Facades\Session::get('admin.name') }}"
                            required
                        >
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">メールアドレス</label>
                    <div class="mt-2.5">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            autocomplete="email"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ \Illuminate\Support\Facades\Session::get('admin.email') }}"
                            required
                        >
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">パスワード</label>
                    <div class="mt-2.5">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            autocomplete="password"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="プロフィールを更新するためにはパスワードを入力してください"
                            required
                        >
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                            class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    >
                        更新
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
