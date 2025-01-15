<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Show all equipment with optional search query.
     */
    public function showAllEquipments(Request $request)
    {
        $query = $request->input('query');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Fetch equipments with optional search query and date range
        $equipments = Equipment::join('users', 'equipment.added_by', '=', 'users.id')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('eq_name', 'LIKE', "%{$query}%")
                    ->orWhere('eq_id', 'LIKE', "%{$query}%")
                    ->orWhere('stock', 'LIKE', "%{$query}%")
                    ->orWhere('service_life_end', 'LIKE', "%{$query}%")
                    ->orWhere('users.username', 'LIKE', "%{$query}%");
            })
            ->when($dateFrom, function ($queryBuilder) use ($dateFrom) {
                return $queryBuilder->where('eq_da', '>=', $dateFrom);
            })
            ->when($dateTo, function ($queryBuilder) use ($dateTo) {
                return $queryBuilder->where('eq_da', '<=', $dateTo);
            })
            ->select('equipment.*', 'users.username') // Select necessary fields
            ->paginate(10);

        // Initialize empty collection for total stock calculation
        $totalStock = collect();

        // Perform total calculation if a search query exists
        if ($query) {
            $totalStock = Equipment::where('eq_name', 'like', "%{$query}%")
                ->selectRaw('sum(stock) as total, eq_name, count(*) as count')
                ->groupBy('eq_name')
                ->having('count', '>', 1)
                ->get();
        }

        return view('equipments', [
            'equipments' => $equipments,
            'totalStock' => $totalStock,
            'query' => $query,
        ]);
    }




    /**
     * Show the form to add a new equipment.
     */
    public function showAddForm()
    {
        return view('equipments.eq-add');
    }

    /**
     * Store a new equipment in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'eq_name' => 'required|string|max:255',  // Validate equipment name
            'eq_da' => 'required|date',  // Validate arrival date
            'stock' => 'required|integer|min:0',  // Validate stock value
             // Validate optional expiration date
            'service_life_end' => 'nullable|date',  // Validate optional service life end date
        ]);

        // Create a new equipment record in the database
        Equipment::create([
            'eq_name' => $request->eq_name,
            'stock' => $request->stock,
            'eq_da' => $request->eq_da,  // Store the equipment arrival date
            'service_life_end' => $request->service_life_end,  // Store service life end if provided
            'added_by' => Auth::id()
        ]);

        // Redirect with a success message
        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }

    /**
     * Show the form to deduct equipment stock.
     */
    public function showDeductForm($eq_id)
    {
        $equipment = Equipment::findOrFail($eq_id);
        return view('equipments.eq-deduct', compact('equipment'));
    }

    /**
     * Deduct stock from an equipment.
     */
    public function deduct(Request $request, $eq_id)
    {
        $equipment = Equipment::findOrFail($eq_id);

        // Validate the deduction amount
        $request->validate([
            'deduct_stock' => 'required|integer|min:1|max:' . $equipment->stock,  // Validate deduction amount
            'deduct_reason'=> 'required',
        ]);

        // Deduct stock and save changes
        $equipment->stock -= $request->deduct_stock;
        $equipment->stock = max(0, $equipment->stock);  // Ensure stock doesn't go below 0
        $equipment->save();

        // Create a new entry in the deduct_equipment table
        \App\Models\DeductEquipment::create([
            'eqd_name' => $equipment->eq_name,  // Assuming 'eq_name' is the correct field for equipment name
            'eqd_stock_deducted' => $request->deduct_stock,
            'eq_da' => $equipment->eq_da,  // Assuming 'eq_da' is the field for the equipment's arrival date
            'eqd_date_deducted' => now(), // Current timestamp for when the deduction occurred
            'eq_deduc_reason' => $request->deduct_reason,
        'added_by' => Auth::id(),
        ]);

        // Redirect with success message
        return redirect()->route('equipment.index')
            ->with('success', $equipment->eq_name.' stock deducted successfully!');
    }



    /**
     * Delete an equipment from the database.
     */
    public function destroy($eq_id)
    {
        $equipment = Equipment::findOrFail($eq_id);
        $equipment->delete();

        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully!');
    }
}
