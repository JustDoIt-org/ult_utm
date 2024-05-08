<?php

namespace App\Http\Controllers\Ppid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspirasiPengaduanController extends Controller
{
    public function index()
    {
        $data = ["title" => "Aspirasi dan Pengaduan"];
        return view('pages.ppid.aspirasi-pengaduan', $data);
    }
}
