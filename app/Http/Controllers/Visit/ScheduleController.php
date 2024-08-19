<?php

namespace App\Http\Controllers\Visit;

use App\Models\InformasiKouta;
use App\Models\KodeKunjunganModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScheduleController extends Controller
{

    public function index()
    {
        $kode_kunjungan = KodeKunjunganModel::firstOrCreate(['created_at' => now()->today()], ['code' => KodeKunjunganModel::count() . rand(000000, 999999)])->get();
        $kode_absensi = Crypt::encryptString(bcrypt($kode_kunjungan[0]->code));


        return view('pages.visit.schedules', [
            'information_kouta' => InformasiKouta::with('faculty')->get(),
            'qrcode' => QrCode::generate(
                url('konfirmasi-absensi/' . $kode_absensi)
            )
        ]);
    }
}
