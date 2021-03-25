
@section('script')

<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script>

$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? inactive : active; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/status',
            data: {'status': status, 'id': id},
            success: function(data){
                alert(data.success)
            }
        });
    })
  })


  $(document).ready( function () {
    $('#datatable').DataTable();
    } );
 


// $("#is_parent").change(function(){
// var checked =$("#is_parent").prop("checked");
// if(checked){
//   $("#sub_cat").removeClass("d-none");
// }else{
//   $("#sub_cat").addClass("d-none");
// }

// });


$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/orderStatus',
            data: {'status': status, 'id': id},
            success: function(data){
                alert(data.success)
            }
        });
    })
  })

//preview image
// function readUrl(input,id){
// if(input.files && input.files[0]){

//   var reader = new FileReader();
//   reader.onload = function(e){
//     $("#" + id).attr("src",e.target.result);
//   };
//   reader.readAsDataURL(input.files[0]);
// }

// }

    // Multiple images preview in browser
  //  function readUrl(input, id) {

  //       if (input.files) {
  //           var filesAmount = input.files.length;

  //           for (i = 0; i < filesAmount; i++) {
  //               var reader = new FileReader();

  //               reader.onload = function(event) {
  //                 $("#" + id).attr("src",event.target.result);  }

  //               reader.readAsDataURL(input.files[i]);
  //           }
  //       }

  //       $('#gallery-photo-add').on('change', function() {
  //       imagesPreview(this, 'div.gallery');
  //   });


  //   };

  $(document).ready(function(){
 $('#profileImage').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
 
        var data = $(this)[].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
 });
});

</script>

