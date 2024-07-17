<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestPpidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\StatusPpid::create([
            'user_id' => 1,
            'progress' => 'belum',
            'uraian' => 'Ingin mengajukan permohonan permintaan data di UTM',
            'file' => '/request/try.png',
            'type' => 'request',
        ]);
        \App\Models\StatusPpid::create([
            'user_id' => 3,
            'progress' => 'diproses',
            'uraian' => 'Ingin mengajukan permohonan permintaan data di UTM',
            'file' => '/request/try.png',
            'type' => 'request',
        ]);
        \App\Models\StatusPpid::create([
            'user_id' => 4,
            'progress' => 'selesai',
            'uraian' => 'Ingin mengajukan permohonan permintaan data di UTM',
            'file' => '/request/try.png',
            'type' => 'request',
        ]);
        \App\Models\RequestPpid::create([
            'slug' => '1Rjkhaskdsdsa',
            'status_ppid' => 1,
            'alamat' => 'jl anjasmoro no 27',
            'pekerjaan' => 'Eat, Sleep, Repeat',
            'kategori_pemohon' => 'perorangan',
            'rincian_informasi' => 'informasi KTM',
            'tujuan_penggunaan' => 'Ingin meneliti tentang gundam',
            'memperoleh_informasi' => 'Membaca/Melihat Secara Langsung',
        ]);

        \App\Models\RequestPpid::create([
            'slug' => '1Rjkhaskdsdsa',
            'status_ppid' => 3,
            'alamat' => 'jl anjasmoro no 27',
            'pekerjaan' => 'Eat, Sleep, Repeat',
            'kategori_pemohon' => 'perorangan',
            'rincian_informasi' => 'informasi KTM',
            'tujuan_penggunaan' => 'Ingin meneliti tentang gundam',
            'memperoleh_informasi' => 'Membaca/Melihat Secara Langsung',
        ]);
        \App\Models\RequestPpid::create([
            'slug' => '1Rjkhaskdsdsa',
            'status_ppid' => 2,
            'alamat' => 'jl anjasmoro no 27',
            'pekerjaan' => 'Eat, Sleep, Repeat',
            'kategori_pemohon' => 'perorangan',
            'rincian_informasi' => 'informasi KTM',
            'tujuan_penggunaan' => 'Ingin meneliti tentang gundam',
            'memperoleh_informasi' => 'Membaca/Melihat Secara Langsung',
        ]);
    }
}
