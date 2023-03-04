<?php

use App\Http\Controllers\ComproController;
use App\Http\Controllers\trackingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [comproController::class, 'compro'])->name('compro');
// Route::get('tracking_resi', [comproController::class, 'comptrack']);

Route::get('tracking', [trackingController::class, 'index'])->name('get-tracking');
Route::get('scantracking', [trackingController::class, 'scan'])->name('scan-tracking');
Route::post('tracking', [trackingController::class, 'search'])->name('post-tracking');
