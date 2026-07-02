@extends('layouts.app')

@section('content')

<div class="space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <h2 class="text-3xl font-bold text-white">
            📈 Evaluasi Pembelajaran
        </h2>

        <p class="text-blue-100 mt-2">
            Analisis hasil observasi guru dan rekomendasi peningkatan pembelajaran.
        </p>

    </div>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-blue-100">
            📊 Total Observasi
        </p>

        <h3 class="text-4xl font-bold mt-2">
            {{ $totalObservasi }}
        </h3>

    </div>

    <div class="bg-gradient-to-r from-purple-500 to-fuchsia-500 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-purple-100">
            📈 Rata-rata Nilai
        </p>

        <h3 class="text-4xl font-bold mt-2">
            {{ $rataRata }}
        </h3>

    </div>

    <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-green-100">
            🏆 Guru Terbaik
        </p>

        <h3 class="font-bold mt-2 text-lg">
            {{ $guruTerbaik->nama_guru ?? '-' }}
        </h3>

        <p class="text-2xl font-bold">
            {{ $guruTerbaik->total_nilai ?? '-' }}
        </p>

    </div>

    <div class="bg-gradient-to-r from-orange-400 to-red-500 text-white p-6 rounded-2xl shadow-lg">

        <p class="text-orange-100">
            ⭐ Kategori Dominan
        </p>

        <h3 class="font-bold mt-2 text-lg">
            {{ $kategoriDominan ?? '-' }}
        </h3>

    </div>

</div>

{{-- Tabel Evaluasi --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-5 flex justify-between items-center">

        <h3 class="text-xl font-bold text-white">
            📋 Data Evaluasi Guru
        </h3>

        <span class="bg-white/20 text-white px-4 py-2 rounded-full text-sm">

            Total: {{ $observasis->count() }} Data

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-50 border-b text-center text-gray-600 uppercase text-sm">

                    <th class="py-4">
                        Guru
                    </th>

                    <th>
                        Mata Pelajaran
                    </th>

                    <th>
                        Nilai
                    </th>

                    <th>
                        Kategori
                    </th>

                    <th>
                        Rekomendasi
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

                    <td class="font-bold text-indigo-600">
                        {{ $observasi->total_nilai }}
                    </td>

                    <td>

                        <span class="{{ $badgeClass }} px-4 py-1 rounded-full text-sm font-medium">

                            {{ $observasi->kategori }}

                        </span>

                    </td>

                    <td class="px-4">

                        @if($observasi->total_nilai >= 340)

                            <span class="text-green-600 font-medium">
                                Pertahankan kualitas pembelajaran
                            </span>

                        @elseif($observasi->total_nilai >= 250)

                            <span class="text-yellow-600 font-medium">
                                Tingkatkan variasi metode mengajar
                            </span>

                        @else

                            <span class="text-red-600 font-medium">
                                Perlu pendampingan dan supervisi lanjutan
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="py-12 text-center text-gray-500">

                        Belum ada data evaluasi

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
