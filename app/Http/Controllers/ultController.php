<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ultController extends Controller
{
    public $items = [
        ["name" => "Home", "link" => '#'],
        ["name" => "Tentang", "link" => '#'],
        ["name" => "Aspirasi", "link" => '#'],
        ["name" => "Kontak", "link" => '#'],
    ];
    public function index()
    {
        return view('pages.ult.ult-page', ['items' => $this->items]);
    }
}
