
@section('script')

     <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  
  <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->


  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
  <script>
     
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
 
 if (typeof jQuery != 'undefined') {  
    // jQuery is loaded => print the version
    alert(jQuery.fn.jquery);
}


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

<script>
function handeldelete(id){
    var form = document.getElementById('deletecategory')
    form.action='category/' +id
    
    $('#deletemodal').modal('show')
}

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


</script> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

  <script type="text/javascript">
    var $table = $('#fresh-table')
  
    $(function () {
      $table.bootstrapTable({
        classes: 'table table-hover table-striped',
        toolbar: '.toolbar',

        search: true,
        showRefresh: true,
        showToggle: true,
        showColumns: true,
        pagination: true,
        striped: true,
        sortable: true,
        pageSize: 8,
        pageList: [8, 10, 25, 50, 100],

        formatShowingRows: function (pageFrom, pageTo, totalRows) {
          return ''
        },
        formatRecordsPerPage: function (pageNumber) {
          return pageNumber + ' rows visible'
        }
      })

      
    })

    
  </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#product_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('autocompleate_search')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#product_search').val(ui.item.label);
           
           $('#productid').val(ui.item.value); 
           return false;
        }
        
      });

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#search").autocomplete({
        source: "{{ url('search/image') }}",
            focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a href="' + item.url + '" >
        <div class="list_item_container">
        <div class="image"><img src="' + item.image + '" ></div>
        <div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
</script>
