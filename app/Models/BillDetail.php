<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    function bills(){
        return $this->belongsTo(Bill::class,'bill_id');
    }
    use HasFactory;
}
