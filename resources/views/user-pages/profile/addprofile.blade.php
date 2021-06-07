@extends('user.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
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
         <form class="form" action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
           @csrf 
      
                <div class="aa-myaccount-login">
                <div class="text-center">
                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" id="preview">
                  <h6>Upload a  photo...</h6>
                  <input type="file" name="profile_picture" class="form-control"  onchange="readUrl(this,'preview')">
                  @error('profile_picture')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
                </div>
              </div>
              <h4>Create New Profile</h4>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 
                              
                    <div class="form-group">            
                            <label for="first_name">First name</label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" title="Enter your first name if any.">
                              @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                    </div>
                    
                    <div class="form-group">
                          <label for="last_name">Last name</label>
                          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" title="Enter your last name if any.">
                          @error('last_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                   
                         <div class="form-group">   
                           <label for="phone">Nick Name</label>
                            <input type="text" class="form-control" name="nick_name"  placeholder="Enter Nick Name">
                            @error('nick_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>  


                    <div class="form-group">                    
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone" placeholder="Enter Phone" title="Enter your phone number if any.">
                            @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>    
                            

                    
                            <div class="form-group">
                              <label for="email"> Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="Enter your email.">
                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>


                            <div class="form-group">
                               <label for="text"> Address</label>
                                <input type="text" class="form-control" name="address" placeholder="please enter the location" title="enter a location">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                              
                              <div class="form-group">
                                <label for="social_link">facebook link</label>
                                  <input type="text" class="form-control" name="facebook"  placeholder="Enter your FaceBook Link" title="enter your social links">
                                  @error('facebook')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="social_link">Viber Number</label>
                                  <input type="text" class="form-control" name="viber"  placeholder="Enter your Viber Number" title="enter your social links">
                                  @error('viber')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>



                             <div class="form-group">
                                  <label for="social_link">
                                    Location Area</label>
                                    <input type="text" class="form-control" name="location_area"  placeholder="enter your social links" title="enter your social links">
                             </div>
                            
                                <div class="form-group">    
                                <br>
                                <button class="btn btn-lg aa-browse-btn" type="submit"><i></i> Save</button>
                                <button class="btn btn-lg  aa-browse-btn" type="reset"><i></i> Reset</button>
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