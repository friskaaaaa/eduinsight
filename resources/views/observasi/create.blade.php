@extends('layouts.app')

@section('content')

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <h2 class="text-3xl font-bold text-white">
            📝 Input Observasi Guru
        </h2>

        <p class="text-blue-100 mt-2">
            Tambahkan data hasil observasi pembelajaran guru.
        </p>

    </div>

</div>

<form action="{{ route('observasi.store') }}" method="POST">

    @csrf

    {{-- Informasi Guru --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4">

            <h3 class="text-lg font-bold text-white">
                👨‍🏫 Informasi Guru
            </h3>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Nama Guru
                    </label>

                    <input type="text"
                           name="nama_guru"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>

                </div>

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mata_pelajaran"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>

                </div>

            </div>

        </div>

    </div>

    {{-- Informasi Observasi --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">

            <h3 class="text-lg font-bold text-white">
                📅 Informasi Observasi
            </h3>

        </div>

        <div class="p-6">

            <label class="block mb-2 text-sm font-medium text-gray-700">
                Tanggal Observasi
            </label>

            <input type="date"
                   name="tanggal_observasi"
                   class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                   required>

        </div>

    </div>

    {{-- Penilaian --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

        <div class="bg-gradient-to-r from-amber-400 to-orange-500 p-4">

            <h3 class="text-lg font-bold text-white">
                📊 Penilaian Observasi
            </h3>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Persiapan
                    </label>

                    <input type="number"
                           name="persiapan"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-500"
                           required>

                </div>

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Pelaksanaan
                    </label>

                    <input type="number"
                           name="pelaksanaan"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-500"
                           required>

                </div>

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Penilaian
                    </label>

                    <input type="number"
                           name="penilaian"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-500"
                           required>

                </div>

                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Pengelolaan Kelas
                    </label>

                    <input type="number"
                           name="pengelolaan_kelas"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-500"
                           required>

                </div>

            </div>

        </div>

    </div>

    {{-- Catatan --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

        <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-4">

            <h3 class="text-lg font-bold text-white">
                📝 Catatan Observasi
            </h3>

        </div>

        <div class="p-6">

            <textarea
                name="catatan"
                rows="5"
                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500"
                placeholder="Masukkan catatan hasil observasi..."></textarea>

        </div>

    </div>

    {{-- Tombol --}}
    <div class="flex gap-3">

        <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg">

            💾 Simpan Observasi

        </button>

        <a href="{{ route('observasi.index') }}"
           class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl font-medium transition">

            Kembali

        </a>

    </div>

</form>

</div>

@endsection
