<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        return view('pages.visit.schedules');
    }
}
