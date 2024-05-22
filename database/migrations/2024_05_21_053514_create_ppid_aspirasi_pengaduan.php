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
        Schema::create('ppid_aspirasi_pengaduans', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained();
            $table->enum('jenis', ['aspirasi', 'pengaduan']);
            $table->enum('progress', ['belum', 'diproses', 'selesai']);
            $table->string('nik');
            $table->string('Judul');
            $table->text('uraian');
            $table->text('saran');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppid_aspirasi_pengaduan');
    }
};
