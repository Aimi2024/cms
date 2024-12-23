<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $table = "medicines";
    protected $fillable = ['m_name','m_stock','m_da','m_date_expired'];
}
