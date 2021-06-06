@extends('user.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
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
                       <div class="col-md-2">
                    <i class="fab fa-facebook-square"></i>
                       </div>
                     <div class="col-md-5">
                       <label> {{$profile->facebook}}</label>  
                      </div>
                      </div>  
                    <div class="row">
                       <div class="col-md-2">
                      <i class="fab fa-viber" style="size:10px;"></i>
                      
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
              
              <h4>My Profile </h4>
               <a href="{{route('profile.edit',$profile->id)}}" class="text-right" > 
                <i class="fa fa-edit"></i>
              </a>
          
              <div class="col-md-6">
                <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#about" data-toggle="tab">About</a></li>
                    <li><a href="#order" data-toggle="tab">My Order</a></li>
                    </ul>
                 <div class="tab-content">
                   
                    <div class="tab-pane fade in active" id="about">
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

                    <div class="tab-pane fade in" id="order">
                   <div class="row">
              <div class="col-md-12">    
           
                       <table class="table table-striped" id="datatable">

                       <thead class="thead-dark">
                            <tr>
                                <th>S.N</th>           
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>

                  @foreach($order as $s)
                      
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>   
                              {{date_format($s->created_at,'D M Y')}}
                          </td>
                             <td>{{$s->payment_id}}</td>
                                      
                            <td>
                             @if ($s->status=='pending')
                                 <span class="label label-info " aria-hidden="true">{{$s->status}}</span>
                            @elseif ($s->status=='accept')
                                 <span class="label label-success">{{$s->status}}</span>                                
                             @else
                              <span class="label label-default" > {{$s->status}}</span>
                             @endif
                            </td>                           
                            <td>
                              <a href="{{route('profile.show',$s)}}" class="btn btn-default" > Details</a>
                                  
                             </td>
                                                  
                        </tr>
                       @endforeach
                     

                
                       
                       </tbody>
                       
                       </table>       
                    </div>
                    </div>
        
                          
                          
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