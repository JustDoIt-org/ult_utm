<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class ULTInformationsController extends Controller
{

    public function index()
    {
        return view("pages.admin.ult-informations.ult-informations-page");
    }
}
