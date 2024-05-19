<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyPpidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Kemudahan Pelayanan', 'Kecepatan Pelayanan', 'Akurasi Pelayanan', 'Biaya Pelayanan'];
        foreach ($data as $i) {
            \App\Models\SurveyPpid::create([
                'name' => $i,
            ]);
        }
    }
}
