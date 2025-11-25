<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shipments', ShipmentController::class)
   ->parameters(['shipments' => 'shipment']);

//Route::get('/shipments/{shipment}', [ShipmentController::class, 'permalink'])->name('shipments.permalink');
