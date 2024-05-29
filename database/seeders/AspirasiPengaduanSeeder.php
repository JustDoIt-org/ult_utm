<?php

namespace Database\Seeders;

use App\Models\PpidAspirasiPengaduan;
use App\Models\StatusPpid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspirasiPengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPpid::create([
            'user_id' => 1,
            'progress' => 'belum',
            'uraian' => 'dsadasdd',
            'file' => 'dsadas',
            'type' => 'testing',
        ]);

        PpidAspirasiPengaduan::create([
            'judul' => 'jsdhjhadjashdj',
            'status_ppid' => 1,
            'nik' => 3343443,
            'saran' => 'helloooo',
        ]);
    }
}
