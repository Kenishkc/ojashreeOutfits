<?php

namespace App\Models;
use App\Models\Image;
use App\Models\Category;
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
        'cat_id',
        'manuf_date',
        'detail',
        'short_detail',
        'slug',
        'stock',
        


    ];
    
    public function image()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

public function category(){
    return $this->belongsTo(Category::class,'cat_id');
}


}
