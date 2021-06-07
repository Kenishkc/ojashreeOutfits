
@extends('admin.index')
@section('content')


<section style="padding-top:60px;">
   <div class="container">
      <div class="col-md-12">
         <div class="card p-2">
            <div class="card-body">
 
                <table class="table table-striped" style="width:100%" id="datatable">
                <thead class="thead-dark" >
                                 <tr>
                                <th>S.N</th>           
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Show in Menu</th>
                                <th>Status</th>
                                <th>Parent ID</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($category as $s)
                      
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$s->title}}</td>
                            <td>{{$s->description}}</td>
                            <td> 
                                @if(is_null($s->image)) 
                                  <img src="{{asset('images/default-image.jpg')}}"  width="100px;" height="100px;" alt="image">
                                @else
                                    <img src="{{asset('images')}}/{{$s->image}}" width="100px;" height="100px;" alt="image">
                                @endif          
                                </td>
                            <td>{{$s->show_in_menu}}</td>
                                 
                            <td>
                               <input data-id="{{$s->id}}" class="toggle-class" type="checkbox" data-onstyle="success" 
                               data-offstyle="danger" data-toggle="toggle" data-on="Active"  data-height="10"
                               data-off="InActive" {{ $s->status ? 'checked' : '' }}>
                            </td>
        
   
                           <td>{{$s->parent_id}}</td>
                            <td>
                                 <div class="btn-group">
                                 
                                    <a href="{{route('category.show',$s)}}" class="btn btn-info btn-sm mr-1 "><i class="fa fa-eye"></i></a>
                               
                                    <a href="{{route('category.edit',$s)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm mr-1 "  onclick="handeldelete({{$s->id}})"><i class="fa fa-trash"></i></a>
                                </div> 
                             </td>
                                                  
                        </tr>

    

                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                    <a href="{{route('category.create')}}" class="btn btn-success btn-sm">Create New Category</a>
                
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- //model  -->

<div id="deletemodal" class="modal fade">
	<div class="modal-dialog modal-confirm">
    <form action="#" method="POST" id="deletecategory">
      @csrf
      @method('DELETE')
      
        <div class="modal-content">
			<div class="modal-header bg-danger ">				
				<h4 class="modal-title text-white w-100">Are you sure?</h4>	
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

@section('script')
<script>
function handeldelete(id){
    var form = document.getElementById('deletecategory')
    form.action='category/' +id
    
    $('#deletemodal').modal('show')
}

    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'inactive' : 'active'; 
          var id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/category-status',
              data: {'status': status, 'id': id},
              success: function(data){
                  alert(data.success)
              }
          });
      })
    })


</script> 
@endsection
