<?php

namespace App\Http\Controllers;

use App\Models\DeductEquipment;
use Illuminate\Http\Request;

class deductEquipmentController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');

        $equipmentdeducted = DeductEquipment::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('eqd_name', 'like', '%' . $query . '%')
                                 ->orWhere('created_at', 'like', '%' . $query . '%')
                                 ->orWhere('eqd_stock_deducted', 'like', '%' . $query . '%')
                                 ->orWhere('eq_da', 'like', '%' . $query . '%')
                                 ->orWhere('eqd_date_deducted', 'like', '%' . $query . '%');
        })
        ->paginate(5);  // Pagination with 5 records per page

        return view('equipments.eq-deducted-table', compact('equipmentdeducted'));
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
