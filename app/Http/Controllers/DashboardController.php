<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Equipment;
use App\Models\Medicine;

class DashboardController extends Controller
{
    public function index() {
        // Low stock count (1-8)
        $medicineCount = Medicine::whereBetween('m_stock', [1, 8])->count();
        $equipmentCount = Equipment::whereBetween('stock', [1, 8])->count();
        $lowStockItems = $medicineCount + $equipmentCount;

        // New stock added in the last week
        $newMedicineCount = Medicine::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $newEquipmentCount = Equipment::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $newStock = $newMedicineCount + $newEquipmentCount;

        // Expired items count (count of distinct items)
        $expiredMedicinesCount = Medicine::where('m_date_expired', '<', Carbon::now())->count();
        $expiredEquipmentCount = Equipment::where('service_life_end', '<', Carbon::now())->count();
        $expiredItems = $expiredMedicinesCount + $expiredEquipmentCount;

        // Data for bar chart (Stock Levels)
        $medicines = Medicine::select('m_name as name', 'm_stock as stock')->get();
        $equipments = Equipment::select('eq_name as name', 'stock')->get();

        $medicineLabels = $medicines->pluck('name');
        $equipmentLabels = $equipments->pluck('name');
        $medicineData = $medicines->pluck('stock');
        $equipmentData = $equipments->pluck('stock');

        // Pass data to the view
        return view('dashboard', compact(
            'lowStockItems',
            'newStock',
            'expiredItems',
            'medicineLabels',
            'medicineData',
            'equipmentLabels',
            'equipmentData',
            'expiredMedicinesCount',
            'expiredEquipmentCount'
        ));
    }
}
