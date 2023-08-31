<div id="update-modal_{{ $id }}" class="hidden target:block">
    <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
        <a href="" class="block w-full h-full cursor-default"></a>
        <div class="w-2/5 mx-auto mt-20 relative -top-full bg-white p-5 rounded-lg">
            <h2 class="font-bold">ユーザー権限の更新</h2>
            <form action="{{ route('admin.employee-status.update-request') }}" method="POST">
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
                <label for="name-{{ $id }}" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">役職</label>
                <select
                    name="role_id"
                    id="role_id-{{ $id }}"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                >
                    @foreach($admin_roles as $admin_role)
                        @if($role == $admin_role->id)
                            <option value="{{ $admin_role->id }}" selected>{{ $admin_role->name }}</option>
                        @else
                            <option value="{{ $admin_role->id }}">{{ $admin_role->name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="mt-10">
                    <button type="submit"
                            class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    >
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
