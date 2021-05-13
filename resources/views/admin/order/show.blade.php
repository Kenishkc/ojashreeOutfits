@extends('admin.index')
@section('content')
<section>
    <div class="container">
            <div class="card">
                <div class="card-heading text-center">
                  <h2>Order Description</h2>
                </div>
                                                       
            
              <div class="row">
                    
              <div class="col-md-4" style=" text-align:left;">
                     
                        <h4 class="ml-2" style="color:red;">Customer Details</h4>
                    
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
                    <div class="col-md-7" style="margin: 40px;
                        height:auto; width: 50%; border: 1px solid rgba(0, 0, 0, 0.801); px;justify-content:center">
                      <h4 class="my-1" style="color:red;">Purchase Items</h4>
                       <table class="table table-responsive">
                      <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Product</th>
                         
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
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
                        <tr>
                          <th >Subtotal</th>
                          <td>Rs:</td>
                        </tr>
                       
                         <tr>
                          <th>Total</th>
                          <td>Rs</td>
                        </tr>
                      </tfoot>
                    </table>
                    <form method="POST" action="{{route('order.store')}}" >                           
                            @csrf
    
                              <div class="form-group">
                                
                                    <label for ="status" style="color:red;"><strong>Order Status</strong></label>
                                      <select type="dropdown" class="form-control" name="status">
                                          <option value="accept">Accept</option>
                                          <option value="cancel">Cancel</option>
                                          <option value="pending">Pending</option>
                                          <option value="complete">Complete</option>
                                          
                                      </select> 
                                
                              </div>
                              <div class="form-group">
                              
                                <button type="submit" class="btn btn-success" >Sumbit </button>
                            </div>
                    


                     </form>       
                  
                    </div>
               
                  </div>
                
                
            </div>
        </div>
</section>


@endsection