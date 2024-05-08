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
            <form action="{{route('admin.roles.store')}}" method="post">
                @csrf
                <label for="RoleName" class="ml-2"> Role Name </label>
                <input id="RoleName" type="text" name="roleName" class="w-full rounded-3xl mb-4 mt-2 text-black " placeholder="role"/>
            <x-primary-button class="mb-4 ml-3" >Create</x-primary-button>
                @error('roleName') <span class="text-red-500 text-sm">{{$message}}</span> @enderror

            </form>
            <div class="bg-gray-600 overflow-hidden  ">

            </div>
        </div>
    </div>
</x-admin-layout>
