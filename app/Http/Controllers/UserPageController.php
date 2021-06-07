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

public function searchProduct(Request $request){
    $query=$request->get('term','');
    $products=Product::where('name','LIKE','%'.$query.'%')->get();
    $data=[];
    foreach($products as $items){
        $data[] =[
            'value'=>$items->name,
            'id'=>$items->id,
        ];
    }
    if(count($data)){
        return $data;
    }else{
        return ['value'=>'No Result Found','id'=>''];
    }
}


}
