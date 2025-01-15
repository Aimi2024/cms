<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    // Set the table name (optional if it matches the default plural form)
    protected $table = "equipment";
    protected $primaryKey = 'eq_id';

    // Allow mass assignment for specific fields
    protected $fillable = [
        'eq_name',
        'eq_da',
        'stock',
        'expiration_da',
        'service_life_end',
        'added_by',
    ];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
