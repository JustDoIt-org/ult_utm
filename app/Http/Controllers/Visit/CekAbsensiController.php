<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekAbsensiController extends Controller
{
    public function index() {
        return view('pages.visit.cek-absensi-page');
    }
}
