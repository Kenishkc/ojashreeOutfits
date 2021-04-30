<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\Product;


class CartController extends Controller


{
    
    //for carts only...........................................................................................
 function __construct()
    {
        
         $this->middleware('auth');
    }



//function for opening cart view
public function cart()
    {

            // Getting cart's contents for a specific user
        $userId = auth()->user()->id; // or any string represents user identifier
        $cartCollection =\Cart::session($userId)->getContent();
       
    
        return view('user-pages.cart',compact('cartCollection'));
    
  
    }



public function addToCart($id){


    $userId= auth()->user()->id;  
    $Product = Product::find($id);
     
    // add the product to cart
      
        \Cart::session($userId)->add(array(
            'id' => $Product->id,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 1,
                
            'attributes' => array(
                'image' => $Product->previewImage->images,
            ),
        
          'associatedModel' => $Product
        
        ));
   
   toastr()->success('Item is Added to Cart!');
       
return back();
}

 public function removeCart(Request $request){
          $userId= auth()->user()->id; 
        \Cart::session($userId)->remove($request->id);
         toastr()->error('Item is Remove to Cart!');
        return back();
        }

    public function updateCart(Request $request){
        
        $userId= auth()->user()->id; 
        \Cart::session($userId)->update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),

        ));
    
      toastr()->success('Item is Update !');
        return back();
    
   
    }

    public function clearAllIteam(){
         $userId = auth()->user()->id;
        \Cart::session($userId)->clear();
           toastr()->error('Car is cleared!');
        return back();
    }    

}
