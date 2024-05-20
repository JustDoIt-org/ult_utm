<?php

namespace App\Http\Controllers\Ppid;

use App\Models\SurveyPpid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PpidController extends Controller
{
    public function survey()
    {
        $hasil = SurveyPpid::select(['name', 'id'])->get();
        $data = ["title" => "Survey", "hasil" => $hasil, 'page' => 'survey'];
        return view('pages.ppid.template-ppid', $data);
    }

    public function request()
    {
        $data = ['title' => 'Form Permohonan Informasi Publik', 'subTitle' => 'Pejabat Pengelola Informasi dan Dokumentasi'];
        return view('pages.ppid.request', $data);
    }

    public function keberatan()
    {
        $data = ["title" => "Form Keberatan", "page" => "keberatan"];
        return view('pages.ppid.template-ppid', $data);
    }

    public function aspirasi_pengaduan()
    {
        $data = ["title" => "Aspirasi dan Pengaduan"];
        return view('pages.ppid.aspirasi-pengaduan', $data);
    }
}
