@extends('layouts.app')

@section('content')

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <h2 class="text-3xl font-bold text-white">
            ⚙️ Pengaturan Sistem
        </h2>

        <p class="text-blue-100 mt-2">
            Informasi dan konfigurasi dasar aplikasi EduInsight.
        </p>

    </div>

</div>

{{-- Ringkasan Sistem --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-blue-100">
            Nama Aplikasi
        </p>

        <h3 class="text-2xl font-bold mt-2">
            EduInsight
        </h3>

    </div>

    <div class="bg-gradient-to-r from-purple-500 to-fuchsia-500 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-purple-100">
            Versi Sistem
        </p>

        <h3 class="text-2xl font-bold mt-2">
            v1.0
        </h3>

    </div>

    <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-green-100">
            Status Sistem
        </p>

        <h3 class="text-2xl font-bold mt-2">
            Aktif
        </h3>

    </div>

</div>

{{-- Informasi Aplikasi --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4">

        <h3 class="text-lg font-bold text-white">
            📘 Informasi Aplikasi
        </h3>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-sm text-gray-500">
                    Nama Aplikasi
                </p>

                <p class="font-semibold text-lg">
                    EduInsight
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Versi Sistem
                </p>

                <p class="font-semibold text-lg">
                    1.0
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Modul Utama
                </p>

                <p class="font-semibold">
                    Observasi Pembelajaran dan Evaluasi Guru
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Hak Akses
                </p>

                <p class="font-semibold">
                    Administrator dan Guru
                </p>

            </div>

        </div>

    </div>

</div>

{{-- Informasi Pengembang --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">

        <h3 class="text-lg font-bold text-white">
            👨‍💻 Informasi Sistem
        </h3>

    </div>

    <div class="p-6">

        <div class="space-y-5">

            <div>

                <p class="text-sm text-gray-500">
                    Nama Sistem
                </p>

                <p class="font-semibold">
                    EduInsight
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Tujuan
                </p>

                <p class="font-semibold">
                    Membantu proses observasi pembelajaran dan evaluasi kinerja guru secara digital.
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Deskripsi
                </p>

                <p class="font-semibold">
                    Sistem ini digunakan untuk melakukan observasi kelas, evaluasi proses pembelajaran, analisis hasil observasi, dan penyusunan laporan secara terintegrasi.
                </p>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
