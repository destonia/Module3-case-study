<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    function bills(){
        return $this->hasMany(Bill::class,'customer_id');
    }
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address'
    ];
    use HasFactory;
}
