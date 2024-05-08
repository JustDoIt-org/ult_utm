<?php

namespace App\Http\Controllers\Ppid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormKeberatanController extends Controller
{
    public function index()
    {
        $data = ["title" => "Form Keberatan"];
        return view('pages.ppid.keberatan', $data);
    }
}
