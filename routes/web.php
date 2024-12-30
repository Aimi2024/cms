<?php
use App\Http\Controllers\DeductEquipmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeductedMedicineController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Equipment routes
    Route::get('/equipments', [EquipmentController::class, 'showAllEquipments'])->name('equipment.index');
    Route::get('/equipment/add', [EquipmentController::class, 'showAddForm'])->name('equipment.add');
    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/equipment/deduct/{eq_id}', [EquipmentController::class, 'showDeductForm'])->name('equipment.deduct');
    Route::post('/equipment/deduct/{eq_id}', [EquipmentController::class, 'deduct'])->name('equipment.deduct.store');
    Route::delete('/equipment/{eq_id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
    Route::get('/equipment/deductedtable', [DeductEquipmentController::class, 'index'])->name('equipmentdeducted.index');
    Route::delete('/equipment/deducted/{deductEquipment}', [DeductEquipmentController::class, 'destroy'])->name('equipmentdeducted.destroy');


    // Medicine routes
    Route::get('/medicine', [MedicineController::class, 'showAllMedicines'])->name('medicine.index');
    Route::get('/medicine/deductedtable', [DeductedMedicineController::class, 'index'])->name('medicinededucted.index');
    Route::delete('/medicine/deducted/{deductedMedicine}', [DeductedMedicineController::class, 'destroy'])->name('medicine.delete');

    // Add medicine
    Route::get('/medicine/addmedicine', [MedicineController::class, 'index'])->name('medicine.add');
    Route::post('/medicine/addmedicine', [MedicineController::class, 'store'])->name('medicine.store');

    // Deduct medicine
    Route::get('/medicine/deduct/{id}', [MedicineController::class, 'showDeductForm'])->name('medicine.deductshow');
    Route::post('/medicine/deduct/{id}', [MedicineController::class, 'deduct'])->name('medicine.deduct');

    // Account management routes
    Route::get('/accounts/{user}/edit', [RegisteredUserController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{user}', [RegisteredUserController::class, 'update'])->name('accounts.update');
    Route::get('/account', [RegisteredUserController::class, 'create'])->name('accounts.create');
    Route::post('/account', [RegisteredUserController::class, 'store'])->name('accounts.store');
    Route::get('/account/register', [RegisteredUserController::class, 'createAccount'])->name('accounts.register');

    // Logout route
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});

    Route::middleware('guest')->group(function () {
        Route::get('/', [SessionController::class, 'create'])->name('login');
        Route::post('/', [SessionController::class, 'store']);

    });