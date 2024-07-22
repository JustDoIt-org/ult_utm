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
        $data = [
            'title' => 'Homepage',
            'list_layanan' =>
            [
                [
                    'title' => 'Visit UTM',
                    'desc' => 'Visit UTM adalah layanan untuk melakukan kunjungan ke UTM',
                    'link' => 'visit.schedules'
                ],
                [
                    'title' => 'PPID',
                    'desc' => 'PPID atau Pejabat Pengelola Informasi dan Dokumentasi adalah layanan untuk melakukan permintaan data ke UTM',
                    "link" => 'ppid.request'
                ],
                [
                    'title' => 'Layanan Terpadu',
                    'desc' => 'layanan terpadu adalah tempat untuk melakukan beberapa layanan sekaligus',
                    "link" => 'lt.home'
                ],
            ],
            'faq' => Faq::orderBy('created_at', 'desc')->limit(4)->get(),
            'about' => About::first(),

        ];

        // [
        //     'items' => $this->items,
        //     'about' => About::first(),
        //     'carousel' => Carousel::all(),
        //     'faq' => Faq::orderBy('created_at', 'desc')->limit(4)->get(),
        // ]

        return view('pages.ult.ult-page', $data);
    }
}
