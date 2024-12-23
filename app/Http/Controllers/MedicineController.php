<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Method to show all medicines
    public function showAllMedicines()
    {
        $medicines = Medicine::latest()->get();
        return view('medicine', ['medicines' => $medicines]);
    }

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

    // Method to show the edit form
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicine.edit', compact('medicine'));
    }

    // Method to update medicine
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());

        return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully!');
    }
}
