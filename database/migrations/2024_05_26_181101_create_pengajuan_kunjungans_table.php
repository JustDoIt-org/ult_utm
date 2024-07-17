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
        Schema::create('pengajuan_kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('informasi_kouta_id')->constrained();
            $table->string('tujuan_kegiatan');
            $table->string('asal_sekolah');
            $table->string('provinsi_asal');
            $table->string('kota_asal');
            $table->string('nama_kegiatan');
            $table->integer('kapasitas_peserta')->nullable();
            $table->integer('jumlah_bus')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('kontak_pic')->nullable();
            $table->string('surat_permohonan')->nullable();
            $table->enum('progress', ['belum', 'diproses', 'selesai']);
            $table->enum('tipe_kunjungan', ['sekolah', 'umum', 'langsung']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kunjungans');
    }
};
