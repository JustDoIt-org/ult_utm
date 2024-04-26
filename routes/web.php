<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/users', function () {
    return view('admin.users');
});

Route::get('/schedules', function () {
    return view('admin.schedules');
});
