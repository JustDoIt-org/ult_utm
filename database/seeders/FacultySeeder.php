<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tb_unit = array(
            array('name' => 'Fakultas HUKUM', 'code' => 'F-1'),
            array('name' => 'Fakultas PERTANIAN', 'code' => 'F-2'),
            array('name' => 'Fakultas EKONOMI DAN BISNIS', 'code' => 'F-3'),
            array('name' => 'Fakultas TEKNIK', 'code' => 'F-4'),
            array('name' => 'Fakultas ILMU SOSIAL DAN ILMU BUDAYA', 'code' => 'F-5'),
            array('name' => 'Fakultas KEISLAMAN', 'code' => 'F-6'),
            array('name' => 'Fakultas ILMU PENDIDIKAN', 'code' => 'F-7'),
            array('name' => 'Jurusan ILMU HUKUM', 'code' => 'J-1'),
            array('name' => 'Jurusan ILMU SOSIAL DAN BUDAYA', 'code' => 'J-10'),
            array('name' => 'Jurusan ILMU KEISLAMAN', 'code' => 'J-11'),
            array('name' => 'Jurusan ILMU PENDIDIKAN', 'code' => 'J-12'),
            array('name' => 'Jurusan ILMU DAN TEKNOLOGI PERTANIAN', 'code' => 'J-2'),
            array('name' => 'Jurusan KELAUTAN DAN PERIKANAN', 'code' => 'J-3'),
            array('name' => 'Jurusan MANAJEMEN', 'code' => 'J-4'),
            array('name' => 'Jurusan AKUNTANSI', 'code' => 'J-5'),
            array('name' => 'Jurusan ILMU EKONOMI', 'code' => 'J-6'),
            array('name' => 'Jurusan TEKNIK INDUSTRI DAN TEKNIK MESIN', 'code' => 'J-7'),
            array('name' => 'Jurusan TEKNIK INFORMATIKA', 'code' => 'J-8'),
            array('name' => 'Jurusan TEKNIK ELEKTRO', 'code' => 'J-9'),
            array('name' => 'ILMU HUKUM', 'code' => 'P-1'),
            array('name' => 'TEKNIK INFORMATIKA', 'code' => 'P-10'),
            array('name' => 'MANAJEMEN INFORMATIKA', 'code' => 'P-11'),
            array('name' => 'SOSIOLOGI', 'code' => 'P-12'),
            array('name' => 'ILMU KOMUNIKASI', 'code' => 'P-13'),
            array('name' => 'PSIKOLOGI', 'code' => 'P-14'),
            array('name' => 'SASTRA INGGRIS', 'code' => 'P-15'),
            array('name' => 'EKONOMI SYARIAH', 'code' => 'P-16'),
            array('name' => 'HUKUM BISNIS SYARIAH', 'code' => 'P-17'),
            array('name' => 'PGSD', 'code' => 'P-18'),
            array('name' => 'TEKNIK MULTIMEDIA DAN JARINGAN', 'code' => 'P-19'),
            array('name' => 'TEKNOLOGI INDUSTRI PERTANIAN', 'code' => 'P-2'),
            array('name' => 'MEKATRONIKA', 'code' => 'P-20'),
            array('name' => 'D3 AKUNTANSI', 'code' => 'P-21'),
            array('name' => 'MAGISTER MANAJEMEN', 'code' => 'P-22'),
            array('name' => 'TEKNIK ELEKTRO', 'code' => 'P-23'),
            array('name' => 'MAGISTER ILMU HUKUM', 'code' => 'P-24'),
            array('name' => 'MAGISTER AKUNTANSI', 'code' => 'P-25'),
            array('name' => 'D3 ENTERPRENEURSHIP', 'code' => 'P-26'),
            array('name' => 'PENDIDIKAN BHS DAN SASTRA INDONESIA', 'code' => 'P-27'),
            array('name' => 'PENDIDIKAN INFORMATIKA', 'code' => 'P-28'),
            array('name' => 'PENDIDIKAN IPA', 'code' => 'P-29'),
            array('name' => 'AGRIBISNIS', 'code' => 'P-3'),
            array('name' => 'PGPAUD', 'code' => 'P-30'),
            array('name' => 'SISTEM INFORMASI', 'code' => 'P-31'),
            array('name' => 'TEKNIK MESIN', 'code' => 'P-32'),
            array('name' => 'TEKNIK MEKATRONIKA', 'code' => 'P-33'),
            array('name' => 'MANAJEMEN SUMBERDAYA PERAIRAN', 'code' => 'P-35'),
            array('name' => 'MAGISTER ILMU EKONOMI', 'code' => 'P-36'),
            array('name' => 'MAGISTER PENGELOLAAN SUMBER DAYA ALAM', 'code' => 'P-37'),
            array('name' => 'AGROTEKNOLOGI', 'code' => 'P-4'),
            array('name' => 'ILMU KELAUTAN', 'code' => 'P-5'),
            array('name' => 'EKONOMI PEMBANGUNAN', 'code' => 'P-6'),
            array('name' => 'MANAJEMEN', 'code' => 'P-7'),
            array('name' => 'AKUNTANSI', 'code' => 'P-8'),
            array('name' => 'TEKNIK INDUSTRI', 'code' => 'P-9'),
            array('name' => 'UNIVERSITAS TRUNOJOYO MADURA', 'code' => 'U-1')
        );


        foreach ($tb_unit as $key) {
            \App\Models\Faculty::create([
                'name' => $key['name'],
                'code' => $key['code']
            ]);
        }
    }
}
