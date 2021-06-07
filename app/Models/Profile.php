<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
   protected  $fillable=[
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'profile_picture',
        'email',
        'facebook',
        'viber',
        'nick_name',
        'location_area'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }





}
