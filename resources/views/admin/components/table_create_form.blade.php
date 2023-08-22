<div id="add-status" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">

            @if($title == 'ステータス' && $role <= 2)
                <form action="{{ route('admin.status.create') }}" method="POST">
            @elseif($title == 'ステータス' && $role >= 3)
                <form action="{{ route('admin.status.request') }}" method="POST">
            @endif

            @if($title == '社員ステータス' && $role <= 2)
                <form action="{{ route('admin.employee-status.create') }}" method="POST">
            @elseif($title == '社員ステータス' && $role >= 3)
                <form action="#" method="POST">
            @endif

            @if($title == '役職' && $role <= 2)
                <form action="{{ route('admin.managerial-position.create') }}" method="POST">
            @elseif($title == '役職' && $role >= 3)
                <form action="#" method="POST">
            @endif

                @csrf
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
                    @if($role <= 2)
                        <button type="submit"
                                class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                        >
                            追加
                        </button>
                    @elseif($role >= 3)
                        <button type="submit"
                                class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                        >
                            追加申請
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
