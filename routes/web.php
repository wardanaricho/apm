<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('apm');
});

Route::get('/antrian-view', [AntrianController::class, 'antrianView'])->name('antrian.view');
Route::post('/antrian-ambil/{kode}', [AntrianController::class, 'antrianAmbil'])->name('antrian.ambil');
