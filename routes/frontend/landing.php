<?php

use App\Http\Controllers\trackingController;
use Illuminate\Support\Facades\Route;

Route::get('company_profile', [trackingController::class, 'compro']);

Route::get('tracking', [trackingController::class, 'index'])->name('get-tracking');
Route::get('scantracking', [trackingController::class, 'scan'])->name('scan-tracking');
Route::post('tracking', [trackingController::class, 'search'])->name('post-tracking');
