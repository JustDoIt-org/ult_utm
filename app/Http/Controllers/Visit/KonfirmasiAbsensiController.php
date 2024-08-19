<?php

namespace App\Http\Controllers\Visit;

use Illuminate\Http\Request;
use App\Models\KodeKunjunganModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class KonfirmasiAbsensiController extends Controller
{
    public function index(string $kode)
    {
        try {
            $kode_decrypt = Crypt::decryptString($kode);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $ex) {
            return redirect()->route('visit.schedules');
        }
        $kode_kunjungan = KodeKunjunganModel::firstOrCreate(['created_at' => now()->today()], ['code' => KodeKunjunganModel::count() . rand(000000, 999999)])->get();
        if (password_verify($kode_kunjungan[0]->code, $kode_decrypt)) {
            return view('pages.visit.konfirmasi-absensi');
        } else {
            return redirect()->route('visit.schedules');
        }
    }
}
