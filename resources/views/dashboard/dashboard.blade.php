@extends('template')
@section('title', 'Dashboard')
@section('content')
    {{-- Breadcumb start --}}
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <i class="me-2.5 text-gray-700 fa-solid fa-home"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </nav>

    {{-- Overview card --}}
    <div class="mb-5">
        <div class="flex flex-wrap gap-1 align-start">
            <h3 class="font-bold text-gray-700 me-2">
                Selamat datang, Hizkiel!
            </h3>
            <img src="{{ asset('img/hand-icon.png') }}" width="24px" alt="Hand Icon" />
        </div>
        <h5 class="mt-1 text-gray-500">
            Silahkan kelola surat sesuai kebutuhan anda.
        </h5>
    </div>
@endsection
@section('js')
    {{-- ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
