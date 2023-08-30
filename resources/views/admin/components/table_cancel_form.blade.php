<div id="cancel-status_{{ $id }}" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
            <h2 class="font-bold">申請キャンセル</h2>
            <form action="{{ route('admin.requests.cansel') }}" method="POST">
                @csrf
                <label for="id-{{ $id }}" class="block text-sm font-semibold leading-6 text-gray-900">ID</label>
                <input
                    type="text"
                    name="id"
                    id="id-{{ $id }}"
                    autocomplete="id"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    value="{{ $id }}"
                    readonly
                >
                <label for="cancel-{{ $id }}" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">
                    申請をキャンセルする場合は、以下のフィールドに"キャンセル"と入力してください
                </label>
                <input
                    type="text"
                    name="cancel"
                    id="cancel-{{ $id }}"
                    autocomplete="delete"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    placeholder="キャンセル"
                    required
                >
                <div class="mt-10">
                    <button
                        type="submit"
                        class="block w-full rounded-md bg-yellow-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600"
                    >
                        キャンセル
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
