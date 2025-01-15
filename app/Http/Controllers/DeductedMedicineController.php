<?php

namespace App\Http\Controllers;

use App\Models\DeductedMedicine;
use Illuminate\Http\Request;

class DeductedMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Base query to fetch paginated results
        $medicinededucted = DeductedMedicine::with('addedBy')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('medicine_name', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%')
                    ->orWhere('quantity_deducted', 'like', '%' . $query . '%')
                    ->orWhereHas('addedBy', function ($q) use ($query) {
                        $q->where('username', 'like', '%' . $query . '%');
                    })
                    ->orWhere('medicine_deduct_reason', 'like', '%' . $query . '%')
                    ->orWhere('deducted_at', 'like', '%' . $query . '%');
            })
            ->paginate(5);

        // Initialize empty collection for total deduction
        $totalDeducted = collect();

        // Only calculate total if there is a search query
        if ($query) {
            $totalDeducted = DeductedMedicine::where('medicine_name', 'like', '%' . $query . '%')
                ->selectRaw('sum(quantity_deducted) as total, medicine_name, count(*) as count')
                ->groupBy('medicine_name')
                ->having('count', '>', 1)
                ->get();
        }

        return view('medicine.deducted-table-medicine', compact('medicinededucted', 'totalDeducted', 'query'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeductedMedicine $deductedMedicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeductedMedicine $deductedMedicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeductedMedicine $deductedMedicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeductedMedicine $deductedMedicine)
    {
        // Store the medicine name for the success message
        $medicineName = $deductedMedicine->medicine_name;

        // Delete the deducted medicine record
        $deductedMedicine->delete();

        // Redirect back to the medicine index with a success message
        return redirect()->route('medicinededucted.index')->with('success', "The medicine '{$medicineName}' has been successfully deleted.");
    }


}
