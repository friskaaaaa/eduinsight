<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('observasis', function (Blueprint $table) {
            $table->id();

            // Data Guru
            $table->string('nama_guru');
            $table->string('mata_pelajaran')->nullable();

            // Data Observasi
            $table->date('tanggal_observasi');

            // Penilaian
            $table->integer('persiapan');
            $table->integer('pelaksanaan');
            $table->integer('penilaian');
            $table->integer('pengelolaan_kelas');

            // Hasil Akhir
            $table->integer('total_nilai')->nullable();
            $table->string('kategori')->nullable();

            // Catatan
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasis');
    }
};