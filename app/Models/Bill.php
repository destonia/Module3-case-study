<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    function billDetails(){
        return $this->hasMany(BillDetail::class,'bill_id');
    }
    use HasFactory;
}
