<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Equipment;
use App\Models\Medicine;
use Illuminate\Http\Request;

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

        // Expired items count
        $expiredMedicineCount = Medicine::where('m_date_expired', '<', Carbon::now())->count();
        $expiredEquipmentCount = Equipment::where('service_life_end', '<', Carbon::now())->count();
        $expiredItems = $expiredMedicineCount + $expiredEquipmentCount;

        // Data for bar chart (Stock Levels)
        $medicines = Medicine::select('m_name as name', 'm_stock as stock')->get();
        $equipments = Equipment::select('eq_name as name', 'stock')->get();

        $medicineLabels = $medicines->pluck('name');
        $equipmentLabels = $equipments->pluck('name');
        $medicineData = $medicines->pluck('stock');
        $equipmentData = $equipments->pluck('stock');

        // Data for pie chart (Expired Items)
        $expiredMedicines = Medicine::select('m_name as name', 'm_stock as stock')
            ->where('m_date_expired', '<', Carbon::now())->get();

        $expiredEquipments = Equipment::select('eq_name as name', 'stock')
            ->where('service_life_end', '<', Carbon::now())->get();

        $expiredLabels = $expiredMedicines->pluck('name')->merge($expiredEquipments->pluck('name'));
        $expiredData = $expiredMedicines->pluck('stock')->merge($expiredEquipments->pluck('stock'));

        // Pass data to the view
        return view('dashboard', compact(
            'lowStockItems',      // Low stock items count
            'newStock',           // New stock count
            'expiredItems',       // Expired items count
            'medicineLabels',     // Medicine names for bar chart
            'medicineData',       // Medicine stock data for bar chart
            'equipmentLabels',    // Equipment names for bar chart
            'equipmentData',      // Equipment stock data for bar chart
            'expiredLabels',      // Expired item names for pie chart
            'expiredData'         // Expired item stock data for pie chart
        ));
    }
}
