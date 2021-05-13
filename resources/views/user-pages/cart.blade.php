@extends('user.master')

@section('content')
<div>
     <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
            
        @if(count(\Cart::getContent()) > 0) 
            
           
               <div class="table-responsive">
                 
                <table class="table">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($cartCollection as $item)
                         
                     
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="#">
                        <img src="{{asset('images')}}/{{$item->attributes->image}}"  alt="..." width="250" height="200" class="img-responsive"/>  
                        </a></td>
                        <td><a class="aa-cart-title" href="#">{{$item->name}}</a></td>
                        <td>Rs{{$item->price}}</td>
                        
                            <td>
                             
                            <form action="{{ route('cart.update') }}" method="POST">
                              @csrf
                          
                               <input type="number" name="quantity"  value="{{$item->quantity}}"></td>
                             </td>
                            <td>Rs:{{ \Cart::get($item->id)->getPriceSum() }}</td>
                            <td>
                               <input type="hidden" value="{{ $item->id}}" id="id" name="id">
              
								                <button type ="submit" class="btn btn-info btn-sm">    
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </form>
                          
								        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                  <button class="btn btn-danger btn-sm">
                                  <i class="fa fa-trash-o"></i></button>								
							            </form>
                          

                       </td>
                      </tr>

                     @endforeach
                     
                        </tbody>
                  </table>
                </div>
             <a href="{{route('clear.cart')}}" class="aa-cart-view-btn ">Clear Cart</a>
           
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
                  
               <table class="aa-totals-table">
                 <tbody>
                  
                   <tr>
                     <th>Total</th>
                     <td>Rs{{ \Cart::getTotal() }}</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{route('checkout.index')}}" class="aa-cart-view-btn">Proced to Checkout</a>
            
              </div>
           @else
            <p class="text-secondary text-center">Please Add Some Product in the Cart </p>
          @endif
          </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->




</div>

@endsection
