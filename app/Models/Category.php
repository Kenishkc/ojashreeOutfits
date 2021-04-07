<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory,Sluggable;
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
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    
}
