<div id="update-modal_{{ $id }}" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
            <h2 class="font-bold">{{ $title }}の更新</h2>

            @if($title == 'ステータス' && $role <= 2)
                <form action="{{ route('admin.status.update') }}" method="POST">
            @elseif($title == 'ステータス' && $role >= 3)
                <form action="{{ route('admin.status.update-request') }}" method="POST">
            @endif

            @if($title == '社員ステータス' && $role <= 2)
                <form action="{{ route('admin.employee-status.update') }}" method="POST">
            @elseif($title == '社員ステータス' && $role >= 3)
                <form action="{{ route('admin.employee-status.update-request') }}" method="POST">
            @endif

            @if($title == '役職' && $role <= 2)
                <form action="{{ route('admin.managerial-position.update') }}" method="POST">
            @elseif($title == '役職' && $role >= 3)
                <form action="{{ route('admin.managerial-position.update-request') }}" method="POST">
            @endif

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
                <label for="name-{{ $id }}" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">{{ $title }}</label>
                <input
                    type="text"
                    name="name"
                    id="name-{{ $id }}"
                    autocomplete="name"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    value="{{ $name }}"
                    required
                >
                <div class="mt-10">
                    @if($role <= 2)
                        <button type="submit"
                                class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                        >
                            更新
                        </button>
                    @elseif($role >= 3)
                        <button type="submit"
                                class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                        >
                            更新申請
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
