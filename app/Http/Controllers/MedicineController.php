<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Show all medicines
    public function showAllMedicines()
    {
        $medicines = Medicine::latest()->get();
        return view('medicine', ['medicines' => $medicines]);
    }

    // Show add-medicine form
    public function index()
    {
        return view('medicine.add-medicine');
    }

    // Store new medicine
    public function store(Request $request)
    {
        $medicineValidate = $request->validate([
            "m_name" => ['required'],
            'm_da' => ['required'],
            'm_stock' => ['required'],
            'm_date_expired' => ['required'],
        ]);

        Medicine::create($medicineValidate);

        return redirect()->route('medicine.index')->with('success', 'Medicine added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicine.edit', compact('medicine'));
    }

    // Update medicine
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());

        return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully!');
    }

    // Show deduct form
    public function showDeduct($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicine.deduct-medicine', compact('medicine'));
    }

    public function deduct(Request $request, $id)
{
    $medicine = Medicine::findOrFail($id);

    // Validate the quantity input (ensure it doesn't exceed current stock)
    $request->validate([
        'deduct_quantity' => 'required|integer|min:1|max:' . $medicine->m_stock, // Prevent more than available stock
    ]);

    // Deduct the quantity from the stock
    $medicine->m_stock -= $request->deduct_quantity;

    // Ensure stock doesn't go below zero
    $medicine->m_stock = max(0, $medicine->m_stock);

    // Save the updated stock in the database
    $medicine->save();

    // Redirect with a success message
    return redirect()->route('medicine.index')->with('success', 'Medicine stock deducted successfully!');
}

}
