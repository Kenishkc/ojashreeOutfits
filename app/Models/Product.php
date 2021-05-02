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
    
    public function images()
    {
        return $this->hasMany(Image::class, );
    }
    public function previewImage()
    {
    return $this->hasOne(Image::class,);//don't forget to import
    }


public function category(){
    return $this->belongsTo(Category::class,'cat_id');
}


}
