<div id="delete-modal_{{ $id }}" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
            <h2 class="font-bold">{{ $title }}の削除</h2>

            @if($title == 'ステータス' && $role <= 2)
                <form action="{{ route('admin.status.create') }}" method="POST">
            @elseif($title == 'ステータス' && $role >= 3)
                <form action="{{ route('admin.status.delete-request') }}" method="POST">
            @endif

            @if($title == '社員ステータス' && $role <= 2)
                <form action="{{ route('admin.employee-status.delete') }}" method="POST">
            @elseif($title == '社員ステータス' && $role >= 3)
                        <form action="{{ route('admin.employee-status.delete-request') }}" method="POST">
            @endif

            @if($title == '役職' && $role <= 2)
                <form action="{{ route('admin.managerial-position.delete') }}" method="POST">
            @elseif($title == '役職' && $role >= 3)
                <form action="#" method="POST">
            @endif
            <form action="{{ route('admin.status.delete') }}" method="POST">
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
                <label for="delete-{{ $id }}" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">
                    ステータスを削除する場合は、以下のフィールドに"削除"と入力してください
                </label>
                <input
                    type="text"
                    name="delete"
                    id="delete-{{ $id }}"
                    autocomplete="delete"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    placeholder="削除"
                    required
                >
                <div class="mt-10">
                    <button
                        type="submit"
                        class="block w-full rounded-md bg-red-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    >
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
