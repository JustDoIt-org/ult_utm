<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class InformasiKoutaController extends Controller
{
    public function index() {
        return view('pages.admin.visit.informasi-kouta.informasi-kouta-page');
    }
}
