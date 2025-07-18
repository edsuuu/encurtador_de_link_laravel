<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;


Route::get('/', [ShortUrlController::class, 'index'])->name('index');

Route::view('/generate','shortener.generate')->name('generate');

Route::get('redirect/{encodeUrl}', [ShortUrlController::class, 'validateUrlAndCountView'])->name('redirect');

Route::view('dashboard','shortener.dashboard')->name('dashboard');
