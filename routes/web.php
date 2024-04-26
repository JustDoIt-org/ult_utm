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

Route::get('/ppid/objection', function () {
    return view('ppid.objection');
})->name("ppid.objection");

Route::get('/ppid/complaint', function () {
    return view('ppid.complaint');
})->name("ppid.complaint");

Route::get('/ppid/survey', function () {
    return view('ppid.survey');
})->name("ppid.survey");
