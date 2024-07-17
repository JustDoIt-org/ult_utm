<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananTerpaduController extends Controller
{
    public function index()
    {
        return view('pages.terpadu.index', ['title' => 'layanan terpadu']);
    }

    public function riwayat()
    {
        return view('pages.terpadu.riwayat', ['title' => 'Riwayat Pengajuan']);
    }
}
