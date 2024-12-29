<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeductedMedicine extends Model
{
    protected $fillable = [
        'medicine_name',
        'quantity_deducted',
        'deducted_at'
    ];
}
