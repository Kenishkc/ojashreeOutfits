<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class UserPageController extends Controller
{
  
public function homePage(){
   
   $banner=Banner::all();
    return view('user-pages.home',compact('banner'));
}



}
