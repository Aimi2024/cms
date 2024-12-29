<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\equipment;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view("dashboard");
    }


    public function dashboardData(){
        $medicineCount = Medicine::whereBetween('m_stock', [1, 8])->count();
        $newMedicineCount = Medicine::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $expiredMedicine = Medicine::where('m_date_expired','<', Carbon::now())->count();
        return view('dashboard', compact('medicineCount', 'newMedicineCount','expiredMedicine'));
    }


}
