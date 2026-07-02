<?php

namespace App\Http\Controllers;

use App\Models\Observasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ObservasiController extends Controller
{
    private function adminOnly()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }
    }

    public function index()
    {
        $observasis = Observasi::latest()->get();

        return view('observasi.index', compact('observasis'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak');
        }

        return view('observasi.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak');
        }

        $validated = $request->validate([
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
            'tanggal_observasi' => 'required',
            'persiapan' => 'required|numeric',
            'pelaksanaan' => 'required|numeric',
            'penilaian' => 'required|numeric',
            'pengelolaan_kelas' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        $total =
            $validated['persiapan'] +
            $validated['pelaksanaan'] +
            $validated['penilaian'] +
            $validated['pengelolaan_kelas'];

        if ($total >= 340) {
            $kategori = 'Sangat Baik';
        } elseif ($total >= 280) {
            $kategori = 'Baik';
        } elseif ($total >= 220) {
            $kategori = 'Cukup';
        } else {
            $kategori = 'Perlu Perbaikan';
        }

        $validated['total_nilai'] = $total;
        $validated['kategori'] = $kategori;

        Observasi::create($validated);

        return redirect()
            ->route('observasi.index')
            ->with('success', 'Data observasi berhasil disimpan');
    }

    public function show(Observasi $observasi)
    {
        return view('observasi.show', compact('observasi'));
    }

    public function edit(Observasi $observasi)
    {
        return view('observasi.edit', compact('observasi'));
    }

    public function update(Request $request, Observasi $observasi)
    {
        $validated = $request->validate([
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
            'tanggal_observasi' => 'required',
            'persiapan' => 'required|numeric',
            'pelaksanaan' => 'required|numeric',
            'penilaian' => 'required|numeric',
            'pengelolaan_kelas' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        $total =
            $validated['persiapan'] +
            $validated['pelaksanaan'] +
            $validated['penilaian'] +
            $validated['pengelolaan_kelas'];

        if ($total >= 340) {
            $kategori = 'Sangat Baik';
        } elseif ($total >= 280) {
            $kategori = 'Baik';
        } elseif ($total >= 220) {
            $kategori = 'Cukup';
        } else {
            $kategori = 'Perlu Perbaikan';
        }

        $validated['total_nilai'] = $total;
        $validated['kategori'] = $kategori;

        $observasi->update($validated);

        return redirect()
            ->route('observasi.index')
            ->with('success', 'Data observasi berhasil diperbarui');
    }

    public function destroy(Observasi $observasi)
    {
        $this->adminOnly();

        $observasi->delete();

        return redirect()
            ->route('observasi.index')
            ->with('success', 'Data observasi berhasil dihapus');
    }

    public function riwayat(Request $request)
    {
        $keyword = $request->keyword;

        $observasis = Observasi::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_guru', 'like', "%{$keyword}%")
                  ->orWhere('mata_pelajaran', 'like', "%{$keyword}%");
        })
        ->latest()
        ->get();

        return view('observasi.riwayat', compact(
            'observasis',
            'keyword'
        ));
    }

    public function laporan()
    {
        $observasis = Observasi::latest()->get();

        return view('laporan.index', compact('observasis'));
    }

    public function pdf()
    {
        $this->adminOnly();

        $observasis = Observasi::latest()->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('observasis'));

        return $pdf->download('laporan-observasi.pdf');
    }
}
