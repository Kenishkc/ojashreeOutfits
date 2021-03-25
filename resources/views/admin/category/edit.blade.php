@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header text-bold text-white bg-secondary">Update Category 
               </div>
               <div class="card-body">
        
              
                        <form method="POST" action="{{route('category.update',$category)}}" enctype="multipart/form-data" >
                           @method('PUT')
                            @csrf
    
                
                            <div class="form-group">
                                <label for ="title">Title</label>
                                <input type="text" name="title" value="{{$category->title}}" class="form-control" class="@error('title') is-valid @enderror"/>                            
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                            <label for ="description">Description</label>
                            <input type="text" name="description" value="{{$category->description}}" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter description"/>                            
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                             <label for ="status">status</label>
                             <select type="dropdown" class="form-control" name="status">
                             
                                <option value="inactive" {{$category->status== 'inactive' ?'selected': ''}}>Inactive</option>
                                <option value="active" {{$category->status== 'active' ?'selected': ''}}>Active</option>
                             </select> 
                            </div>
                           


                            <div class="form-group">
                                <label for ="status">Show in Menu</label>
                                <select type="dropdown" class="form-control" name="show_in_menu">
                                   <option value="yes"{{$category->show_in_menu== 'yes' ?'selected': ''}}>Yes</option>
                                   <option value="no"{{$category->show_in_menu== 'no' ?'selected': ''}}>No</option>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for ="status">Parent</label>
                                <select type="dropdown" class="form-control" name="parent_id">
                                    @if ($category->parent_id == NULL){
                                     <option value="">Parent</option>
                                    }@else{
                                    @foreach ($parent as $p)
                                   
                                       <option value="{{$p->parent_id}}"{{$p->id==$category->id ?'selected': ''}}>{{$p->title}}</option>
                                    
                                       @endforeach
                                    }@endif
                                </select> 
                            </div>

                            
                          


                            <div class="form-group">
                                <label for ="title">Image</label>
                                <input type="file" name="image" onchange="readUrl(this,'preview')" class="form-control" class="@error('image') is-valid @enderror" />                            
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <img src="{{asset('images')}}/{{$category->image}}" class="img img-responsive" height="100px;"  id="preview"/>
                            
                            </div>



                            <button type="submit" class="btn btn-outline-success" >Update Category </button>
                            &nbsp;&nbsp;&nbsp;  <a href="{{route('category.index')}}" class="btn btn-outline-primary mr-1">Category List</a>
              
                        </form> 
                                 
                    </div>
                   
             </div>
        </div>
    </div>
</section>    
@endsection
