<?php

namespace App\Http\Controllers;

use App\Models\Observasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $observasis = Observasi::latest()->get();

        $totalObservasi = $observasis->count();

        $rataRata = round(
            $observasis->avg('total_nilai') ?? 0,
            0
        );

        $guruTerbaik = $observasis
            ->sortByDesc('total_nilai')
            ->first();

        $kategoriDominan = $observasis
            ->groupBy('kategori')
            ->map(function ($item) {
                return $item->count();
            })
            ->sortDesc()
            ->keys()
            ->first();

        $chartLabels = $observasis->pluck('nama_guru');
        $chartData = $observasis->pluck('total_nilai');

        return view('evaluasi.index', compact(
            'observasis',
            'totalObservasi',
            'rataRata',
            'guruTerbaik',
            'kategoriDominan',
            'chartLabels',
            'chartData'
        ));
    }
}