<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanKunjunganController extends Controller
{
    public function index() {
        return view('pages.admin.visit.pengajuan-kunjungan.pengajuan-kunjungan-page');
    }
}
