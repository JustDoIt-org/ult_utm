<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    public function index()
    {
        return view("pages.admin.faculties.faculties-page");
    }
}
