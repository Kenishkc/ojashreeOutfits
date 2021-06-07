<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>OjasShree | Home</title>
    
    @include('user.partials.css')
    @yield('css')
  
  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  @include('user.partials.nav')
  <!-- / menu -->
  <!-- / Subscribe section -->

   @yield('content')

  <!-- footer -->  
 @include('user.partials.footer')
  <!-- Login Modal -->  
 
@include('user.partials.login-model')


<!-- jQuery library -->
@include('user.partials.script')
@yield('script')

</body>
</html>