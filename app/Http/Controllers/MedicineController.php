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
            // Perform search if query is provided
            $medicines = Medicine::where('m_name', 'LIKE', "%{$query}%")
                ->orWhere('m_da', 'LIKE', "%{$query}%")
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

        Medicine::create($medicineValidate);

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine added successfully!');
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

        $medicine->m_stock -= $request->deduct_quantity;
        $medicine->m_stock = max(0, $medicine->m_stock);
        $medicine->save();

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine stock deducted successfully!');
    }
}
