<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'show_in_menu', 
        'slug',
        'parent_id',      
    ];

    public function subcategory(){

        return $this->hasMany(Category::class, 'parent_id');

    }

}
