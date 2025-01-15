<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductEquipment extends Model
{
    use HasFactory;

    protected $primaryKey = 'eqd_id';

    // Allow mass assignment for these fields
    protected $fillable = [
        'eqd_name',           // Equipment name
        'eqd_stock_deducted', // Stock deducted
        'eq_da',              // Equipment arrival date
        'eqd_date_deducted',  // Date when deduction occurred
        'eq_deduc_reason',
        'added_by',
    ];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
