@extends('layouts.app')

@section('content')

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-3xl font-bold text-white">
                    📄 Laporan Observasi
                </h2>

                <p class="text-blue-100 mt-2">
                    Rekapitulasi hasil observasi pembelajaran guru.
                </p>

            </div>

            @if(auth()->user()->role === 'admin')

            <a href="{{ route('laporan.pdf') }}"
               class="bg-white text-red-600 px-5 py-3 rounded-xl font-semibold shadow hover:bg-gray-100 transition">

                📥 Export PDF

            </a>

            @endif

        </div>

    </div>

</div>

{{-- Tabel Laporan --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-5 flex justify-between items-center">

        <h3 class="text-xl font-bold text-white">
            📋 Data Laporan
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

                        Belum ada data laporan

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
