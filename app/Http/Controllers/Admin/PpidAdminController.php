<?php

namespace App\Http\Controllers\Admin;

use App\Models\SurveyPpid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PpidAdminController extends Controller
{
    public function survey()
    {
        $hasil = SurveyPpid::select(['name', 'id'])->get();
        $data = ["title" => "Survey", "hasil" => $hasil, 'page' => 'survey'];
        return view('pages.admin.ppid.template-ppid', $data);
    }

    public function request()
    {
        $data = ['title' => 'Form Permohonan Informasi Publik', 'subTitle' => 'Pejabat Pengelola Informasi dan Dokumentasi', 'page' => 'request'];
        return view('pages.admin.ppid.template-ppid', $data);
    }

    public function aspirasi_pengaduan()
    {

        $data = ["title" => "Aspirasi dan Pengaduan", "page" => "aspirasi_pengaduan"];
        return view('pages.admin.ppid.template-ppid', $data);
    }
}
