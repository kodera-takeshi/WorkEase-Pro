<!--
    todo:申請可否ボタン
    ・処理動作アイコンの追加
 -->
<a
    href="#denial-{{ $id }}"
    class="block rounded-lg rounded-full bg-red-500 text-white py-2 px-4 w-3/5 my-2 mx-auto mx-auto text-center font-bold"
>
    申請否認
</a>


<div id="denial-{{ $id }}" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-1/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
            <h1 class="text-2xl font-bold tracking-tight">
                この申請を否認しますか？
            </h1>
            <form action="{{ route('admin.requests.denial') }}" method="POST">
                @csrf
                <label
                    for="id"
                    class="block text-sm text-left font-semibold leading-6 text-gray-900 mt-6 px-2"
                >
                    申請ID
                </label>
                <input
                    type="text"
                    name="id"
                    id="id"
                    autocomplete="id"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    value="{{ $id }}"
                    readonly
                >
                <label
                    for="request_employee"
                    class="block text-sm text-left font-semibold leading-6 text-gray-900 mt-3 px-2"
                >
                    申請者
                </label>
                <select
                    name="request_employee"
                    id="request_employee"
                    class="block w-full rounded-md border-0 px-2 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                >
                    <option value="{{ $request_employee_id }}">{{ $request_employee }}</option>
                </select>

                <div class="mt-10">
                    <button
                        type="submit"
                        class="block rounded-md bg-red-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:red-offset-2 focus-visible:outline-red-600 mx-auto"
                    >
                        否認
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
