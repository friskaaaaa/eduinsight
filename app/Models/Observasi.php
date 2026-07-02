<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observasi extends Model
{
    protected $fillable = [
        'nama_guru',
        'mata_pelajaran',
        'tanggal_observasi',
        'persiapan',
        'pelaksanaan',
        'penilaian',
        'pengelolaan_kelas',
        'total_nilai',
        'kategori',
        'catatan',
    ];
}