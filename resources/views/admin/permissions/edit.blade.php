<x-admin-layout>

    <div class="py-12 w-full">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 rounded-3xl">
            <div class="float-start mt-10 mb-8 mr-2t"> Form</div>
            <div class="float-end mt-10 mb-8 mr-2">
                {{--                @can('add role')--}}
                <a href="{{route('admin.permissions.index')}}" class="m-2 p-4 bg-gray-700 rounded-3xl">Roles index</a>
                {{--                @endcan--}}
            </div>

            <div class="clear-end"></div>
            <form action="{{route('admin.permissions.update',$permission)}}" method="post">
                @csrf
                @method('put')
                <label for="permissionName" class="ml-2"> Permission Name </label>
                <input id="permissionName" type="text"
                       name="permissionName" class="w-full rounded-3xl mb-4 mt-2 text-black "
                       placeholder="permission"
                       value="{{$permission->name}}"
                />
                <x-primary-button class="mb-4 ml-3">Update</x-primary-button>
                @error('permissionName') <span class="text-red-500 text-sm">{{$message}}</span> @enderror

            </form>
            <div class="bg-gray-600 overflow-hidden  ">

            </div>
            <div class="mt-6 p-2">
                <h2 class="txt-2xl font-semibold">Role Permissions</h2>
                <div class="mt-4 p-2">
                    @if($permission->roles)
                        @foreach($permission->roles as $permission_role)
                            {{--                            @foreach($role_permission->name as $name)--}}
                            <div class="flex space-x-2 ">

                                <form method="POST" action="{{ route('admin.permissions.roles.remove', ['permission' => $permission, 'role' =>$permission_role]) }}">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="m-2 p-2 bg-red-800 rounded">{{ $permission_role->name }}</button>
                                </form>
                                {{--                            @endforeach--}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <form action="{{ route('admin.permissions.roles', $permission) }}" method="post">
                    @csrf

                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Permission</label>
                    <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <x-primary-button class="mb-4 ml-3 mt-5">Assign</x-primary-button>

                    @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </form>

            </div>
        </div>


    </div>
</x-admin-layout>
