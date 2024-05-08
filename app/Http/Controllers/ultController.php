<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ultController extends Controller
{
    public $items = [
        ["name" => "PPID", "link" => '/ppid'],
        ["name" => "Visit", "link" => '/visit'],
    ];
    public function index()
    {
        return view('pages.ult.ult-page', ['items' => $this->items]);
    }
}
