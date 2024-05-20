<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Faq;

class ultController extends Controller
{
    public $items = [
        ["name" => "PPID", "link" => '/ppid'],
        ["name" => "Visit", "link" => '/visit'],
    ];
    public function index()
    {
        return view('pages.ult.ult-page', [
            'items' => $this->items,
            'about' => About::first(),
            'carousel' => Carousel::all(),
            'faq' => Faq::orderBy('created_at','desc')->limit(5)->get(),
        ]);
    }
}
