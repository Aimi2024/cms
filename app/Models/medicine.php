<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class medicine extends Model
{
    use HasFactory;
    protected $table = "medicines";
    protected $primaryKey = 'm_id';
    protected $fillable = ['m_name','m_stock','m_da','m_date_expired','added_by'];


    public function isExpired()
    {
        return $this->m_date_expired <= Carbon::today()->toDateString();
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function medicines()
{
    return $this->hasMany(Medicine::class, 'added_by');
}
}
