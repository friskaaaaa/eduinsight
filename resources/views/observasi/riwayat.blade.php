@extends('layouts.app')

@section('content')

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <h2 class="text-3xl font-bold text-white">
            📚 Riwayat Observasi
        </h2>

        <p class="text-blue-100 mt-2">
            Riwayat seluruh hasil observasi pembelajaran guru.
        </p>

    </div>

</div>

{{-- Pencarian --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4">

        <h3 class="text-lg font-bold text-white">
            🔍 Pencarian Data
        </h3>

    </div>

    <div class="p-6">

        <form method="GET"
              action="{{ route('observasi.riwayat') }}">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="keyword"
                    value="{{ $keyword }}"
                    placeholder="Cari nama guru atau mata pelajaran..."
                    class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                <button
                    type="submit"
                    class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 text-white px-6 py-3 rounded-xl font-semibold transition">

                    Cari

                </button>

            </div>

        </form>

    </div>

</div>

{{-- Tabel Riwayat --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-5 flex justify-between items-center">

        <h3 class="text-xl font-bold text-white">
            📋 Data Riwayat Observasi
        </h3>

        <span class="bg-white/20 text-white px-4 py-2 rounded-full text-sm">

            Total: {{ $observasis->count() }} Data

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-50 border-b text-gray-600 text-sm uppercase">

                    <th class="py-4 text-center">
                        Guru
                    </th>

                    <th class="text-center">
                        Mata Pelajaran
                    </th>

                    <th class="text-center">
                        Tanggal
                    </th>

                    <th class="text-center">
                        Nilai
                    </th>

                    <th class="text-center">
                        Kategori
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($observasis as $observasi)

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

                <tr class="border-b hover:bg-slate-50 transition text-center">

                    <td class="py-4 font-medium">
                        {{ $observasi->nama_guru }}
                    </td>

                    <td>
                        {{ $observasi->mata_pelajaran }}
                    </td>

                    <td>
                        {{ date('d M Y', strtotime($observasi->tanggal_observasi)) }}
                    </td>

                    <td class="font-bold text-indigo-600">
                        {{ $observasi->total_nilai }}
                    </td>

                    <td>

                        <span class="{{ $badgeClass }} px-4 py-1 rounded-full text-sm font-medium">

                            {{ $observasi->kategori }}

                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="py-12 text-center text-gray-500">

                        Tidak ada data ditemukan

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
