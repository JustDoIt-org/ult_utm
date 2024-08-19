<?php

namespace App\Http\Controllers\Visit;

use App\Models\InformasiKouta;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScheduleController extends Controller
{

    public function index()
    {
        return view('pages.visit.schedules', [
            'information_kouta' => InformasiKouta::with('faculty')->get(),
            'qrcode' => QrCode::generate(
                route('konfirmasi-absensi')
            )
        ]);
    }
}
