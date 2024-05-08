<?php

namespace App\Http\Controllers\Ppid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $data = ["title" => "Survey"];
        return view('pages.ppid.survey', $data);
    }
}
