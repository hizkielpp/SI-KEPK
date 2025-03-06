@extends('template')
@section('title', 'Kelola Pengguna')
@section('content')
    {{-- Breadcumb start --}}
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('user.index') }}"
                    class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <i class="me-2.5 text-gray-700 fa-solid fa-user-gear"></i>
                    Kelola Pengguna
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-sm text-gray-400 ms-1 md:ms-2 dark:text-gray-400">Tambah Data Pengguna</span>
                </div>
            </li>
        </ol>
    </nav>

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

    {{-- Tabel content start --}}
    <div class="bg-white border border-gray-200 rounded-md ">
        <!-- Button registrasi surat masuk -->
        <div class="flex flex-wrap items-center justify-between gap-3 p-5 pb-4 border-b border-gray-200">
            <h3 class="font-bold text-gray-700">Form Ajukan Ethical Clearance</h3>
        </div>
        {{-- Table wrapper --}}
        <div class="relative pt-6">
            <div class="grid grid-cols-1 gap-4 px-5 mb-4">
                <p class="text-lg font-bold text-gray-700 text-center">Protokol Etik Penelitian Kesehatan
                    Yang Mengikutsertakan Manusia Sebagai Subyek
                </p>
                <p class="text-sm font-bold text-gray-700">
                    Isilah form dibawah dengan uraian singkat dan berikan
                    tanda contreng (X/V) pada kotak atau lingkari pada salah satu pilihan jawaban yang menggambarkan
                    penelitian.<br>
                    P: Nomor Urutan Protokol CIOMS 2016 - Lampiran 1;<br>
                    S: Standar Kelaikan Etik (WHO-2011 dan Pedoman KEPPKN 2017);<br>
                    C: Check List/Daftar Tilik<br>
                    G: Guideline CIOMS 2016<br>
                    IC: CIOMS 2016 - Lampiran 2
                </p>
            </div>
            <form action="{{ route('proposal.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4 px-5">
                    {{-- Detail form template --}}
                    <div class="mb-2">
                        A. Judul Penelitian (p-protokol no 1)*
                        <input type="text" id="text" name="detail_form[0][value]" class="form-input" required
                            autofocus placeholder="Judul penelitian" />
                        <label for="lokasi_penelitian" class="text-sm font-medium text-gray-900 dark:text-white ">
                            1. Lokasi Penelitian :</label>
                        <input id="lokasi_penelitian" name="detail_form[0][input][]" class="form-input ">
                        <label for="lokasi_penelitian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            2. Waktu Penelitian direncanakan (mulai - selesai): </label>
                        <input id="lokasi_penelitian" name="detail_form[0][input][]" class="form-input">
                        <label for="lokasi_penelitian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            3. Apakah penelitian ini multi-senter </label>
                        <input id="lokasi_penelitian" name="detail_form[0][input][]" class="form-input">
                    </div>
                    {{-- Detail form template --}}
                    <div class="mb-2">
                        <div>
                            A. Judul Penelitian (p-protokol no 1)*
                            <input type="text" id="text" name="detail_form[1][value]" class="form-input" required
                                autofocus placeholder="Judul penelitian" />
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian" class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Lokasi Penelitian :</label>
                            <input id="lokasi_penelitian" name="detail_form[1][input][]" class="form-input ">
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                2. Waktu Penelitian direncanakan (mulai - selesai): </label>
                            <input id="lokasi_penelitian" name="detail_form[1][input][]" class="form-input">
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                3. Apakah penelitian ini multi-senter </label>
                            <input id="lokasi_penelitian" name="detail_form[1][input][]" class="form-input">
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                4. Jika Multi senter apakah sudah mendapatkan persetujuan etik dari senter/institusi yang
                                lain (lampirkan jika sudah) </label>
                            <input id="lokasi_penelitian" name="detail_form[1][input][]" class="form-input">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div>
                            A. Judul Penelitian (p-protokol no 1)*
                            <input type="text" id="text" name="detail_form[2][value]" class="form-input" required
                                autofocus placeholder="Judul penelitian" />
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian" class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Lokasi Penelitian :</label>
                            <input id="lokasi_penelitian" name="detail_form[2][input][]" class="form-input ">
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                2. Waktu Penelitian direncanakan (mulai - selesai): </label>
                            <input id="lokasi_penelitian" name="detail_form[2][input][]" class="form-input">
                        </div>
                        <div class="flex">
                            <label for="lokasi_penelitian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                3. Apakah penelitian ini multi-senter </label>
                            <input id="lokasi_penelitian" name="detail_form[2][input][]" class="form-input">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-2 p-5 mt-6 border-t border-gray-200">
                    <a href="{{ route('proposal.index') }}" class="btn-white">Batal</a>
                    <button
                        class="block px-5 py-3 text-sm text-center text-white duration-200 rounded-md w-fit bg-sky-600 hover:bg-sky-700"
                        type="submit">
                        Tambah
                    </button>
                </div>
            </form>
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
