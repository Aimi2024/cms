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
// Route::get('/medicine/{id}/edit', [MedicineController::class, 'edit'])
//     ->name('medicine.edit');

    // Route::get('/medicine/deduct/{id}', function($id) {
    //     $medicine = \App\Models\Medicine::find($id);

    //     if (!$medicine) {
    //         abort(404);
    //     }

    //     return view('medicine.deduct-medicine', ['medicine' => $medicine]);
    // })->name('medicine.deductshow');


    Route::get('/medicine/deduct/{id}', [MedicineController::class, 'showDeductForm'])->name('medicine.deductshow');

    Route::post('/medicine/deduct/{id}', [MedicineController::class, 'deduct'])->name('medicine.deduct');





