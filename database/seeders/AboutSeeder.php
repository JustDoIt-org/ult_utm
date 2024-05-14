<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\About::create([
            'title' => 'Tentang ULT',
            'desc' => 'Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura memberikan manfaat yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan masyarakat dengan mengintegrasikan layanan publik di Kantor Manajemen Universitas Trunojoyo Madura. Melalui ULT, proses pemantauan dokumen yang diajukan pemohon menjadi lebih efisien, sementara perolehan informasi publik dan proses layanan kepada mahasiswa/masyarakat menjadi lebih cepat dan akurat. ULT hadir untuk memberikan solusi terhadap kebutuhan informasi masyarakat dengan menyediakan layanan baik secara langsung di kantor ULT maupun daring melalui akses internet, sesuai dengan ketentuan yang berlaku dan komitmen untuk meningkatkan efisiensi, efektivitas, serta integritas dalam pelayanan publik.'
        ]);
    }
}
