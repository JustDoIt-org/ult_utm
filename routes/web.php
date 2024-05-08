<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ppid\SurveyController;
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

// Admin
Route::middleware(['auth', 'verified', 'can:dashboard index'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->can('user index')->name('admin.users');
    Route::get('/roles', [RoleController::class, 'index'])->can('role index')->name('admin.roles');
});

// Visit
Route::get('/visit', [ScheduleController::class, 'index'])->name('visit.schedules');
Route::get('/visit/submissions', [SubmissionController::class, 'index'])->name('visit.submissions');

// Ppid
Route::prefix('ppid')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('ppid.request');
    Route::get('/form_keberatan', [FormKeberatanController::class, 'index'])->name('ppid.keberatan');
    Route::get('/aspirasi_pengaduan', [AspirasiPengaduanController::class, 'index'])->name('ppid.aspirasi-pengaduan');
    Route::get('/survey', [SurveyController::class, 'index'])->name('ppid.survey');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', \App\Livewire\Profile\ProfilePage::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/users', \App\Livewire\User\UserTable::class)->can('user index')->name('user.index');
    // Route::get('/roles', \App\Livewire\Role\RoleTable::class)->can('role index')->name('role.index');
});

require __DIR__ . '/auth.php';
