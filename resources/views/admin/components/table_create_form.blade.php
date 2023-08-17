<h2 class="font-bold">{{ $title }}を追加</h2>
<label for="name" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">{{ $title }}名</label>
<input
    type="text"
    name="name"
    id="name"
    autocomplete="name"
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
    placeholder="追加する{{ $title }}名を入力してください。"
    required
>
<div class="mt-10">
    <button type="submit"
            class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
    >
        追加
    </button>
</div>
