@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header text-bold text-white bg-secondary">Add New Category 
               </div>
               <div class="card-body">
        
              
                        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data" >
                           
                            @csrf
    
                
                            <div class="form-group">
                                <label for ="title">Title</label>
                                <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" placeholder="Enter title"/>                            
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                            <label for ="description">Description</label>
                            <input type="text" name="description" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter description"/>                            
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                             <label for ="status">status</label>
                             <select type="dropdown" class="form-control" name="status">
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
                             </select> 
                            </div>

                            <div class="form-group">
                                <label for ="status">Show in Menu</label>
                                <select type="dropdown" class="form-control" name="show_in_menu">
                                   <option value="yes">Yes</option>
                                   <option value="no">No</option>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for ="status">Parent</label>
                                <select type="dropdown" class="form-control" name="parent_id">
                                  <option value="">Parent</option>
                                    @foreach ($parent as $p)
                                       <option value="{{$p->id}}">{{$p->title}}</option>
                                    @endforeach
                                </select> 
                            </div>

                          
                            <div class="form-group">
                                <label for ="title">Image</label>
                                <input type="file" name="image" onchange="readUrl(this,'preview')" class="form-control" class="@error('image') is-valid @enderror" />                            
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <img src="" class="img img-responsive" height="100px;"  id="preview"/>
                            
                            </div>



                            <button type="submit" class="btn btn-outline-success" >Add Category </button>
                            &nbsp;&nbsp;&nbsp;  <a href="{{route('category.index')}}" class="btn btn-outline-primary mr-1">Category List</a>
              
                        </form> 
                                 
                    </div>
                   
             </div>
        </div>
    </div>
</section>    
@endsection
