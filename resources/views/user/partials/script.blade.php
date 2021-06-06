 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
 
 
 
  <script type="text/javascript" src="{{asset('js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('js/sequence.js')}}"></script>
  <script src="{{asset('js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('js/nouislider.js')}}"></script>
  <!-- Custom js -->
 
  <script src="{{asset('js/custom.js')}}"></script> 
  <script src="{{asset('js/mycustome.js')}}"></script> 
 @toastr_js
  @toastr_render
        <script>
        $(".nav .nav-link").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).addClass("active");
        });
</script>

@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#login-modal').modal({
            show: true
        });
    });
    </script>
@endif
@endsection