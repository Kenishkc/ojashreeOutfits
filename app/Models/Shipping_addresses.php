<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_addresses extends Model
{
    use HasFactory;
    protected $fillable = [
    'order_id',
    'user_id',
    'name',
    'phone',
    'address',
    'city',
    'country',
    'district',
    'special_note',
    
    ];

    public function order(){
    return $this->belongsTo(Order::class,'order_id');

    }
}
