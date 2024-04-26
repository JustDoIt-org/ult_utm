<?php

use Illuminate\Support\Facades\Route;

// admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name("admin.dashboard");

Route::get('/admin/users', function () {
    return view('admin.users');
})->name("admin.users");

Route::get('/admin/schedules', function () {
    return view('admin.schedules');
})->name("admin.schedules");

// ppid

Route::get('/ppid', function () {
    return view('ppid.request');
})->name("ppid.request");
