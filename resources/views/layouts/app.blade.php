<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
<div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
         x-data="{ open: false }">
        <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
            <a href="#"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">{{Auth::user()->name}}</a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
            {{--                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('admin.roles.index')}}">Roles</a>--}}
            @role('admin')
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.roles.index') ? ' bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent ' }} rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="{{ route('admin.roles.index') }}">Roles</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.permissions.index') ? ' bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent ' }} rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="{{route('admin.permissions.index')}}">Permissions</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.users.index') ? ' bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent ' }} rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="{{route('admin.users.index')}}">Users</a>
            @endrole
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('dashboard') ? ' bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent ' }} rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="{{route('dashboard')}}">Posts Dashboard</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('about') ? ' bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent ' }} rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="{{route('about')}}">Click Here</a>

{{--            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--               href="{{route('admin.permissions.index')}}">Permissions</a>--}}


            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Dropdown</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #1</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #3</a>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
        </nav>
    </div>
    <div class="w-full">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{--                @include('layouts.navigation')--}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
                </main>
            </div>
        </div>
    </div>
{{--    <!-- Toggle Button -->--}}
{{--    <div class="fixed bottom-4 right-4 z-10">--}}
{{--        <button id="theme-toggle" class="rounded-full w-12 h-12 flex items-center justify-center bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-300 focus:outline-none">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--    </div>--}}

    <script>
        const themeToggle = document.getElementById('theme-toggle');

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
        });
    </script>

    </body>
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @if (isset($header))--}}
{{--                <header class="bg-white dark:bg-gray-800 shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
</html>
