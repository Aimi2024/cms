<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    protected $table = "equipment";
protected $fillable = ['eq_id','eq_name',"eq_da"];
}
