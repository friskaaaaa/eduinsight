@extends('layouts.app')

@section('content')

@php

$badgeClass = 'bg-red-100 text-red-700';

if ($observasi->kategori == 'Sangat Baik') {
$badgeClass = 'bg-green-100 text-green-700';
} elseif ($observasi->kategori == 'Baik') {
$badgeClass = 'bg-blue-100 text-blue-700';
} elseif ($observasi->kategori == 'Cukup') {
$badgeClass = 'bg-yellow-100 text-yellow-700';
}

@endphp

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <h2 class="text-3xl font-bold text-white">
            📄 Detail Observasi Guru
        </h2>

        <p class="text-blue-100 mt-2">
            Informasi lengkap hasil observasi pembelajaran.
        </p>

    </div>

</div>

{{-- Informasi Guru --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4">

        <h3 class="text-lg font-bold text-white">
            👨‍🏫 Informasi Guru
        </h3>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-sm text-gray-500">
                    Nama Guru
                </p>

                <p class="font-semibold text-lg">
                    {{ $observasi->nama_guru }}
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Mata Pelajaran
                </p>

                <p class="font-semibold text-lg">
                    {{ $observasi->mata_pelajaran }}
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    Tanggal Observasi
                </p>

                <p class="font-semibold">
                    {{ date('d M Y', strtotime($observasi->tanggal_observasi)) }}
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500 mb-2">
                    Kategori
                </p>

                <span class="{{ $badgeClass }} px-4 py-1 rounded-full text-sm font-medium">
                    {{ $observasi->kategori }}
                </span>

            </div>

        </div>

    </div>

</div>

{{-- Penilaian --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-amber-400 to-orange-500 p-4">

        <h3 class="text-lg font-bold text-white">
            📊 Hasil Penilaian
        </h3>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-blue-50 p-5 rounded-xl">

                <p class="text-sm text-gray-500">
                    Persiapan
                </p>

                <p class="text-3xl font-bold text-blue-600">
                    {{ $observasi->persiapan }}
                </p>

            </div>

            <div class="bg-blue-50 p-5 rounded-xl">

                <p class="text-sm text-gray-500">
                    Pelaksanaan
                </p>

                <p class="text-3xl font-bold text-blue-600">
                    {{ $observasi->pelaksanaan }}
                </p>

            </div>

            <div class="bg-blue-50 p-5 rounded-xl">

                <p class="text-sm text-gray-500">
                    Penilaian
                </p>

                <p class="text-3xl font-bold text-blue-600">
                    {{ $observasi->penilaian }}
                </p>

            </div>

            <div class="bg-blue-50 p-5 rounded-xl">

                <p class="text-sm text-gray-500">
                    Pengelolaan Kelas
                </p>

                <p class="text-3xl font-bold text-blue-600">
                    {{ $observasi->pengelolaan_kelas }}
                </p>

            </div>

        </div>

    </div>

</div>

{{-- Total Nilai --}}
<div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-8 rounded-2xl shadow-lg">

    <p class="text-indigo-100 mb-2">
        Total Nilai Observasi
    </p>

    <p class="text-5xl font-bold">
        {{ $observasi->total_nilai }}
    </p>

</div>

{{-- Catatan --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-4">

        <h3 class="text-lg font-bold text-white">
            📝 Catatan Observasi
        </h3>

    </div>

    <div class="p-6">

        <div class="bg-gray-50 rounded-xl p-4">

            {{ $observasi->catatan ?? '-' }}

        </div>

    </div>

</div>

{{-- Tombol --}}
<div class="flex flex-wrap gap-3">

    <a href="{{ route('observasi.index') }}"
       class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-3 rounded-xl shadow hover:opacity-90">

        Kembali

    </a>

    @if(auth()->user()->role === 'admin')

        <a href="{{ route('observasi.edit', $observasi->id) }}"
           class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-5 py-3 rounded-xl shadow hover:opacity-90">

            Edit

        </a>

        <form action="{{ route('observasi.destroy', $observasi->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin hapus data?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-5 py-3 rounded-xl shadow hover:opacity-90">

                Hapus

            </button>

        </form>

    @endif

</div>

</div>

@endsection
