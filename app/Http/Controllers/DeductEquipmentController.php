<?php

namespace App\Http\Controllers;

use App\Models\DeductEquipment;
use Illuminate\Http\Request;

class DeductEquipmentController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');

        // Base query to fetch paginated results
        $equipmentdeducted = DeductEquipment::with('addedBy')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('eqd_name', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%')
                    ->orWhere('eqd_stock_deducted', 'like', '%' . $query . '%')
                    ->orWhere('eq_da', 'like', '%' . $query . '%')
                    ->orWhere('eq_deduc_reason', 'like', '%' . $query . '%')
                    ->orWhere('eqd_date_deducted', 'like', '%' . $query . '%')
                    ->orWhereHas('addedBy', function ($q) use ($query) {
                        $q->where('username', 'like', '%' . $query . '%');
                    });
            })
            ->paginate(5);

        // Initialize empty collection for total deduction
        $totalDeducted = collect();

        // Only calculate total if there is a search query
        if ($query) {
            $totalDeducted = DeductEquipment::where('eqd_name', 'like', '%' . $query . '%')
                ->selectRaw('sum(eqd_stock_deducted) as total, eqd_name, count(*) as count')
                ->groupBy('eqd_name')
                ->having('count', '>', 1)
                ->get();
        }

        return view('equipments.eq-deducted-table', compact('equipmentdeducted', 'totalDeducted', 'query'));
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
    public function show(DeductEquipment $deductEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeductEquipment $deductEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeductEquipment $deductEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeductEquipment $deductEquipment)
    {
        // Store the equipment name for the success message
        $equipmentName = $deductEquipment->eqd_name;  // Use the name, not the ID

        // Delete the deducted equipment record
        $deductEquipment->delete();

        // Redirect back to the equipment index with a success message
        return redirect()->route('equipmentdeducted.index')->with('success', "The equipment '{$equipmentName}' has been successfully deleted.");
    }

}
