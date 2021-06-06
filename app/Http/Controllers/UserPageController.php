<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class UserPageController extends Controller
{
  
public function homePage(){
   $category=Category::where('parent_id','=',NULL)->get();
   $banner=Banner::all();
    return view('user-pages.home',compact('banner','category'));
}


public function shopPage(){
    $products=Product::with('previewImage')->get();
    return view('user-pages.shop',compact('products'));
}

public function checkout(){
    return view('user-pages.checkout');
}


}
