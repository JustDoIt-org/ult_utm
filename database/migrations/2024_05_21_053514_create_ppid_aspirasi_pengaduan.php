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
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignId('status_ppid')->constrained();
            $table->string('nik');
            $table->string('judul');
            $table->text('saran');
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
