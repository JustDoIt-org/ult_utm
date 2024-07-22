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
        return view('pages.terpadu.riwayat', ['title' => 'Riwayat Pengajuan', 'type' => 'l']);
    }

    public function list()
    {
        return view('pages.terpadu.riwayat', ['title' => 'Daftar Pengajuan', 'type' => 'list']);
    }

    public function dashboard()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_list', 'view' => 'admin']);
    }
    public function riwayat_admin()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin']);
    }

    public function chat_guest()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin']);
    }

    public function destroy()
    {
        dd('destroy');
    }
}
