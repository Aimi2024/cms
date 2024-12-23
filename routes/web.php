<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Medicine route (view all medicines via controller)
Route::get('/medicine', [MedicineController::class, 'showAllMedicines'])
    ->name('medicine.index');

// Equipments route
Route::get('/equipments', function () {
    return view('equipments');
})->name('equipments.index');

// Accounts route
Route::get('/accounts', function () {
    return view('accounts');
})->name('accounts.index');

// Medicine Controller routes
Route::get('/medicine/addmedicine', [MedicineController::class, 'index'])
    ->name('medicine.add');

Route::post('/medicine/addmedicine', [MedicineController::class, 'store'])
    ->name('medicine.store');

// Edit Medicine Route
Route::get('/medicine/{id}/edit', [MedicineController::class, 'edit'])
    ->name('medicine.edit');

Route::put('/medicine/{id}', [MedicineController::class, 'update'])
    ->name('medicine.update');


    route::view("/medicine/deduct","medicine.deduct-medicine")->name('medicine.deduct');