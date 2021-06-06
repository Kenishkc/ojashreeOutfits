@extends('user.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Account</li>
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
         <form class="form" action="{{route('profile.update',$profile->id)}}" method="post" enctype="multipart/form-data">
           @method('PUT')
            @csrf 
      
                <div class="aa-myaccount-login">
                <div class="text-center">
            <img src="{{asset('profile_picture')}}/{{$profile->profile_picture}}" class="avatar img-circle img-thumbnail" style="max-height: 200px;" id="preview">
              <h6>Upload a  photo...</h6>
                  <input type="file" name="profile_picture" class="form-control"  onchange="readUrl(this,'preview')">
                  @error('profile_picture')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
                </div>
              </div>
              <h4>Update Profile</h4>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 
                              
                    <div class="form-group">            
                            <label for="first_name">First name</label>
                              <input type="text" class="form-control" value="{{$profile->first_name}}" name="first_name" id="first_name" placeholder="First Name" title="Enter your first name if any.">
                              @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                    </div>
                    
                    <div class="form-group">
                          <label for="last_name">Last name</label>
                          <input type="text" class="form-control" name="last_name" value="{{$profile->last_name}}"  id="last_name" placeholder="Last Name" title="Enter your last name if any.">
                          @error('last_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                   
                         <div class="form-group">   
                           <label for="phone">Nick Name</label>
                            <input type="text" class="form-control" name="nick_name" value="{{$profile->nick_name}}" placeholder="Enter Nick Name">
                            @error('nick_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>  


                    <div class="form-group">                    
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{$profile->phone_number}}" id="phone" placeholder="Enter Phone" title="Enter your phone number if any.">
                            @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>    
                            

                    
                            <div class="form-group">
                              <label for="email"> Email</label>
                              <input type="email" class="form-control" name="email"  value="{{$profile->email}}" id="email" placeholder="you@email.com" title="Enter your email.">
                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>


                            <div class="form-group">
                               <label for="text"> Address</label>
                                <input type="text" class="form-control" name="address" value="{{$profile->address}}" placeholder="please enter the location" title="enter a location">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                              
                              <div class="form-group">
                                <label for="social_link">facebook link</label>
                                  <input type="text" class="form-control" name="facebook" value="{{$profile->facebook}}" placeholder="Enter your FaceBook Link" title="enter your social links">
                                  @error('facebook')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="social_link">Viber Number</label>
                                  <input type="text" class="form-control" name="viber" value="{{$profile->viber}}"  placeholder="Enter your Viber Number" title="enter your social links">
                                  @error('viber')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>



                             <div class="form-group">
                                  <label for="social_link">
                                    Location Area</label>
                                    <input type="text" class="form-control" name="location_area" value="{{$profile->location_area}}" placeholder="Enter your local area" title="enter your social links">
                             </div>
                            
                                <div class="form-group">    
                                <br>
                                <button class=" aa-browse-btn" type="submit"><i></i>Update</button>
                                  <a href="{{ route('profile.index') }}" class="aa-browse-btn" >
                                          <i class="fas fa-undo"></i> Back
                                       </a>
                                  </div>


                </div>
              </div>
            </div> 
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>



@endsection
@section('script')
    

<script>
function readUrl(input,id){
if(input.files && input.files[0]){
  var reader = new FileReader();
  reader.onload = function(e){
    $("#" + id).attr("src",e.target.result);
  };
  reader.readAsDataURL(input.files[0]);
}
}
</script>
    
@endsection