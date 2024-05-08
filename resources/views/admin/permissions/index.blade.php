<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-600 overflow-hidden  ">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Id
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
                            <td class="px-6 py-4 text-right text-sm">
                                <button class="m-2 p-2 bg-gray-300 text-gray-700 rounded sm:inline-block sm:mb-0 editPostButton" >Edit</button>
                                <a href="#" class="m-2 p-2 bg-red-800 rounded sm:inline-block">Delete</a>
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
