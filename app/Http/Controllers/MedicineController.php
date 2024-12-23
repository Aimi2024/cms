<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Method to show all medicines
    // public function showAllMedicines()
    // {
    //     // Fetch all medicines from the database
    //     // $medicines = Medicine::all();

    //     // // Pass the fetched data to the view
    //     // return view('medicine.index', compact('medicines'));
    // }

    // Method to show the form for adding a new medicine
    public function index()
    {
        return view('medicine.add-medicine');
    }

    // Method to store a new medicine
    public function store(Request $request)
    {
        // Validate the input
        $medicineValidate = $request->validate([
            "m_name" => ['required'],
            'm_da' => ['required'],
            'm_stock' => ['required'],
            'm_date_expired' => ['required'],
        ]);

        // Create a new medicine entry in the database
        Medicine::create($medicineValidate);

        // Redirect to the medicine index page with success message
        return redirect()->route('medicine.index')->with('success', 'Medicine added successfully!');
    }
}
