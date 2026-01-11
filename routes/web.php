<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;


Route::get('/depan', [DepanController::class, 'index']);

// halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');

// proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return redirect()->route('portfolio.index');
    })->name('dashboard');

    Route::resource('portfolio', PortfolioController::class);
    Route::resource('about', AboutController::class);
});

Route::resource('resume', ResumeController::class);

Route::resource('blog', BlogController::class);

Route::resource('project', ProjectController::class);

Route::resource('contact', ContactController::class);

Route::resource('skill', SkillController::class);

// Route::resource('service', ServiceController::class);




Route::fallback(function () {
    return redirect('/login');
});
