@extends('template')
@section('title', 'Dashboard')
@section('content')
    {{-- Breadcumb start --}}
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Overview
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
