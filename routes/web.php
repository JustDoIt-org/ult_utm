<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name("admin.dashboard");

Route::get('/users', function () {
    return view('admin.users');
})->name("admin.users");

Route::get('/schedules', function () {
    return view('admin.schedules');
})->name("admin.schedules");
