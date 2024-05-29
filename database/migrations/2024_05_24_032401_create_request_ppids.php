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
        Schema::create('request_ppids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('status_ppid')->constrained();
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('kategori_pemohon');
            $table->string('rincian_informasi');
            $table->string('tujuan_penggunaan');
            $table->string('memperoleh_informasi');
            $table->string('memperoleh_salinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_ppids');
    }
};
