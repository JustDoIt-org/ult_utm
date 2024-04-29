<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ultController extends Controller
{
    public $items = [["name" => "alvin", "link" => 'coba']];
    public function index()
    {
        return view('pages.ult.ult-page', ['items' => $this->items]);
    }
}
