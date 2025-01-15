<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Show all medicines or filter by search query
    public function showAllMedicines(Request $request)
    {
        $query = $request->input('query');

        // Base query for paginated medicine results
        $medicines = Medicine::join('users', 'medicines.added_by', '=', 'users.id')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('m_name', 'LIKE', "%{$query}%")
                    ->orWhere('m_da', 'LIKE', "%{$query}%")
                    ->orWhere('m_stock', 'LIKE', "%{$query}%")
                    ->orWhere('users.username', 'LIKE', "%{$query}%")
                    ->orWhere('m_date_expired', 'LIKE', "%{$query}%");
            })
            ->select('medicines.*', 'users.username')
            ->paginate(5);

        // Initialize empty collection for total stock calculation
        $totalStock = collect();

        // Perform total calculation if a search query exists
        if ($query) {
            $totalStock = Medicine::where('m_name', 'like', "%{$query}%")
                ->selectRaw('sum(m_stock) as total, m_name, count(*) as count')
                ->groupBy('m_name')
                ->having('count', '>', 1)
                ->get();
        }

        return view('medicine', [
            'medicines' => $medicines,
            'totalStock' => $totalStock,
            'query' => $query,
        ]);
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

        $medicineValidate['added_by'] = Auth::id();

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
            'deduct_reason'=> 'required',
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
            'created_at' =>$medicine->m_da,
            'medicine_deduct_reason' => $request->deduct_reason,
            'added_by' => Auth::id(),
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
