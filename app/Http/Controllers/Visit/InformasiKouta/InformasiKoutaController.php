<?php

namespace App\Http\Controllers\Visit\InformasiKouta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiKoutaController extends Controller
{
    public function index() {
        return view('pages.visit.informasi-kouta.informasi-kouta-page');
    }
}
