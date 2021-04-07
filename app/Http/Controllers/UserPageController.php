<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;

class UserPageController extends Controller
{
  
public function homePage(){
   $category=Category::where('parent_id','=',NULL)->get();
   $banner=Banner::all();
    return view('user-pages.home',compact('banner','category'));
}



}
