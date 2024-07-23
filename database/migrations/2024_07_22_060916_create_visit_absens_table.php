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
        Schema::create('visit_absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_kunjungan')->constrained('pengajuan_kunjungans'); //get code_absen
            $table->string('code_absen')->nullable(); //null jika kunjungan langsung
            $table->enum('absen', ['belum', 'sudah']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_absens');
    }
};
