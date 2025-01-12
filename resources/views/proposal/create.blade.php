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
                    {{-- 1 --}}
                    <div class="mb-2">
                        <div>
                            A. Judul Penelitian (p-protokol no 1)*
                            <input type="text" id="text" name="detail_form[0][value]" class="form-input" required
                                autofocus placeholder="Judul penelitian" />
                            <input type="hidden" name="detail_form[0][name_df]"
                                value="A. Judul Penelitian (p-protokol no 1)*">

                            <label for="lokasi_penelitian" class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Lokasi Penelitian :</label>
                            <input type="hidden" name="detail_form[0][type][]" value="text">
                            <input type="hidden" name="detail_form[0][name][]" value="1. Lokasi Penelitian :">
                            <input id="lokasi_penelitian" placeholder="Lokasi penelitian" name="detail_form[0][input][]"
                                class="form-input mb-2">
                            <label for="waktu_penelitian" class="block text-sm font-medium text-gray-900 dark:text-white">
                                2. Waktu Penelitian direncanakan (mulai - selesai): </label>
                            <input type="hidden" name="detail_form[0][type][]" value="text">
                            <input type="hidden" name="detail_form[0][name][]"
                                value="2. Waktu Penelitian direncanakan (mulai - selesai):">
                            <input id="waktu_penelitian" placeholder="Waktu penelitian" name="detail_form[0][input][]"
                                class="form-input mb-2">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">
                                3. Apakah penelitian ini multi-senter </label>
                            <input type="hidden" name="detail_form[0][type][multi_senter]" value="radio">
                            <input type="hidden" name="detail_form[0][name][multi_senter]"
                                value="3. Apakah penelitian ini multi-senter">
                            <div class="flex items-center mb-2">
                                <input id="default-radio-1" type="radio" value="1"
                                    name="detail_form[0][input][multi_senter]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input checked id="default-radio-2" type="radio" value="0"
                                    name="detail_form[0][input][multi_senter]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                4. Jika Multi senter apakah sudah mendapatkan persetujuan etik dari senter/institusi yang
                                lain (lampirkan jika sudah) </label>
                            <input type="hidden" name="detail_form[0][type][sudah_izin]" value="radio">
                            <input type="hidden" name="detail_form[0][name][sudah_izin]"
                                value="4. Jika Multi senter apakah sudah mendapatkan persetujuan etik dari senter/institusi yang lain (lampirkan jika sudah)">
                            <div class="flex items-center ">
                                <input id="default-radio-1" type="radio" value="1"
                                    name="detail_form[0][input][sudah_izin]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center">
                                <input checked id="default-radio-2" type="radio" value="0"
                                    name="detail_form[0][input][sudah_izin]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>

                        </div>
                    </div>
                    {{-- 2 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                b. Identifikasi (p10) <br>
                                1. Peneliti <br>
                                (Mohon CV Peneliti Utama dilampirkan)
                            </p>
                            <input type="hidden" name="detail_form[1][name_df]"
                                value="b. Identifikasi (p10) <br>
                                1. Peneliti <br>
                                (Mohon CV Peneliti Utama dilampirkan)">
                            <label for="peneliti_utama" class="text-sm font-medium text-gray-900 dark:text-white ">
                                Peneliti Utama (PI) </label>
                            <input type="hidden" name="detail_form[1][type][]" value="text">
                            <input type="hidden" name="detail_form[1][name][]" value="Peneliti Utama (PI)">
                            <input id="peneliti_utama" placeholder="Lokasi penelitian" name="detail_form[1][input][]"
                                class="form-input mb-2">
                            <label for="peneliti_utama" class="text-sm font-medium text-gray-900 dark:text-white ">
                                Institusi </label>
                            <input type="hidden" name="detail_form[1][type][]" value="text">
                            <input type="hidden" name="detail_form[1][name][]" value="Institusi">
                            <input id="waktu_penelitian" placeholder="Waktu penelitian" name="detail_form[1][input][]"
                                class="form-input mb-2">

                        </div>
                    </div>
                    {{-- 3 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                B. Ringkasan usulan penelitian(p-protokol no 2)
                            </p>
                            <input type="hidden" name="detail_form[2][name_df]"
                                value="B. Ringkasan usulan penelitian(p-protokol no 2)">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Ringkasan dalam 200-300 kata, (ditulis dalam bahasa yang mudah difahami oleh “awam” bukan
                                dokter/profesi)</label>
                            <input type="hidden" name="detail_form[2][type][]" value="textarea">
                            <input type="hidden" name="detail_form[2][name][]"
                                value="1. Ringkasan dalam 200-300 kata, (ditulis dalam bahasa yang mudah difahami oleh “awam” bukan dokter/profesi)">
                            <textarea id="message" rows="4" name="detail_form[2][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Justifikasi penelitian (p3).Tuliskan mengapa penelitian ini harus dilakukan, manfaat nya
                                untuk penduduk diwilayah penelitian ini dilakukan (Negara, wilayah, lokal)- Standar 2/A
                                (Adil)
                            </label>
                            <input type="hidden" name="detail_form[2][type][]" value="textarea">
                            <input type="hidden" name="detail_form[2][name][]"
                                value="2. Justifikasi penelitian (p3).Tuliskan mengapa penelitian ini harus dilakukan, manfaat nya untuk penduduk diwilayah penelitian ini dilakukan (Negara, wilayah, lokal)- Standar 2/A (Adil)">
                            <textarea id="message" rows="4" name="detail_form[2][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>

                        </div>
                    </div>
                    {{-- 4 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                C. Isyu Etik yang mungkin dihadapi
                            </p>
                            <input type="hidden" name="detail_form[3][name_df]"
                                value="C. Isyu Etik yang mungkin dihadapi">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Pendapat peneliti tentang isyu etik yang mungkin dihadapi dalam penelitian ini, dan
                                bagaimana cara menanganinya (p4)- sesuaikan dengan 7 butir standar kelaikan etik (S) dan G
                                berapa</label>
                            <input type="hidden" name="detail_form[3][type][]" value="textarea">
                            <input type="hidden" name="detail_form[3][name][]"
                                value="1. Pendapat peneliti tentang isyu etik yang mungkin dihadapi dalam penelitian ini, dan bagaimana cara menanganinya (p4)- sesuaikan dengan 7 butir standar kelaikan etik (S) dan G berapa">
                            <textarea id="message" rows="4" name="detail_form[3][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 5 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                D. Ringkasan Daftar Pustaka
                            </p>
                            <input type="hidden" name="detail_form[4][name_df]" value="D. Ringkasan Daftar Pustaka">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Ringkasan hasil hasil studi sebelumnya sesuai topik penelitian, termasuk yang belum
                                dipublikasi yang diketahui para peneliti dan sponsor, dan informasi penelitian yang sudah
                                dipublikasi, termasuk jika ada kajian-kajian pada hewan. Maksimum 1 hal (p5)- G 4</label>
                            <input type="hidden" name="detail_form[4][type][]" value="textarea">
                            <input type="hidden" name="detail_form[4][name][]"
                                value="1. Ringkasan hasil hasil studi sebelumnya sesuai topik penelitian, termasuk yang belum dipublikasi yang diketahui para peneliti dan sponsor, dan informasi penelitian yang sudah dipublikasi, termasuk jika ada kajian-kajian pada hewan. Maksimum 1 hal (p5)- G 4">
                            <textarea id="message" rows="4" name="detail_form[4][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 6 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                E. Kondisi Lapangan
                            </p>
                            <input type="hidden" name="detail_form[5][name_df]" value="E. Kondisi Lapangan">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Gambaran singkat tentang lokasi penelitian(p8) lihat G-2</label>
                            <input type="hidden" name="detail_form[5][type][]" value="textarea">
                            <input type="hidden" name="detail_form[5][name][]"
                                value="1. Gambaran singkat tentang lokasi penelitian(p8) lihat G-2">
                            <textarea id="message" rows="4" name="detail_form[5][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Informasi ketersediaan fasilitas yang layak untuk keamanan dan ketepatan
                                penelitian</label>
                            <input type="hidden" name="detail_form[5][type][]" value="textarea">
                            <input type="hidden" name="detail_form[5][name][]"
                                value="2. Informasi ketersediaan fasilitas yang layak untuk keamanan dan ketepatan penelitian">
                            <textarea id="message" rows="4" name="detail_form[5][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Informasi demografis / epidemiologis yang relevan tentang daerah penelitian</label>
                            <input type="hidden" name="detail_form[5][type][]" value="textarea">
                            <input type="hidden" name="detail_form[5][name][]"
                                value="3. Informasi demografis / epidemiologis yang relevan tentang daerah penelitian">
                            <textarea id="message" rows="4" name="detail_form[5][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 7 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                F. Disain Penelitian
                            </p>
                            <input type="hidden" name="detail_form[6][name_df]" value="F. Disain Penelitian">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Tujuan penelitian, hipotesa, pertanyaan penelitian, asumsi dan variabel penelitian
                                (p11)</label>
                            <input type="hidden" name="detail_form[6][type][]" value="textarea">
                            <input type="hidden" name="detail_form[6][name][]"
                                value="1. Tujuan penelitian, hipotesa, pertanyaan penelitian, asumsi dan variabel penelitian (p11)">
                            <textarea id="message" rows="4" name="detail_form[6][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Deskripsi detil tentang desain penelitian. (p12)</label>
                            <input type="hidden" name="detail_form[6][type][]" value="textarea">
                            <input type="hidden" name="detail_form[6][name][]"
                                value="2. Deskripsi detil tentang desain penelitian. (p12)">
                            <textarea id="message" rows="4" name="detail_form[6][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Bila uji coba klinis, deskripsi harus meliputi apakah kelompok treatment ditentukan
                                secara random, (termasuk bagaimana metodenya), dan apakah blinded atau terbuka. (Bila bukan
                                uji coba klinis cukup tulis: tidak relevan) (p12)</label>
                            <input type="hidden" name="detail_form[6][type][]" value="textarea">
                            <input type="hidden" name="detail_form[6][name][]"
                                value="3. Bila uji coba klinis, deskripsi harus meliputi apakah kelompok treatment ditentukan secara random, (termasuk bagaimana metodenya), dan apakah blinded atau terbuka. (Bila bukan uji coba klinis cukup tulis: tidak relevan) (p12)">
                            <textarea id="message" rows="4" name="detail_form[6][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 8 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                G. Sampling
                            </p>
                            <input type="hidden" name="detail_form[7][name_df]" value="G. Sampling">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Jumlah subyek yang dibutuhkan sesuai tujuan penelitian dan bagaimana penentuannya secara
                                statistik (p13)</label>
                            <input type="hidden" name="detail_form[7][type][]" value="textarea">
                            <input type="hidden" name="detail_form[7][name][]"
                                value="1. Jumlah subyek yang dibutuhkan sesuai tujuan penelitian dan bagaimana penentuannya secara statistik (p13)">
                            <textarea id="message" rows="4" name="detail_form[7][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Kriteria partisipan atau subyek dan justifikasi exclude/include. (Guideline 3)
                                (p12)</label>
                            <input type="hidden" name="detail_form[7][type][]" value="textarea">
                            <input type="hidden" name="detail_form[7][name][]"
                                value="2. Kriteria partisipan atau subyek dan justifikasi exclude/include. (Guideline 3) (p12)">
                            <textarea id="message" rows="4" name="detail_form[7][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Sampling kelompok rentan: alasan melibatkan anak anak atau orang dewasa yang tidak mampu
                                memberikan persetujuan setelah penjelasan, atau kelompok rentan, serta langkah langkah
                                bagaimana meminimalisir bila terjadi resiko (Guidelines 15, 16 and 17) (p15)</label>
                            <input type="hidden" name="detail_form[7][type][]" value="textarea">
                            <input type="hidden" name="detail_form[7][name][]"
                                value="3. Sampling kelompok rentan: alasan melibatkan anak anak atau orang dewasa yang tidak mampu memberikan persetujuan setelah penjelasan, atau kelompok rentan, serta langkah langkah bagaimana meminimalisir bila terjadi resiko (Guidelines 15, 16 and 17)  (p15)">
                            <textarea id="message" rows="4" name="detail_form[7][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 9 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                H. Intervensi
                            </p>
                            <input type="hidden" name="detail_form[8][name_df]" value="H. Intervensi">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. (pengguna data sekunder, kualitatif, cukup tulis tidak relevan, lanjut ke manfaat)
                                Deskripsi dan penjelasan semua intervensi metode administrasi treatmen, termasuk rute
                                administrasi, dosis, interval dosis, dan masa treatmen produk yang digunakan (investigasi
                                dan komparator) (p17)
                            </label>
                            <input type="hidden" name="detail_form[8][type][]" value="textarea">
                            <input type="hidden" name="detail_form[8][name][]"
                                value="1. (pengguna data sekunder, kualitatif, cukup tulis tidak relevan, lanjut ke manfaat) Deskripsi dan penjelasan semua intervensi metode administrasi treatmen, termasuk rute administrasi, dosis, interval dosis, dan masa treatmen produk yang digunakan (investigasi dan komparator) (p17)">
                            <textarea id="message" rows="4" name="detail_form[8][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Rencana dan jastifikasi untuk meneruskan atau menghentikan standar terapi selama
                                penelitian (p 4 and 5) (p18)
                            </label>
                            <input type="hidden" name="detail_form[8][type][]" value="textarea">
                            <input type="hidden" name="detail_form[8][name][]"
                                value="2. Rencana dan jastifikasi untuk meneruskan atau menghentikan standar terapi selama penelitian (p 4 and 5) (p18)">
                            <textarea id="message" rows="4" name="detail_form[8][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Treatment/Pengobatan lain yang mungkin diberikan atau diperbolehkan, atau menjadi
                                kontraindikasi, selama penelitian (p 6) (p19)</label>
                            <input type="hidden" name="detail_form[8][type][]" value="textarea">
                            <input type="hidden" name="detail_form[8][name][]"
                                value="3. Treatment/Pengobatan lain yang mungkin diberikan atau diperbolehkan, atau menjadi kontraindikasi, selama penelitian (p 6) (p19)">
                            <textarea id="message" rows="4" name="detail_form[8][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                4. test klinis atau lab atau test lain yang harus dilakukan (p20)</label>
                            <input type="hidden" name="detail_form[8][type][]" value="textarea">
                            <input type="hidden" name="detail_form[8][name][]"
                                value="4. test klinis atau lab atau test lain yang harus dilakukan (p20)">
                            <textarea id="message" rows="4" name="detail_form[8][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 10 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                I. Monitor Hasil
                            </p>
                            <input type="hidden" name="detail_form[9][name_df]" value="I. Monitor Hasil">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Sampel dari form laporan kasus yang sudah distandarisir, metode pencataran respon
                                teraputik
                                (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur follow-up, dan, bila
                                mungkin, ukuran yang diusulkan untuk menentukan tingkat kepatuhan subyek yang menerima
                                treatmen (lihat lampiran) (p17)
                            </label>
                            <input type="hidden" name="detail_form[9][type][]" value="textarea">
                            <input type="hidden" name="detail_form[9][name][]"
                                value="1. Sampel dari form laporan kasus yang sudah distandarisir, metode pencataran respon teraputik (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur follow-up, dan, bila mungkin, ukuran yang diusulkan untuk menentukan tingkat kepatuhan subyek yang menerima treatmen (lihat lampiran) (p17)">
                            <textarea id="message" rows="4" name="detail_form[9][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>
                    {{-- 11 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                J. Penghentian Penelitian dan Alasannya
                            </p>
                            <input type="hidden" name="detail_form[10][name_df]"
                                value="J. Penghentian  Penelitian dan Alasannya">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Aturan atau kriteria kapan subyek bisa diberhentikan dari penelitian atau uji klinis,
                                atau, dalam hal studi multi senter, kapan sebuah pusat/lembaga di non aktipkan, dan kapan
                                penelitian bisa dihentikan (tidak lagi dilanjutkan) (p22)
                            </label>
                            <input type="hidden" name="detail_form[10][type][]" value="textarea">
                            <input type="hidden" name="detail_form[10][name][]"
                                value="1. Aturan atau kriteria kapan subyek bisa diberhentikan dari penelitian atau uji klinis, atau, dalam hal studi multi senter, kapan sebuah pusat/lembaga di non aktipkan, dan kapan penelitian bisa dihentikan (tidak lagi dilanjutkan)  (p22)">
                            <textarea id="message" rows="4" name="detail_form[10][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>
                    {{-- 12 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                K. Adverse Event dan Komplikasi (Kejadian Yang Tidak Diharapkan)

                            </p>
                            <input type="hidden" name="detail_form[11][name_df]"
                                value="K. Adverse Event dan Komplikasi (Kejadian Yang Tidak Diharapkan)">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Metode pencatatan dan pelaporan adverse events atau reaksi, dan syarat penanganan
                                komplikasi (Guideline 4 dan 23)(p23)
                            </label>
                            <input type="hidden" name="detail_form[11][type][]" value="textarea">
                            <input type="hidden" name="detail_form[11][name][]"
                                value="1. Metode pencatatan dan pelaporan adverse events atau reaksi, dan syarat penanganan komplikasi (Guideline 4 dan 23)(p23)">
                            <textarea id="message" rows="4" name="detail_form[11][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Resiko resiko yang diketahui dari adverse events, termasuk resiko yang terkait dengan
                                masing
                                masing rencana intervensi, dan terkait dengan obat, vaksin, atau terhadap prosudur yang akan
                                diuji cobakan (Guideline 4) (p24)
                            </label>
                            <input type="hidden" name="detail_form[11][type][]" value="textarea">
                            <input type="hidden" name="detail_form[11][name][]"
                                value="2. Resiko resiko yang diketahui dari adverse events, termasuk resiko yang terkait dengan masing-masing rencana intervensi, dan terkait dengan obat, vaksin, atau terhadap prosudur yang akan diuji cobakan (Guideline 4) (p24)">
                            <textarea id="message" rows="4" name="detail_form[11][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>
                    {{-- 13 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                L. Penanganan Komplikasi (p27)
                            </p>
                            <input type="hidden" name="detail_form[12][name_df]" value="L. Penanganan Komplikasi (p27)">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Rencana detil bila ada resiko lebih dari minimal/ luka fisik, membuat rencana detil,<br>
                                2. Adanya asuransi,<br>
                                3. Adanya fasilitas pengobatan / biaya pengobatan<br>
                                4. Kompensasi jika terjadi disabilitas atau kematian (Guideline 14)<br>
                            </label>
                            <input type="hidden" name="detail_form[12][type][]" value="textarea">
                            <input type="hidden" name="detail_form[12][name][]"
                                value="1. Rencana detil bila ada resiko lebih dari minimal/ luka fisik, membuat rencana detil,
                                2. Adanya asuransi,
                                3. Adanya fasilitas pengobatan / biaya pengobatan
                                4. Kompensasi jika terjadi disabilitas atau kematian (Guideline 14">
                            <textarea id="message" rows="4" name="detail_form[12][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>
                    {{-- 14 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                M. Manfaat
                            </p>
                            <input type="hidden" name="detail_form[13][name_df]" value="M. Manfaat">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Manfaat penelitian secara pribadi bagi subyek dan bagi yang lainnya (Guideline 4) (p25)
                            </label>
                            <input type="hidden" name="detail_form[13][type][]" value="textarea">
                            <input type="hidden" name="detail_form[13][name][]"
                                value="1. Manfaat penelitian secara pribadi bagi subyek dan bagi yang lainnya (Guideline 4) (p25)">
                            <textarea id="message" rows="4" name="detail_form[13][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Manfaat penelitian bagi penduduk, termasuk pengetahuan baru yang kemungkinan dihasilkan
                                oleh penelitian (Guidelines 1 and 4)(p26)
                            </label>
                            <input type="hidden" name="detail_form[13][type][]" value="textarea">
                            <input type="hidden" name="detail_form[13][name][]"
                                value="2. Manfaat penelitian bagi penduduk, termasuk pengetahuan baru yang kemungkinan dihasilkan oleh penelitian (Guidelines 1 and 4)(p26)">
                            <textarea id="message" rows="4" name="detail_form[13][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>

                    {{-- 15 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                N. Jaminan Keberlanjutan Manfaat (p28)
                            </p>
                            <input type="hidden" name="detail_form[14][name_df]"
                                value="N. Jaminan Keberlanjutan Manfaat (p28)">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Kemungkinan keberlanjutan akses bila hasil intervensi menghasilkan manfaat yang
                                signifikan, <br>
                                2. modalitas yang tersedia,<br>
                                3. pihak pihak yang akan mendapatkan keberlangsungan pengobatan, organisasi yang akan
                                membayar,<br>
                                4. berapa lama (Guideline 6)
                            </label>
                            <input type="hidden" name="detail_form[14][type][]" value="textarea">
                            <input type="hidden" name="detail_form[14][name][]"
                                value="1. Kemungkinan keberlanjutan akses bila hasil intervensi menghasilkan manfaat yang signifikan, <br>2. modalitas yang tersedia,<br>3. pihak pihak yang akan mendapatkan keberlangsungan pengobatan, organisasi yang akan membayar,<br>4. berapa lama (Guideline 6)">
                            <textarea id="message" rows="4" name="detail_form[14][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>
                    {{-- 16 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                O. Informed Consent
                            </p>
                            <input type="hidden" name="detail_form[15][name_df]" value="O. Informed Consent">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Cara yang diusulkan untuk mendapatkan informed consent dan prosudur yang direncanakan
                                untuk mengkomunikasikan informasi penelitian kepada calon subyek, termasuk nama dan posisi
                                wali bagi yang tidak bisa memberikannya. (Guideline 9)(p30)
                            </label>
                            <input type="hidden" name="detail_form[15][type][]" value="textarea">
                            <input type="hidden" name="detail_form[15][name][]"
                                value="1. Cara yang diusulkan untuk mendapatkan informed consent dan prosudur yang direncanakan untuk mengkomunikasikan informasi penelitian kepada calon subyek, termasuk nama dan posisi wali bagi yang tidak bisa memberikannya. (Guideline 9)(p30)">
                            <textarea id="message" rows="4" name="detail_form[15][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Khusus Ibu Hamil: adanya perencanaan untuk memonitor kesehatan ibu dan kesehatan anak
                                jangka pendek maupun jangka panjang (Guideline 19)(p29)
                            </label>
                            <input type="hidden" name="detail_form[15][type][]" value="textarea">
                            <input type="hidden" name="detail_form[15][name][]"
                                value="2. Khusus Ibu Hamil: adanya perencanaan untuk memonitor kesehatan ibu dan kesehatan anak jangka pendek maupun jangka panjang (Guideline 19)(p29)">
                            <textarea id="message" rows="4" name="detail_form[15][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>

                    {{-- 17 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                P. Wali (p31)
                            </p>
                            <input type="hidden" name="detail_form[16][name_df]" value="P. Wali (p31)">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Adanya wali yang berhak bila calon subyek tidak bisa memberikan informed consent
                                (Guidelines 16 and 17)
                            </label>
                            <input type="hidden" name="detail_form[16][type][]" value="textarea">
                            <input type="hidden" name="detail_form[16][name][]"
                                value="1. Adanya wali yang berhak bila calon subyek tidak bisa memberikan informed consent (Guidelines 16 and 17)">
                            <textarea id="message" rows="4" name="detail_form[16][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Adanya orang tua atau wali yang berhak bila anak paham tentang informed consent tapi
                                belum cukup umur(Guidelines 16 and 17)
                            </label>
                            <input type="hidden" name="detail_form[16][type][]" value="textarea">
                            <input type="hidden" name="detail_form[16][name][]"
                                value="2. Adanya orang tua atau wali yang berhak bila anak paham tentang informed consent tapi belum cukup umur(Guidelines 16 and 17)">
                            <textarea id="message" rows="4" name="detail_form[16][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 18 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                Q. Bujukan
                            </p>
                            <input type="hidden" name="detail_form[17][name_df]" value="Q. Bujukan">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Deskripsi bujukan atau insentif pada calon subyek untuk ikut berpartisipasi, seperti
                                uang, hadiah, layanan gratis, atau yang lainnya (p32)
                            </label>
                            <input type="hidden" name="detail_form[17][type][]" value="textarea">
                            <input type="hidden" name="detail_form[17][name][]"
                                value="1. Deskripsi bujukan atau insentif pada calon subyek untuk ikut berpartisipasi, seperti uang, hadiah, layanan gratis, atau yang lainnya (p32)">
                            <textarea id="message" rows="4" name="detail_form[17][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Rencana dan prosedur, dan orang yang betanggung jawab untuk menginformasikan bahaya atau
                                keuntungan peserta, atau tentang riset lain tentang topik yang sama, yang bisa mempengaruhi
                                keberlansungan keterlibatan subyek dalam penelitian(Guideline 9) (p33)
                            </label>
                            <input type="hidden" name="detail_form[17][type][]" value="textarea">
                            <input type="hidden" name="detail_form[17][name][]"
                                value="2. Rencana dan prosedur, dan orang yang betanggung jawab untuk menginformasikan bahaya atau keuntungan peserta, atau tentang riset lain tentang topik yang sama, yang bisa mempengaruhi keberlansungan keterlibatan subyek dalam penelitian(Guideline 9) (p33)">
                            <textarea id="message" rows="4" name="detail_form[17][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Perencanaan untuk menginformasikan hasil penelitian pada subyek atau partisipan (p34)
                            </label>
                            <input type="hidden" name="detail_form[17][type][]" value="textarea">
                            <input type="hidden" name="detail_form[17][name][]"
                                value="3. Perencanaan untuk menginformasikan hasil penelitian pada subyek atau partisipan (p34)">
                            <textarea id="message" rows="4" name="detail_form[17][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 19 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                R. Penjagaan Kerahasiaan
                            </p>
                            <input type="hidden" name="detail_form[18][name_df]" value="R. Penjagaan Kerahasiaan ">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Proses rekrutmen (misalnya lewat iklan), serta langkah langkah untuk menjaga privasi dan
                                kerahasiaan selama rekrutmen (Guideline 3) (p16)
                            </label>
                            <input type="hidden" name="detail_form[18][type][]" value="textarea">
                            <input type="hidden" name="detail_form[18][name][]"
                                value="1. Proses rekrutmen (misalnya lewat iklan), serta langkah langkah untuk menjaga privasi dan kerahasiaan selama rekrutmen (Guideline 3) (p16)">
                            <textarea id="message" rows="4" name="detail_form[18][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Langkah langkah proteksi kerahasiaan data pribadi, dan penghormatan privasi orang,
                                termasuk kehatihatian untuk mencegah bocornya rahasia hasil test genetik pada keluarga
                                kecuali atas izin dari yang bersangkutan (Guidelines 4, 11, 12 and 24) (p 35)
                            </label>
                            <input type="hidden" name="detail_form[18][type][]" value="textarea">
                            <input type="hidden" name="detail_form[18][name][]"
                                value="2. Langkah langkah proteksi kerahasiaan data pribadi, dan penghormatan privasi orang, termasuk kehatihatian untuk mencegah bocornya rahasia hasil test genetik pada keluarga kecuali atas izin dari yang bersangkutan (Guidelines 4, 11, 12 and 24) (p 35)">
                            <textarea id="message" rows="4" name="detail_form[18][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Informasi tentang bagaimana kode; bila ada, untuk identitas subyek dibuat, di mana di
                                simpan dan kapan, bagaimana dan oleh siapa bisa dibuka bila terjadi emergensi (Guidelines 11
                                and 12) (p36)
                            </label>
                            <input type="hidden" name="detail_form[18][type][]" value="textarea">
                            <input type="hidden" name="detail_form[18][name][]"
                                value="3. Informasi tentang bagaimana kode; bila ada, untuk identitas subyek dibuat, di mana di simpan dan kapan, bagaimana dan oleh siapa bisa dibuka bila terjadi emergensi (Guidelines 11 and 12) (p36)">
                            <textarea id="message" rows="4" name="detail_form[18][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                4. Kemungkinan penggunaan lebih jauh dari data personal atau material biologis (p37)
                            </label>
                            <input type="hidden" name="detail_form[18][type][]" value="textarea">
                            <input type="hidden" name="detail_form[18][name][]"
                                value="4. Kemungkinan penggunaan lebih jauh dari data personal atau material biologis (p37)">
                            <textarea id="message" rows="4" name="detail_form[18][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 20 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                S. Rencana Analisis
                            </p>
                            <input type="hidden" name="detail_form[19][name_df]" value="S. Rencana Analisis">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Deskripsi tentang rencana tencana analisa statistik, termasuk rencana analisa interim
                                bila diperlukan, dan kreteria bila atau dalam kondisi bagaimana akan terjadi penghentian
                                prematur keseluruhan penelitian (Guideline 4) (B,S2);
                            </label>
                            <input type="hidden" name="detail_form[19][type][]" value="textarea">
                            <input type="hidden" name="detail_form[19][name][]"
                                value="1. Deskripsi tentang rencana tencana analisa statistik, termasuk rencana analisa interim bila diperlukan, dan kreteria bila atau dalam kondisi bagaimana akan terjadi penghentian prematur keseluruhan penelitian (Guideline 4) (B,S2); ">
                            <textarea id="message" rows="4" name="detail_form[19][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>


                        </div>
                    </div>

                    {{-- 21 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                T. Monitor Keamanan
                            </p>
                            <input type="hidden" name="detail_form[20][name_df]" value="T. Monitor Keamanan">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Rencana rencana untuk memonitor keberlansungan keamanan obat atau intervensi lain yang
                                dilakukan dalam penelitian atau trial, dan, bila diperlukan, pembentukan komite independen
                                untuk data dan safety monitoring (Guideline 4) (B,S3,S7);
                            </label>
                            <input type="hidden" name="detail_form[20][type][]" value="textarea">
                            <input type="hidden" name="detail_form[20][name][]"
                                value="1. Rencana rencana untuk memonitor keberlansungan keamanan obat atau intervensi lain yang dilakukan dalam penelitian atau trial, dan, bila diperlukan, pembentukan komite independen untuk data dan safety monitoring (Guideline 4) (B,S3,S7);  ">
                            <textarea id="message" rows="4" name="detail_form[20][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>


                        </div>
                    </div>
                    {{-- 22 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                U. Konflik Kepentingan
                            </p>
                            <input type="hidden" name="detail_form[21][name_df]" value="U. Konflik Kepentingan">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Pengaturan untuk mengatasi konflik finansial atau yang lainnya yang bisa mempengaruhi
                                keputusan para peneliti atau personil lainya; menginformasikan pada komite lembaga tentang
                                adanya conflict of interest; komite mengkomunikasikannya ke komite etik dan kemudian
                                mengkomunikasikan pada para peneliti tentang langkah langkah berikutnya yang harus dilakukan
                                (Guideline 25) (p42)
                            </label>
                            <input type="hidden" name="detail_form[21][type][]" value="textarea">
                            <input type="hidden" name="detail_form[21][name][]"
                                value="1. Pengaturan untuk mengatasi konflik finansial atau yang lainnya yang bisa mempengaruhi keputusan para peneliti atau personil lainya; menginformasikan pada komite lembaga tentang adanya conflict of interest; komite mengkomunikasikannya ke komite etik dan kemudian mengkomunikasikan pada para peneliti tentang langkah langkah berikutnya yang harus dilakukan (Guideline 25) (p42)">
                            <textarea id="message" rows="4" name="detail_form[21][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>
                    {{-- 23 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                V. Manfaat Sosial
                            </p>
                            <input type="hidden" name="detail_form[22][name_df]" value="V. Manfaat Sosial">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Untuk riset yang dilakukan pada seting sumberdaya lemah, kontribusi yang dilakukan
                                sponsor untuk capacity building untuk review ilmiah dan etika dan untuk riset riset
                                kesehatan di negara tersebut; dan jaminan bahwa tujuan capacity building adalah agar sesuai
                                nilai dan harapan para partisipan dan komunitas tempat penelitian (Guideline 8) (p43)
                            </label>
                            <input type="hidden" name="detail_form[22][type][]" value="textarea">
                            <input type="hidden" name="detail_form[22][name][]"
                                value="1. Untuk riset yang dilakukan pada seting sumberdaya lemah, kontribusi yang dilakukan sponsor untuk capacity building untuk review ilmiah dan etika dan untuk riset riset kesehatan di negara tersebut; dan jaminan bahwa tujuan capacity building adalah agar sesuai nilai dan harapan para partisipan dan komunitas tempat penelitian (Guideline 8) (p43)">
                            <textarea id="message" rows="4" name="detail_form[22][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. Protokol riset atau dokumen yang dikirim ke komite etik harus meliputi deskripsi rencana
                                pelibatan komunitas, dan menunjukkan sumber sumber yang dialokasikan untuk aktivitas
                                aktivitas pelibatan tersebut. Dokumen ini menjelaskan apa yang sudah dan yang akan
                                dilakukan, kapan dan oleh siapa, untuk memastikan bahwa masyarakat dengan jelas terpetakan
                                untuk memudahkan pelibatan mereka selama riset, untuk memastikan bahwa tujuan riset sesuai
                                kebutuhan masyarakat dan diterima oleh mereka. Bila perlu masyarakat harus dilibatkan dalam
                                penyusunan protokol atau dokumen ini (Guideline 7) (p44)
                            </label>
                            <input type="hidden" name="detail_form[22][type][]" value="textarea">
                            <input type="hidden" name="detail_form[22][name][]"
                                value="2. Protokol riset atau dokumen yang dikirim ke komite etik harus meliputi deskripsi rencana pelibatan komunitas, dan menunjukkan sumber sumber yang dialokasikan untuk aktivitas aktivitas pelibatan tersebut. Dokumen ini menjelaskan apa yang sudah dan yang akan dilakukan, kapan dan oleh siapa, untuk memastikan bahwa masyarakat dengan jelas terpetakan untuk memudahkan pelibatan mereka selama riset, untuk memastikan bahwa tujuan riset sesuai kebutuhan masyarakat dan diterima oleh mereka. Bila perlu masyarakat harus dilibatkan dalam penyusunan protokol atau dokumen ini (Guideline 7) (p44)">
                            <textarea id="message" rows="4" name="detail_form[22][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>

                    {{-- 24 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                W. Hak atas Data
                            </p>
                            <input type="hidden" name="detail_form[23][name_df]" value="W. Hak atas Data">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Terutama bila sponsor adalah industri, kontrak yang menyatakan siapa pemilik hak publiksi
                                hasil riset, dan kewajiban untuk menyiapkan bersama dan diberikan pada para PI draft laporan
                                hasil riset (Guideline 24) (B dan H, S1,S7);
                            </label>
                            <input type="hidden" name="detail_form[23][type][]" value="textarea">
                            <input type="hidden" name="detail_form[23][name][]"
                                value="1. Terutama bila sponsor adalah industri, kontrak yang menyatakan siapa pemilik hak publiksi hasil riset, dan kewajiban untuk menyiapkan bersama dan diberikan pada para PI draft laporan hasil riset (Guideline 24) (B dan H, S1,S7); ">
                            <textarea id="message" rows="4" name="detail_form[23][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>


                    {{-- 25 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                a. Publikasi
                            </p>
                            <input type="hidden" name="detail_form[24][name_df]" value="a. Publikasi">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                Rencana publikasi hasil pada bidang tertentu (seperti epidemiology, generik, sosiologi) yang
                                bisa beresiko berlawanan dengan kemaslahatan komunitas, masyarakat, keluarga, etnik
                                tertentu, dan meminimalisir resiko kemudharatan kelompok ini dengan selalu mempertahankan
                                kerahasiaan data selama dan setelah penelitian, dan mempublikasi hasil hasil penelitian
                                sedemikian rupa dengan selalu mempertimbangkan martabat dan kemulyaan mereka (Guideline 4)
                                (p47)
                            </label>
                            <input type="hidden" name="detail_form[24][type][]" value="textarea">
                            <input type="hidden" name="detail_form[24][name][]"
                                value="Rencana publikasi hasil pada bidang tertentu (seperti epidemiology, generik, sosiologi) yang bisa beresiko berlawanan dengan kemaslahatan komunitas, masyarakat, keluarga, etnik tertentu, dan meminimalisir resiko kemudharatan kelompok ini dengan selalu mempertahankan kerahasiaan data selama dan setelah penelitian, dan mempublikasi hasil hasil penelitian sedemikian rupa dengan selalu mempertimbangkan martabat dan kemulyaan mereka (Guideline 4) (p47)">
                            <textarea id="message" rows="4" name="detail_form[24][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                Bila hasil riset negatip, memastikan bahwa hasilnya tersedia melalui publikasi atau dengan
                                melaporkan ke otoritas pencatatan obat obatan (Guideline 24) (p46)
                            </label>
                            <input type="hidden" name="detail_form[24][type][]" value="textarea">
                            <input type="hidden" name="detail_form[24][name][]"
                                value="Bila hasil riset negatip, memastikan bahwa hasilnya tersedia melalui publikasi atau dengan melaporkan ke otoritas pencatatan obat obatan (Guideline 24) (p46)">
                            <textarea id="message" rows="4" name="detail_form[24][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>
                    </div>

                    {{-- 26 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                b. Pendanaan
                            </p>
                            <input type="hidden" name="detail_form[25][name_df]" value="b. Pendanaan">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                Sumber dan jumlah dana riset; lembaga funding, dan deskripsi komitmen finansial sponsor pada
                                kelembagaan penelitian, pada para peneliti, para subyek riset, dan, bila ada, pada komunitas
                                (Guideline 25) (B, S2); (p41)
                            </label>
                            <input type="hidden" name="detail_form[25][type][]" value="textarea">
                            <input type="hidden" name="detail_form[25][name][]"
                                value="Sumber dan jumlah dana riset; lembaga funding, dan deskripsi komitmen finansial sponsor pada kelembagaan penelitian, pada para peneliti, para subyek riset, dan, bila ada, pada komunitas (Guideline 25) (B, S2); (p41)">
                            <textarea id="message" rows="4" name="detail_form[25][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
                        </div>
                    </div>

                    {{-- 27 --}}
                    <div class="mb-2">
                        <div>
                            <p>
                                c. Komitmen Etik
                            </p>
                            <input type="hidden" name="detail_form[26][name_df]" value="c. Komitmen Etik">
                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                1. Pernyataan peneliti utama bahwa prinsip prinsip yang tertuang dalam pedoman ini akan
                                dipatuhi (p6)
                            </label>
                            <input type="hidden" name="detail_form[26][type][]" value="textarea">
                            <input type="hidden" name="detail_form[26][name][]"
                                value="1. Pernyataan peneliti utama bahwa prinsip prinsip yang tertuang dalam pedoman ini akan dipatuhi (p6)">
                            <textarea id="message" rows="4" name="detail_form[26][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                2. (Track Record) Riwayat usulan review protokol etik sebelumnya dan hasilnya (isi dengan
                                judul
                                dan tanggal penelitian, dan hasil review Komite Etik(p7))
                            </label>
                            <input type="hidden" name="detail_form[26][type][]" value="textarea">
                            <input type="hidden" name="detail_form[26][name][]"
                                value="2. (Track Record) Riwayat usulan review protokol etik sebelumnya dan hasilnya (isi dengan judul dan tanggal penelitian, dan hasil review Komite Etik(p7))">
                            <textarea id="message" rows="4" name="detail_form[26][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>


                            <label class="text-sm font-medium text-gray-900 dark:text-white ">
                                3. Pernyataan bahwa bila terdapat bukti adanya pemalsuan data akan ditangani sesuai policy
                                sponsor untuk mengambil langkah yang diperlukan (p48)
                            </label>
                            <input type="hidden" name="detail_form[26][type][]" value="textarea">
                            <input type="hidden" name="detail_form[26][name][]"
                                value="3. Pernyataan bahwa bila terdapat bukti adanya pemalsuan data akan ditangani sesuai policy sponsor untuk mengambil langkah yang diperlukan (p48)">
                            <textarea id="message" rows="4" name="detail_form[26][input][]"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>
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
        // $('input').val('okeee')
        // $('textarea').val('okeee')
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
