<x-admin-layout>

    <div class="py-12 w-full">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 rounded-3xl">
            <div class="float-start mt-10 mb-8 mr-2t"> Form</div>
            <div class="float-end mt-10 mb-8 mr-2">
                {{--                @can('add role')--}}
                <a href="{{route('admin.roles.index')}}" class="m-2 p-4 bg-gray-700 rounded-3xl">Roles index</a>
                {{--                @endcan--}}
            </div>

            <div class="clear-end"></div>
            <form action="{{route('admin.roles.update',$role)}}" method="post">
                @csrf
                @method('put')
                <label for="RoleName" class="ml-2"> Role Name </label>
                <input id="RoleName" type="text"
                       name="roleName" class="w-full rounded-3xl mb-4 mt-2 text-black "
                       placeholder="role"
                       value="{{$role->name}}"
                />
                <x-primary-button class="mb-4 ml-3">Update</x-primary-button>
                @error('roleName') <span class="text-red-500 text-sm">{{$message}}</span> @enderror

            </form>
            <div class="bg-gray-600 overflow-hidden  ">
            </div>
            <div class="mt-6 p-2">
                <h2 class="txt-2xl font-semibold">Role Permissions</h2>
                <div class="mt-4 p-2">
                    @if($role->permissions)
                        @foreach($role->permissions as $role_permission)
{{--                            @foreach($role_permission->name as $name)--}}
                        <div class="flex space-x-2 ">

                            <form method="POST" action="{{ route('admin.roles.permissions.revoke', ['role' => $role, 'permission' => $role_permission]) }}">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-2 p-2 bg-red-800 rounded">{{ $role_permission->name }}</button>
                            </form>
                            {{--                            @endforeach--}}
                        </div>
                        @endforeach
                    @endif
                </div>
                <form action="{{ route('admin.roles.permissions', $role) }}" method="post">
                    @csrf

                    <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Permission</label>
                    <select id="permission" name="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>

                    <x-primary-button class="mb-4 ml-3 mt-5">Assign</x-primary-button>

                    @error('permission')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
