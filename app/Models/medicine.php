<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    use HasFactory;
    protected $table = "medicines";
    protected $primaryKey = 'm_id';
    protected $fillable = ['m_name','m_stock','m_da','m_date_expired'];
}
