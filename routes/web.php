<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shipments', ShipmentController::class);
Route::get('/shipments/{shipment}', [ShipmentController::class, 'permalink'])->name('shipments.permalink');
