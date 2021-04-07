<?php

namespace App\Models;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable = [

        'id',
        'name',
        'price',
        'discount_price',
        'manuf_date',
        'detail',
        'short_detail',
        'slug',
        'stock',
        // 'cat_id',


    ];
    
    public function images()
    {
        return $this->hasMany(Image::class, );
    }

}
