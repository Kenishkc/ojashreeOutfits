<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use App\Models\Shipping_addresses;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

              $userId = auth()->user()->id;
              $email=auth()->user()->email;
              $name=auth()->user()->name;
              $cartItems =\Cart::session($userId)->getContent();
       
    
        return view('user-pages.checkout',compact('cartItems','userId','email','name'));
    
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $userId = auth()->user()->id; // or any string represents user identifier    
        $cartItems =\Cart::session($userId)->getContent();
         $order= new Order;
       $order->user_id=$userId;
       $order->payment_id=111;
       $order->status='pending';

       if($order->save()){

            foreach($cartItems as $cart){
                $order_item=new Order_items();
                $order_item->order_id= $order->id;
                $order_item->product_id=$cart->id;
                $order_item->price=$cart->price;
                $order_item->quantity=$cart->quantity;
                $order_item->amount= \Cart::get($cart->id)->getPriceSum() ;
                $order_item->subtotal=\Cart::session($userId)->getSubTotal();
                $order_item->total=\Cart::session($userId)->getTotal();
                $order_item->save();

            }
               
       
        }
        $request->merge([
            'user_id'=>$userId,
            'order_id'=>$order->id
        ]);
       Shipping_addresses::create($request->all());
        \Cart::session($userId)->clear();
       toastr()->success('Order Placed Sucessfully !');
        return redirect()->route('userhome');
    




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
