<x-admin-layout>
    @if(session('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">
                    Success alert!
                </span>
            {{ session('message') }}
        </div>
    @endif
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="float-end mt-10 mb-8 mr-2">
                {{--                @can('add role')--}}
                <a  href="{{route('admin.permissions.create')}}"  class="m-2 p-4 bg-gray-700 rounded-3xl">Create Permission</a>
                {{--                @endcan--}}
            </div>
            <div class="clear-end"></div>
            <div class="bg-gray-600 overflow-hidden  ">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Name
                        </th>
                        {{--                        <th scope="col" class="relative left-2px-1 py-3">Edit</th>--}}
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                    <tr></tr>
                    @foreach($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$permission->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm inline-flex float-end">
                                <a href="{{route('admin.permissions.edit',$permission)}}" class="m-2 p-2 bg-gray-300 text-gray-700 rounded   editPostButton" >Edit</a>
                                <form method="POST"  action="{{route('admin.permissions.destroy',$permission)}}">
                                    @csrf @method('delete')
                                <button  class="m-2 p-2 bg-red-800 rounded sm:inline-block">Delete</button> </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More items... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-admin-layout>
