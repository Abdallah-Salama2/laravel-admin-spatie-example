<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(session('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">
                    Success alert!
                </span>
            {{ session('message') }}
        </div>
    @endif

    <div class="">
        <div class="float-end mt-10 mb-8 mr-2">
            @can('write post')
                <button id="createPostButton" class="m-2 p-4 bg-gray-700 rounded-3xl">Create Post</button>
            @endcan
        </div>
        <div class="clear-end"></div>
        <div class="">

            <div class="py-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
                            <th scope="col" class="relative px-6 py-3">Edit</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                        <tr></tr>
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{$post->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}</td>
                                <td class="px-6 py-4 text-right text-sm">
                                    @can('edit post')
                                        <button class="m-2 p-2 bg-gray-300 text-gray-700 rounded sm:inline-block sm:mb-0 editPostButton" data-post-id="{{$post->id}}" data-post-title="{{$post->title}}">Edit</button>
                                        <a href="{{route('posts.delete', $post)}}" class="m-2 p-2 bg-red-800 rounded sm:inline-block">Delete</a>
                                    @endcan
                                    @can('publish post')
                                        <a href="#" class="m-2 p-2 bg-blue-950 rounded sm:inline-block">Publish</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                    <div class="m-2 p-2">Pagination</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden"></div>

    <!-- Modal for Create/Edit Post -->
    <div id="createPostModal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-lg shadow-lg z-50 hidden">
        <!-- Your form content goes here -->
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Post Title</label>
            <input id="title" name="title" type="text" autocomplete="title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="flex items-center gap-4 p-10">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>

        <button id="closeModal" class="absolute top-0 right-0 m-4 text-gray-600 hover:text-gray-800 closeModal">&times;</button>
    </div>

    <div id="editPostModal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-lg shadow-lg z-50 hidden">
        <form id="editPostForm" method="post">
            @csrf
            @method('PUT')
            <label for="edit_title" class="block text-sm font-medium leading-6 text-gray-900">Edit Post Title</label>
            <input id="edit_title" name="title" type="text" autocomplete="title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="flex items-center gap-4 p-10">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Save</button>
            </div>
        </form>
        <button id="closeEditModal" class="absolute top-0 right-0 m-4 text-gray-600 hover:text-gray-800 closeModal">&times;</button>
    </div>


    <!-- JavaScript to handle modal toggle -->
    <script>
        const createPostButton = document.getElementById('createPostButton');
        const overlay = document.getElementById('overlay');
        const createPostModal = document.getElementById('createPostModal');

        const closeModalButtons = document.querySelectorAll('.closeModal');

        createPostButton.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            createPostModal.classList.remove('hidden');
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                overlay.classList.add('hidden');
                createPostModal.classList.add('hidden');
                editPostModal.classList.add('hidden');
            });
        });


        const editPostModal = document.getElementById('editPostModal');
        const closeEditModalButton = document.getElementById('closeEditModal');
        const editPostForm = document.getElementById('editPostForm');

        const editButtons = document.querySelectorAll('.editPostButton');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const postId = button.dataset.postId;
                const postTitle = button.dataset.postTitle;
                // Fill the form fields with the existing post data
                document.getElementById('edit_title').value = postTitle;
                // Update the form action to include the post ID
                editPostForm.action = `/posts/${postId}`;
                overlay.classList.remove('hidden');
                editPostModal.classList.remove('hidden');
            });
        });

        closeEditModalButton.addEventListener('click', () => {
            overlay.classList.add('hidden');
            editPostModal.classList.add('hidden');
        });

    </script>

</x-app-layout>
