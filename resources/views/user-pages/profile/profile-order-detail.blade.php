@extends('user.master')
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img src="{{asset('img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
      <div class="container">
         <div class="aa-catg-head-banner-content">
            <h2>Profile Page</h2>
            <ol class="breadcrumb">
               <li><a href="index.html">Home</a></li>
               <li class="active">Profile</li>
            </ol>
         </div>
      </div>
   </div>
</section>


<section id="aa-myaccount">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="aa-myaccount-area">
               <div class="row">
                  <div class="col-md-4">
                     <div class="aa-myaccount-login">
                        <div class="text-center">
                           <img src="{{asset('profile_picture')}}/{{$profile->profile_picture}}" class="avatar img-circle img-thumbnail" style="max-height: 200px;" id="preview">
                        </div>
                        <h4>Social link</h4>
                        <div class="row">
                           <div class="col-md-3">
                              <label>Facebook:</label>
                           </div>
                           <div class="col-md-5">
                              <label> {{$profile->facebook}}</label>  
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <label>Viber:</label>   
                           </div>
                           <div class="col-md-5">
                              <label> {{$profile->viber}}</label>  
                           </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                        </div>
                     </div>
                  </div>
                  <h4>My Profile</h4>
                     <a href="{{route('profile.edit',$profile->id)}}" class="text-right" > 
                <i class="fa fa-edit"></i>
              </a>
          
                  <div class="col-md-6">
                     <ul class="nav nav-tabs aa-products-tab">
                        <li><a href="#about" data-toggle="tab">About</a></li>
                        <li  class="active"><a href="#order" data-toggle="tab">My Order</a></li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade in " id="about">
                           <div class="row">
                              <div class="col-md-6">
                                 <label> User Id</label>
                              </div>
                              <div class="col-md-6">
                                 <p>{{$profile->user_id}}</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Nick Name</label>
                              </div>
                              <div class="col-md-6">
                                 <p> {{$profile->nick_name}}  </p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Name</label>
                              </div>
                              <div class="col-md-6">
                                 <p> {{$profile->first_name}} {{$profile->last_name}} </p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                 <p>{{$profile->email}}</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Phone</label>
                              </div>
                              <div class="col-md-6">
                                 <p>{{$profile->phone_number}}</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Address</label>
                              </div>
                              <div class="col-md-6">
                                 <p>{{$profile->address}}</p>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade in active" id="order">
                         
                           <div class="col-md-12">
                             <h4>Order Details</h4>   
                           <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Name: </b>{{$order->user->name}}</li>
                                    <li class="list-group-item"><b>Payment Id: </b>{{$order->payment_id}}</li>
                                    <li class="list-group-item"><b>Phone no:</b> {{$order->shippingaddress->phone}}</li>
                                    <li class="list-group-item"><b>Email :</b> {{$order->user->email}}</li>
                                    
                                    <li class="list-group-item"><b>Country: </b>{{$order->shippingaddress->country}}</li>                         
                                    <li class="list-group-item"><b>District: </b>{{$order->shippingaddress->district}}</li>
                                    <li class="list-group-item"><b>City:</b> {{$order->shippingaddress->city}}</li>
                                 
                                    
                                    <li class="list-group-item"><b>Special Notee: </b>{{$order->shippingaddress->special_note}}
                                    <li class="list-group-item"><b>Order Date:</b> {{$order->created_at}} </li>
                                       
            
                                 </ul>
                            </div>
                           <div class="col-md-6">
                              <table class="table table-responsive">
                              <thead>
                                 <tr>
                                    <th width="25%">Sno</th>
                                    <th width="25%">Image</th>
                                    <th width="25%">Product</th>
                                 
                                    <th width="25%">Quantity</th>
                                    <th width="25%">Price</th>
                                    <th width="25%"> Total</th>
                                 </tr>
                              </thead>
                              @foreach ($order->orderitems as $item)
                              <tbody>
                                 <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                    <img src="{{asset('images/'. $item->product->previewImage->images)}}" 
                                    width="100" height="100">
                                 
                                    </td>
                                    <td>{{$item->product->name}}</td>
                              
                                    
                                 <td>{{$item->quantity}}</td>
                                 <td>{{$item->price}}</td> 
                                 
                                 <td>Rs:{{$item->amount}}</td>
                                 </tr>
                                 
                              </tbody>
                              @endforeach
                              <tfoot>
                                  <tfoot>
                                 <tr>
                                 <th colspan="5" style="text-align:right;">Subtotal</th>
                                 <td>Rs:{{$item->subtotal}}</td>
                                 </tr>
                              
                                 <tr>
                                 <th colspan="5" style="text-align:right;">Total</th>
                                 <td>Rs{{$item->total}}</td>
                                 </tr>
                              </tfoot>
                           </table>

                   
                          
                           </div>
                       
                           </div>
                           <form method="POST" action="{{route('order.update',$order->id)}}" >                           
                              @method('PUT')      
                              @csrf
                                    
                                       <div class="form-group">
                                       
                                             <label for ="status" >
                                             <strong>Order Status</strong>
                                             </label>
                                             <select type="dropdown" class="form-control" name="status">
                                                    <option value="cancel">Cancel</option>
                                                   <option value="pending">Pending</option>
                                                  
                                             </select>                                
                                       </div>
                                       <div class="form-group">                              
                                       <button type="submit" class="aa-browse-btn">Sumbit </button>
                                    
                                       <a href="{{ route('profile.index') }}" class="aa-browse-btn" >
                                          <i class="fas fa-undo"></i> Back
                                       </a>
                             
                                    
                                    
                                    </div>

                           </form>       
                           
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection