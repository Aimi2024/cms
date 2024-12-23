<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');  // Fix view syntax
})->name('dashboard');

// Medicine route (view all medicines)
Route::get('/medicine', function () {
    return view(view: 'medicine');  // Fix view syntax
})->name('dashboard');

// Equipments route
Route::get('/equipments', function () {
    return view('equipments');
})->name('equipments.index');

// Accounts route
Route::get('/accounts', function () {
    return view('accounts');
})->name('accounts.index');

// Medicine Controller routes
Route::get('/medicine/addmedicine', [MedicineController::class, 'index'])  // Show form to add new medicine
    ->name('medicine.add');

Route::post('/medicine/addmedicine', [MedicineController::class, 'store'])  // Store new medicine
    ->name('medicine.store');
