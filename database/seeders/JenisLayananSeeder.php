<?php

namespace Database\Seeders;

use App\Models\JenisLayananModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arr = [
            'Layanan Akademik',
            'Layanan Kemahasiswaan',
            'Layanan Keuangan',
            'Layanan Umum',
            'Layanan Kerjasama',
            'Layanan Kunjungan Sekolah',
            'Lainnya'
        ];


        foreach ($arr as $key) {
            if ($key == 'Lainnya') {
                JenisLayananModel::create([
                    'type' => $key,
                    'ekstra_field' => 'iya'
                ]);
            } else {
                JenisLayananModel::create([
                    'type' => $key
                ]);
            }
        }
    }
}
