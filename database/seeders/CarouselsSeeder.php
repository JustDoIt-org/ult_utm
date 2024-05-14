<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Carousel::create([
            'nameButton' => 'Layanan Kunjungan Sekolah',
            'linkButton' => '#',
            'photo' => 'carousel/hero-image-1.jpg'
        ]);

        \App\Models\Carousel::create([
            'nameButton' => 'Layanan Aspirasi & Pengaduan',
            'linkButton' => '#',
            'photo' => 'carousel/hero-image-2.jpg'
        ]);

        \App\Models\Carousel::create([
            'nameButton' => 'Layanan Kemahasiswaan',
            'linkButton' => '#',
            'photo' => 'carousel/hero-image-3.jpg'
        ]);

        \App\Models\Carousel::create([
            'nameButton' => 'Layanan Masyarakat',
            'linkButton' => '#',
            'photo' => 'carousel/hero-image-4.jpg'
        ]);

        \App\Models\Carousel::create([
            'nameButton' => 'Layanan Kunjungan Tamu',
            'linkButton' => '#',
            'photo' => 'carousel/hero-image-5.jpg'
        ]);
    }
}
