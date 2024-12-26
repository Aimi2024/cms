<?php
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/medicine/deductedtable', function () {
    return view('medicine.deducted-table-medicine');
});

Route::get('/equipments/addequipments', function () {
    return view('equipments.eq-add');
});



Route::get('/equipments/deductequipments', function () {
    return view('equipments.eq-deduct');
});

Route::get('/equipments/deducttable', function () {
    return view('equipments.eq-deduct-table');
});


// Medicine route (view all medicines and search)
Route::get('/medicine', [MedicineController::class, 'showAllMedicines'])
    ->name('medicine.index');

// Equipments route
Route::get('/equipments', function () {
    return view('equipments');
})->name('equipments.index');

// Accounts route
// Route::get('/account', function () {
//     return view('accounts');
// })->name('accounts.index');

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

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    Route::get('/account', [RegisteredUserController::class, 'create'])->name('accounts.create');
    Route::post('/account', [RegisteredUserController::class, 'store'])->name('accounts.store');
    Route::get('/account/register', [RegisteredUserController::class, 'createAccount'])->name('accounts.register');

});


    Route::middleware('guest')->group(function () {
        Route::get('/', [SessionController::class, 'create'])->name('login');
        Route::post('/', [SessionController::class, 'store']);

    });
