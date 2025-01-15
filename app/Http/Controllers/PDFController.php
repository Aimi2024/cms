<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\DeductedMedicine;
use App\Models\DeductEquipment;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Fetch data from the database
        $medicines = DeductedMedicine::all();  // Adjust query as needed

        // Pass data to the PDF view
        $pdf = Pdf::loadView('medicine_report', compact('medicines'));

        // Download the PDF
        return $pdf->download('deducted_medicine_report.pdf');
    }

    public function generatePDF_eq()
    {
        // Fetch data from the database
        $equipment = DeductEquipment::all();  // Adjust query as needed

        // Pass data to the PDF view
        $pdf = Pdf::loadView('eq_report', compact(var_name: 'equipment'));

        // Download the PDF
        return $pdf->download('deducted_equipment_report.pdf');
    }

}
