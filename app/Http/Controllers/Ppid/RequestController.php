<?php

namespace App\Http\Controllers\Ppid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Form Permohonan Informasi Publik', 'subTitle' => 'Pejabat Pengelola Informasi dan Dokumentasi'];
        return view('pages.ppid.request', $data);
    }
}
