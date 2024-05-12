<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ULTInformationsController extends Controller
{

    public function index()
    {
        return view("pages.ult-informations.ult-informations-page");
    }
}
