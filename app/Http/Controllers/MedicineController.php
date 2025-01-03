<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Show all medicines or filter by search query
    public function showAllMedicines(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Perform search if query is provided, now including m_name, m_da, m_stock, and m_date_expired
            $medicines = Medicine::where('m_name', 'LIKE', "%{$query}%")
                ->orWhere('m_da', 'LIKE', "%{$query}%")
                ->orWhere('m_stock', 'LIKE', "%{$query}%")
                ->orWhere('m_date_expired', 'LIKE', "%{$query}%")
                ->paginate(5);
        } else {
            // Show all medicines by default
            $medicines = Medicine::latest()->paginate(5);
        }

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

        // Create the medicine record
        $medicine = Medicine::create($medicineValidate);

        // Flash a success message with the name of the added medicine
        session()->flash('success', $medicine->m_name . ' has been added successfully!');

        // Redirect to the medicine index page
        return redirect()->route('medicine.index');
    }


    // Show deduct form`
    public function showDeductForm($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicine.deduct-medicine', compact('medicine'));
    }

    // Deduct stock from medicine
    public function deduct(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'deduct_quantity' => 'required|integer|min:1|max:' . $medicine->m_stock,
        ]);

        // Deduct from the medicine stock
        $medicine->m_stock -= $request->deduct_quantity;
        $medicine->m_stock = max(0, $medicine->m_stock);
        $medicine->m_da;
        $medicine->save();

        // Create a new entry in the DeductedMedicine table
        \App\Models\DeductedMedicine::create([
            'medicine_name' => $medicine->m_name,
            'quantity_deducted' => $request->deduct_quantity,
            'deducted_at' => now(), // Current timestamp
            'created_at' =>$medicine->m_da

        ]);

        return redirect()->route('medicine.index')
            ->with('success', $medicine->m_name.' stock deducted successfully!');
    }
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicineName = $medicine->m_name; // Get the medicine name

        $medicine->delete();

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine "' . $medicineName . '" deleted successfully.');
    }



}
