@extends('layouts.app')

@section('content')

<div class="mb-8">

<h2 class="text-3xl font-bold text-gray-800">
    Selamat Datang, {{ Auth::user()->name }}
</h2>

<p class="text-gray-500">
    Platform Observasi dan Evaluasi Pembelajaran
</p>

</div>

{{-- Statistik Utama --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

<div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-blue-100 mb-2">
        📊 Total Observasi
    </h3>

    <p class="text-4xl font-bold">
        {{ $totalObservasi }}
    </p>

</div>

<div class="bg-gradient-to-r from-purple-500 to-fuchsia-500 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-purple-100 mb-2">
        📈 Rata-rata Nilai
    </h3>

    <p class="text-4xl font-bold">
        {{ $rataRata ?? 0 }}
    </p>

</div>

<div class="bg-gradient-to-r from-amber-400 to-orange-500 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="mb-2">
        🏆 Guru Terbaik
    </h3>

    @if($guruTerbaik)

        <p class="text-lg font-semibold">
            {{ $guruTerbaik->nama_guru }}
        </p>

        <p class="text-3xl font-bold">
            {{ $guruTerbaik->total_nilai }}
        </p>

    @else

        <p>-</p>

    @endif

</div>

</div>

{{-- Statistik Kategori --}}

<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">

<div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-green-100">
        Sangat Baik
    </h3>

    <p class="text-3xl font-bold">
        {{ $sangatBaik }}
    </p>

</div>

<div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-blue-100">
        Baik
    </h3>

    <p class="text-3xl font-bold">
        {{ $baik }}
    </p>

</div>

<div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-yellow-100">
        Cukup
    </h3>

    <p class="text-3xl font-bold">
        {{ $cukup }}
    </p>

</div>

<div class="bg-gradient-to-r from-red-500 to-pink-600 text-white p-6 rounded-2xl shadow-lg">

    <h3 class="text-red-100">
        Perlu Perbaikan
    </h3>

    <p class="text-3xl font-bold">
        {{ $perluPerbaikan }}
    </p>

</div>

</div>

{{-- Grafik --}}

<div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

<div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-5">

    <h3 class="text-xl font-bold text-center text-white">
        📊 Distribusi Hasil Observasi Guru
    </h3>

</div>

<div class="p-6">

    <div style="height:400px; max-width:500px; margin:auto;">
        <canvas id="observasiChart"></canvas>
    </div>

</div>

</div>

{{-- Observasi Terbaru --}}

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

<div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-5">

    <h3 class="text-xl font-bold text-white">
        📋 Observasi Terbaru
    </h3>

</div>

<div class="p-6">

    <table class="w-full text-center">

        <thead>

            <tr class="border-b bg-slate-50">

                <th class="py-3">
                    Guru
                </th>

                <th>
                    Mapel
                </th>

                <th>
                    Tanggal
                </th>

                <th>
                    Nilai
                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($observasiTerbaru as $item)

            <tr class="border-b hover:bg-slate-50 transition">

                <td class="py-3">
                    {{ $item->nama_guru }}
                </td>

                <td>
                    {{ $item->mata_pelajaran }}
                </td>

                <td>
                    {{ $item->tanggal_observasi }}
                </td>

                <td class="font-semibold">
                    {{ $item->total_nilai }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4"
                    class="py-6 text-gray-500">

                    Belum ada data observasi

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('observasiChart');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [
            'Sangat Baik',
            'Baik',
            'Cukup',
            'Perlu Perbaikan'
        ],

        datasets: [{

            data: [
                {{ $sangatBaik }},
                {{ $baik }},
                {{ $cukup }},
                {{ $perluPerbaikan }}
            ],

            backgroundColor: [
                '#22c55e',
                '#3b82f6',
                '#facc15',
                '#ef4444'
            ],

            borderWidth: 3,
            hoverOffset: 15

        }]

    },

    options: {

        responsive: true,
        maintainAspectRatio: false,

        plugins: {

            legend: {
                position: 'bottom'
            }

        }

    }

});

</script>

@endsection
