<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeductedMedicine extends Model
{


    protected $fillable = [
        'medicine_name',
        'quantity_deducted',
        'deducted_at',
        'medicine_deduct_reason',
        'added_by',
    ];
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

}
