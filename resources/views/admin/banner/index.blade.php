@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header text-center text-white text-bold bg-secondary">
                        <h1>
                       Banner List
                        </h1>
                              </div>
            

                       <table class="table table-striped" id="datatable">

                       <thead class="thead-dark">
                            <tr>
                                <th>S.no</th>
                                
                                <th>Title</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Offer</th>
                                <th>Added By</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($banners as $banner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$banner->title}}</td>
                            <td>
                                <img src="{{asset('home_slider')}}/{{$banner->image}}" height="150px;" width="200px;"/>

                            </td>
                            <td>{{$banner->link}}</td>
                            <td>{{$banner->offer}}</td>
                            <td>{{$banner->added_by}}</td>
     
                            <td>{{$banner->description}}</td>

                            <td>
    
                             
                               <input data-id="{{$banner->id}}" class="toggle-class" type="checkbox" data-onstyle="success" 
                               data-offstyle="danger" data-toggle="toggle" data-on="Active"  data-height="10"
                               data-off="InActive" {{ $banner->status ? 'checked' : '' }}>

                            </td>
        
   
                           
                            <td>
                                 <div class="btn-group">
                                    <a href="{{route('banner.show',$banner->id)}}" class="btn btn-info btn-sm mr-1 "><i class="fa fa-eye"></i></a>
                                    <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm mr-1 "  onclick="handeldelete({{$banner->id}})"><i class="fa fa-trash"></i></a>
                                </div> 
                             </td>
                                                  
                        </tr>
    

                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                    </div>
                    <a href="{{route('banner.create')}}" class="btn btn-success btn-sm">Create New Banner</a>
                </div>
        </div>
    </div>
    </div>
</section> 
<!-- //model  -->

<div id="deletemodal" class="modal fade">
	<div class="modal-dialog modal-confirm">
    <form action="#" method="POST" id="deletebanner">
      @csrf
      @method('DELETE')
      
        <div class="modal-content">
			<div class="modal-header bg-danger ">				
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	
    
    </form>
    </div>
</div>
@endsection

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>

function handeldelete(id){

    var form = document.getElementById('deletebanner')
    form.action='banner/' +id
    
    $('#deletemodal').modal('show')

}

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

</script>
