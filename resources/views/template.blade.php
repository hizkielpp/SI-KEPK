<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <title>@yield('title') | KEPK</title>

    {{-- Tailwind CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Rubik Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <!-- Datepicker Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    {{-- Datatables --}}
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/b-3.0.2/fc-5.0.1/r-3.0.2/datatables.min.css" rel="stylesheet">

    @yield('css')
</head>

<body class="font-rubik">
    <div class="antialiased dark:bg-gray-900">
        {{-- Navbar --}}
        <nav id="navbar"
            class="fixed top-0 left-0 right-0 z-50 px-4 duration-300 bg-white border-b border-gray-200 md:ml-64 py-7">
            <div class="flex flex-wrap items-center justify-between">
                <div class="w-4 cursor-pointer" id="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 -translate-x-full border-r border-gray-200 md:translate-x-0"
            aria-label="Sidenav" id="drawer-navigation">
            <div class="h-full px-4 py-5 bg-white dark:bg-gray-800">
                {{-- Brand --}}
                <a href="" class="flex items-center gap-3">
                    <div class="grid w-8 h-8 font-bold text-white rounded-full bg-sky-700 place-items-center">
                        S
                    </div>
                    <p id="brand" class="block text-sm font-bold text-gray-700">
                        SIKEPK <br>
                        <span class="font-normal">Sistem Informasi KEPK</span>
                    </p>
                </a>
                {{-- Menu wrapper --}}
                <div class='flex flex-col h-[calc(100vh-62px)] justify-between'>
                    {{-- Menu --}}
                    <ul class="pt-10 space-y-2 overflow-y-auto custom-scrollbar">
                        {{-- Dashboard --}}
                        <p class="p-2 text-sm text-gray-500">MENU</p>
                        <li>
                            <a href="{{ route('dashboard.index') }}"
                                class="flex items-center p-3 text-sm font-medium hover:text-gray-900 rounded-md dark:text-white hover:bg-gray-100 duration-200 dark:hover:bg-gray-700 group {{ in_array(Route::currentRouteName(), ['dashboard.index']) ? 'bg-sky-600 hover:bg-sky-700' : '' }}">
                                <i
                                    class="fa-solid fa-home text-gray-500 {{ in_array(Route::currentRouteName(), ['dashboard.index']) ? 'text-white' : '' }}"></i>
                                <span
                                    class="ml-3 text-gray-500 {{ in_array(Route::currentRouteName(), ['dashboard.index']) ? 'text-white' : '' }} font-normal">Dashboard</span>
                            </a>
                        </li>
                        {{-- Surat masuk --}}
                        <li>
                            <button type="button"
                                class="flex items-center p-3 w-full text-sm font-medium text-gray-500 rounded-md transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ in_array(Route::currentRouteName(), ['surat-masuk.index']) ? 'bg-sky-600 text-white' : '' }}"
                                aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                                <i
                                    class="text-gray-500 fa-solid fa-envelope {{ in_array(Route::currentRouteName(), ['surat-masuk.index']) ? 'text-white' : '' }}"></i>
                                <span
                                    class="flex-1 ml-3 text-sm text-left whitespace-nowrap {{ in_array(Route::currentRouteName(), ['surat-masuk.index']) ? 'text-white' : '' }} group-hover:text-gray-900 font-normal">Surat
                                    Masuk</span>
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                            <ul id="dropdown-pages"
                                class="py-2 space-y-2 {{ in_array(Route::currentRouteName(), ['surat-masuk.index']) ? 'block' : 'hidden' }}">
                                <li>
                                    <span>
                                        <a href="{{ route('surat-masuk.index') }}"
                                            class="flex items-center p-3 pl-9 w-full text-sm font-normal text-gray-500 hover:text-gray-900 rounded-md transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ in_array(Route::currentRouteName(), ['surat-masuk.index']) ? 'border border-gray-300' : '' }}">Surat
                                            Masuk</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href=""
                                            class="flex items-center w-full p-3 text-sm font-normal transition duration-75 rounded-md pl-9 text-gray-500 hover:text-gray-900 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ in_array(Route::currentRouteName(), []) ? 'border border-gray-300' : '' }}">Disposisi</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href=""
                                            class="flex items-center w-full p-3 text-sm font-normal transition duration-75 rounded-md pl-9 text-gray-500 hover:text-gray-900 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ in_array(Route::currentRouteName(), []) ? 'border border-gray-300' : '' }}">Tembusan</a>
                                    </span>
                                </li>
                            </ul>
                        </li>

                        {{-- Kelola pengguna --}}
                        <p class="p-2 pt-6 text-sm text-gray-500">LAINNYA</p>
                        <li>
                            <a href="{{ route('kelola-pengguna.index') }}"
                                class="flex items-center p-3 text-sm font-medium  hover:text-gray-900 rounded-md dark:text-white hover:bg-gray-100 duration-200 dark:hover:bg-gray-700 group {{ in_array(Route::currentRouteName(), ['kelola-pengguna.index', 'kelola-pengguna.create']) ? 'bg-sky-600 hover:bg-sky-700' : '' }}">
                                <i
                                    class="fa-solid fa-user-gear text-gray-500 {{ in_array(Route::currentRouteName(), ['kelola-pengguna.index', 'kelola-pengguna.create']) ? 'text-white' : '' }}"></i>
                                <span
                                    class="ml-3 text-gray-500 {{ in_array(Route::currentRouteName(), ['kelola-pengguna.index', 'kelola-pengguna.create']) ? 'text-white' : '' }} font-normal">Kelola
                                    Pengguna</span>
                            </a>
                        </li>
                    </ul>
                    {{-- User --}}
                    <ul>
                        <li
                            class='flex items-center justify-between p-3 mb-6 duration-300 border border-gray-100 rounded-md bg-gray-50'>
                            <div class='flex items-center gap-3'>
                                <div class='relative'>
                                    <div
                                        class="grid w-8 h-8 font-bold text-white rounded-full bg-sky-600 place-items-center ">
                                        H
                                    </div>
                                </div>
                                <div class="">
                                    <p class="text-sm font-semibold text-gray-600">Hizkiel</p>
                                    <p class="text-sm text-gray-400">Administator</p>
                                </div>
                            </div>
                            <a href="/">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="h-auto p-4 pt-24 duration-300 bg-slate-50 md:ml-64 min-h-[100vh]" id="main">
            @yield('content')
            <footer class="sticky w-full pt-3 mt-12 border-t border-gray-200 top-full">
                <div class="flex flex-wrap justify-center gap-2 text-sm text-gray-500 sm:justify-between">
                    <p class="text-center">Copyright 2024. Fakultas Kedokteran Universitas Diponegoro.</p>
                    <p class="font-bold">Version 1.0</p>
                </div>
            </footer>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Sweet alert start --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datepicker Jquery -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    {{-- MomentJS --}}
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/moment-locale.min.js') }}"></script>

    {{-- PDF Object --}}
    <script src="{{ asset('js/pdfobject.min.js') }}"></script>

    {{-- Fontawesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/b-3.0.2/fc-5.0.1/r-3.0.2/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Sidebar handler
            $('#hamburger').click(function(e) {
                if (window.matchMedia("(min-width: 768px)").matches) {
                    $('#drawer-navigation').toggleClass('md:translate-x-0');
                } else {
                    $('#drawer-navigation').toggleClass('-translate-x-full');
                }
                $('#navbar').toggleClass('md:ml-64');
                $('#main').toggleClass('md:ml-64');
            });
        })
    </script>
    @yield('js')
</body>

</html>
