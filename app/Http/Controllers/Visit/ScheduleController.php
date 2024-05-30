<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Models\InformasiKouta;

class ScheduleController extends Controller
{

    public function index() {
        return view('pages.visit.schedules', [
            'information_kouta' => InformasiKouta::all(),
        ]);
    }
}
