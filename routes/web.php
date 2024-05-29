<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\ULTInformationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ppid\PpidController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ppid\RequestController;
use App\Http\Controllers\Visit\ScheduleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Visit\SubmissionController;
use App\Http\Controllers\Ppid\FormKeberatanController;
use App\Http\Controllers\Ppid\AspirasiPengaduanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ultController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\ChatBot\ChatBotController@handle');

// Admin
Route::middleware(['auth', 'verified', 'can:dashboard index'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->can('user index')->name('admin.users');
    Route::get('/roles', [RoleController::class, 'index'])->can('role index')->name('admin.roles');
    Route::get('/faqs', [FaqController::class, 'index'])->can('faq index')->name('admin.faqs');
    Route::get('/ult-informations', [ULTInformationsController::class, 'index'])->can('ult-informations index')->name('admin.ult-informations');
});

// Visit
Route::get('/visit', [ScheduleController::class, 'index'])->name('visit.schedules');
Route::get('/visit/submissions', [SubmissionController::class, 'index'])->name('visit.submissions');



// Ppid
Route::middleware(['auth', 'verified'])->prefix('ppid')->group(function () {
    Route::get('/', [PpidController::class, 'request'])->name('ppid.request');
    Route::get('/form_keberatan', [PpidController::class, 'keberatan'])->name('ppid.keberatan');
    Route::get('/aspirasi_pengaduan', [PpidController::class, 'aspirasi_pengaduan'])->name('ppid.aspirasi-pengaduan');
    Route::get('/survey', [PpidController::class, 'survey'])->name('ppid.survey');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', \App\Livewire\Profile\ProfilePage::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
