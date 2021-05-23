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


<section>
   <div class="container  ">
      <div class="row">
         <div class="col-sm-3">
            <!--left col-->
            <form class="form" action="#" method="post" enctype="multipart/form-data">
               @csrf 
               <div class="text-center">
                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" id="preview">
                  <h6>Upload a  photo...</h6>
                  <input type="file" name="profile_picture" class="form-control"  onchange="readUrl(this,'preview')">
                  @error('profile_picture')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
               </hr><br>             
         </div>
         <!--/col-3-->
         <div class="col-sm-9">
         <h3><strong>
           Create Profile</strong> </h3>
         <div class="tab-content">
         <div class="tab-pane active" id="home">
         <hr>
         <div class="col-xs-6">
         <label for="first_name"><h4>First name</h4></label>
         <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" title="enter your first name if any.">
         @error('first_name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror</div>
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="last_name"><h4>Last name</h4></label>
         <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" title="enter your last name if any.">
         @error('last_name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="phone"><h4>Phone Number</h4></label>
         <input type="text" class="form-control" name="phone_number" id="phone" placeholder="Enter Phone" title="enter your phone number if any.">
         @error('phone_number')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="phone"><h4>
         <i class="fas fa-address-card"></i>   Contact Person Name</h4></label>
         <input type="text" class="form-control" name="contact_person_name" id="phone" placeholder="enter Contact person name" title="enter your phone number if any.">
         @error('contact_person_name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">              
         <div class="col-xs-6">
         <label for="email"><h4>
         <i class="fas fa-envelope"></i> Email</h4></label>
         <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
         @error('email')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="text">
         <h4>
         <i class="fas fa-map-marker-alt"></i> Address</h4></label>
         <input type="text" class="form-control" name="address" placeholder="please enter the location" title="enter a location">
         @error('address')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="social_link"><h4>Social link</h4></label>
         <input type="text" class="form-control" name="social_link"  placeholder="Enter your Social Links" title="enter your social links">
         @error('social_link')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-6">
         <label for="social_link"><h4>
         <i class="fas fa-search-location"></i>
         Location Area</h4></label>
         <input type="text" class="form-control" name="location_area"  placeholder="enter your social links" title="enter your social links">
         </div>
         </div>
         <div class="form-group">
         <div class="col-xs-12">
         <br>
         <button class="btn btn-lg btn-success" type="submit"><i></i> Save</button>
         <button class="btn btn-lg" type="reset"><i></i> Reset</button>
         </div>
         </div>
         </form>
         </div><!--/tab-content-->
      </div>
      <!--/col-9-->
   </div>
</section>


@endsection
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
    
