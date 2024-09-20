<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Masuk</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Rubik Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="grid h-screen grid-cols-1 p-6 lg:grid-cols-2 font-rubik">
        {{-- Form --}}
        <section class="grid place-items-center ">
            <div class="mx-auto lg:w-3/4 2xl:w-1/2">
                {{-- Brand --}}
                <div class="flex items-center gap-2 mb-5">
                    <img src="{{ asset('img/logo-undip.png') }}" alt="Logo Fakultas Kedokteran" class="w-10" />
                    <h4 class="text-sm text-gray-400">
                        Fakultas Kedokteran <br />
                        Universitas Diponegoro
                    </h4>
                </div>

                {{-- Main section --}}
                <div class="my-20">
                    <div class="text-center">
                        <h1 class="mb-2 text-xl font-semibold text-gray-800">Selamat Datang!</h1>
                        <h3 class="text-gray-500 text-md">
                            Silahkan masuk dengan akun sesuai bagian masing -masing
                        </h3>
                    </div>

                    {{-- Alert aksi start --}}
                    @if ($errors->any())
                        <div class="p-4 mt-6 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">Aksi Gagal!</span>
                            <ul class="mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="" class="mt-8">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Email</label>
                            <input type="email" id="email" name="email" class="form-input-lg" required autofocus
                                placeholder="Masukkan email anda" />
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-800">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" class="form-input-lg " required
                                    placeholder="Masukkan password anda" />
                                <i class="absolute text-gray-500 -translate-y-1/2 fa-solid fa-eye right-4 top-1/2"
                                    onclick="showPass()" id="passIcon"></i>
                            </div>
                        </div>
                        <button type="submit"
                            class="block w-full p-4 mt-8 text-sm font-medium text-center text-white duration-200 rounded-md bg-sky-600 hover:bg-sky-700">Masuk</button>
                    </form>
                </div>

                {{-- Copyright --}}
                <div class="flex items-center justify-between gap-3 text-sm text-gray-400">
                    <a href="">Sistem Informasi KEPK</a>
                    <p>Copyright 2024</p>
                </div>
            </div>
        </section>

        {{-- Hero --}}
        <section class="hidden lg:grid place-items-center">
            <div class="w-full h-full bg-gradient-to-r from-sky-500 to-indigo-500 rounded-xl"></div>
        </section>


    </div>

    {{-- Fontawesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Show/hide password -->
    <script>
        function showPass() {
            var input = document.getElementById('password');
            var icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.style.color = '#0284C7';
            } else {
                input.type = 'password';
                icon.style.color = '#6B7280';
            }
        }
    </script>
</body>

</html>
