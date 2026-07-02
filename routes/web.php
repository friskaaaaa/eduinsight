<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObservasiController;
use App\Http\Controllers\EvaluasiController;
use App\Models\Observasi;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $sangatBaik = Observasi::where('kategori', 'Sangat Baik')->count();
    $baik = Observasi::where('kategori', 'Baik')->count();
    $cukup = Observasi::where('kategori', 'Cukup')->count();
    $perluPerbaikan = Observasi::where('kategori', 'Perlu Perbaikan')->count();

    $observasiTerbaru = Observasi::latest()->take(5)->get();

    $totalObservasi = Observasi::count();

    $rataRata = round(
        Observasi::avg('total_nilai') ?? 0,
        0
    );

    $guruTerbaik = Observasi::orderByDesc('total_nilai')->first();

    return view('dashboard', compact(
        'totalObservasi',
        'sangatBaik',
        'baik',
        'cukup',
        'perluPerbaikan',
        'rataRata',
        'guruTerbaik',
        'observasiTerbaru'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('observasi', ObservasiController::class);

    Route::get('/riwayat-observasi', [ObservasiController::class, 'riwayat'])
        ->name('observasi.riwayat');

    Route::get('/laporan', [ObservasiController::class, 'laporan'])
        ->name('laporan.index');

    Route::get('/laporan/pdf', [ObservasiController::class, 'pdf'])
        ->name('laporan.pdf');

    Route::get('/evaluasi', [EvaluasiController::class, 'index'])
        ->name('evaluasi.index');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::view('/pengaturan', 'pengaturan.index')
        ->name('pengaturan.index');
});

require __DIR__.'/auth.php';