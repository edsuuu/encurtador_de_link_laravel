<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;


Route::get('/', function () {
    return view('shortener.cordinates');
})->name('index');

Route::post('/geo', [ShortUrlController::class, 'index'])->name('redirect-person');
Route::get('/redi', [ShortUrlController::class, 'index'])->name('redi');

Route::view('/generate','shortener.generate')->name('generate');

Route::get('redirect/{encodeUrl}', [ShortUrlController::class, 'validateUrlAndCountView'])->name('redirect');

Route::view('dashboard','shortener.dashboard')->name('dashboard');
