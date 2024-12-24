<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Medicine route (view all medicines and search)
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

// Deduct Medicine Routes
Route::get('/medicine/deduct/{id}', [MedicineController::class, 'showDeductForm'])
    ->name('medicine.deductshow');

Route::post('/medicine/deduct/{id}', [MedicineController::class, 'deduct'])
    ->name('medicine.deduct');
