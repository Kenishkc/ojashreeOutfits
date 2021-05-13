<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'status',
    ];
public function user(){
    return  $this->belongsTo(User::class,'user_id');
}

public function orderitems(){
    return $this->hasMany(Order_items::class);
}


public function shippingaddress(){

    return $this->hasOne(Shipping_addresses::class);

}


}
