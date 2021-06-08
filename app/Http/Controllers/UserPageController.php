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


//for search function 

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


public function searchResult(Request $request){
    $searchingdata=$request->input('product_items');
    $products=Product::where('name','LIKE','%'.$searchingdata.'%')->get();
    if($products)
    { 
        if(isset($_POST['searchbtn'])){
              
            return view('user-pages.shop',compact('products'));

          }else{
            $product=Product::where('name','LIKE','%'.$searchingdata.'%')->first();
            if($product){
  
              return view('user-pages.product-details',compact('product'));
            }else{
                  toastr()->error('Item not found');
                 return redirect('/');
            }
          }
        
           }else{
        toastr()->error('Item not found');
        return redirect('/');
    }



}


}
