<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\equipment;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $medicineCount = Medicine::whereBetween('m_stock', [1, 8])->count();
        $equipmentCount = equipment::whereBetween('stock', [1, 8])->count();

        $lowStockItems = $medicineCount + $equipmentCount;


        $newMedicineCount = Medicine::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $newEquipmentCount = equipment::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $newStock = $newEquipmentCount + $newMedicineCount;

        $expiredMedicine = Medicine::where('m_date_expired','<', Carbon::now())->count();
        $expiredEquipmemts = equipment::where('service_life_end','<', Carbon::now())->count();

        $expiredItems   = $expiredEquipmemts + $expiredMedicine;

        return view('dashboard', compact('lowStockItems', 'newStock','expiredItems'));
        // return view("dashboard");
    }





}
