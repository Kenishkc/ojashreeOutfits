<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table="images";
    protected $fillable=[
        'product_id',
        'images',

    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
