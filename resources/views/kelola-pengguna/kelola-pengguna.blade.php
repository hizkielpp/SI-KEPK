@extends('template')
@section('title', 'Kelola Pengguna')
@section('content')
    {{-- Breadcumb start --}}
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <i class="me-2.5 text-gray-700 fa-solid fa-user-gear"></i>
                    Kelola Pengguna
                </a>
            </li>
        </ol>
    </nav>
    {{-- Breadcumb end --}}

    {{-- Alert aksi start --}}
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Aksi Berhasil!</span> {{ session('status') }}.
        </div>
    @endif
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Aksi Gagal!</span>
            <p class="mt-2">
                {{ session('error') }}
            </p>
        </div>
    @endif
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Aksi Gagal!</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Alert aksi end --}}

    {{-- Tabel content start --}}
    <div class="bg-white border border-gray-200 rounded-md ">
        <!-- Button registrasi surat masuk -->
        <div class="flex flex-wrap items-center justify-between gap-3 p-5 pb-4 mb-6 border-b border-gray-200">
            <h3 class="font-bold text-gray-700">Daftar Pengguna</h3>
            <a href="{{ route('kelola-pengguna.create') }}" class="btn-blue" type="button">
                <i class="fa-solid fa-plus me-1.5"></i>Tambah
            </a>
        </div>
        {{-- Table wrapper --}}
        <div class="relative px-5 py-2.5">
            <table id="mytable" class="!w-full">
                <thead class="text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col"
                            class="!px-3 !font-semibold !text-left text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            #
                        </th>
                        <th scope="col"
                            class="!px-3 !font-semibold text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            Nama
                        </th>
                        <th scope="col"
                            class="!px-3 !font-semibold text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            Jabatan
                        </th>
                        <th scope="col"
                            class="!px-3 !font-semibold text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            Email
                        </th>
                        <th scope="col"
                            class="!px-3 !font-semibold text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            Bagian
                        </th>
                        <th scope="col"
                            class="!px-3 !font-semibold text-gray-700 bg-slate-50 border-0 !py-6 whitespace-nowrap">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"
                            class="px-3 !py-4 !text-left align-top !font-normal text-slate-900 leading-7 bg-white border-b border-gray-200">
                            1
                        </td>
                        <td scope="row"
                            class="px-3 !py-4 align-top !text-left !font-normal whitespace-nowrap text-slate-900 leading-7 bg-white border-b border-gray-200">
                            Musa Alfian Maulana
                        </td>
                        <td class="px-3 !py-4 align-top text-slate-900 leading-7 bg-white border-b border-gray-200">
                            Tenaga Kependidikan
                        </td>
                        <td class="px-3 !py-4 align-top text-slate-900 leading-7 bg-white border-b border-gray-200">
                            musaalfian@gmail.com
                        </td>
                        <td class="px-3 !py-4 align-top text-slate-900 leading-7 bg-white border-b border-gray-200">
                            IT
                        </td>
                        <td class="px-3 !py-4 align-top text-slate-900 leading-7 bg-white border-b border-gray-200">
                            <div class="flex items-center gap-2">
                                <a href=""
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form method="post">
                                    @csrf
                                    <button type="button" onclick="confirmDelete('ID')"
                                        class="grid w-8 h-8 text-white bg-red-400 rounded-md cursor-pointer place-items-center aspect-square">
                                        <i class="fa-solid fa-trash text-[.75rem]"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- Loader start --}}
            <div role="status"
                class="absolute top-0 left-0 min-h-[8rem] right-0 grid w-full h-full text-center bg-white rounded-md place-items-center"
                id="loader">
                <div class="flex flex-col items-center justify-center gap-3">
                    <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                    <p class="text-sm">Mohon tunggu sebentar ....</p>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // <!-- Initializing data tables start -->
            var table = $("#mytable").DataTable({
                responsive: true,
                pageLength: 10,
                dom: '<"flex justify-between items-center flex-wrap gap-3 mb-6"Bf>rt<"flex justify-between mt-6 flex-wrap gap-4"<"flex items-center gap-4 flex-wrap gap-2"li>p>',
                destroy: true,
                ordering: false,
                language: {
                    lengthMenu: "Tampilkan _MENU_",
                    zeroRecords: "Surat masuk tidak tersedia. <br>Silahkan registrasi surat terlebih dahulu.",
                    info: "Menampilkan _PAGE_ dari _PAGES_",
                    infoEmpty: "Baris tidak tersedia",
                    infoFiltered: "",
                    search: "Cari :",
                },
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-fa"><i class="fa-solid fa-angle-right"></i></span>',
                        sPrevious: '<span class="pagination-fa"><i class="fa-solid fa-angle-left"></i></span>',
                    },
                },
                lengthMenu: [
                    [10, 20, 9999999999],
                    [10, 20, "All"],
                ],
                initComplete: function(settings, json) {
                    $('#loader').hide();
                },
            });

            // Styling datatables
            $('.dt-search input').addClass(
                '!pt-2 !ms-3 !text-sm !text-gray-900 !border !border-gray-300 !rounded-md !w-52 !bg-gray-50 !focus:ring-blue-500 !focus:border-blue-500'
            );
            $('.dt-length select').addClass(
                '!pt-2 ms-3 !text-sm !text-gray-900 !ms-2 !w-14 !border !border-gray-300 !rounded-md !bg-gray-50 !focus:ring-blue-500 !focus:border-blue-500'
            );
            $('.dt-length label, .dt-info').addClass('!text-gray-500 !text-sm')
            $('.dt-paging-button .current').addClass('!text-white !rounded-full')

            // Styling empty tables
            $('td.dataTables_empty').addClass('text-center py-3')
        })

        // Sweetalert confirm delete
        function confirmDelete(id) {
            let urlDelete = "";
            urlDelete = urlDelete.replace(':id', id);

            new Audio("{{ asset('audio/warning-edited.mp3') }}").play();
            Swal.fire({
                title: "Konfirmasi",
                text: "Yakin ingin menghapus data? Data yang terhapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2F5596",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = $('form').attr('action', urlDelete)
                    form.submit();
                } else {
                    new Audio("{{ asset('audio/cancel-edited.mp3') }}").play();
                }
            });
        }
    </script>
@endsection
