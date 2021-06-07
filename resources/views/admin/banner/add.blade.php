@extends('admin.index')
@section('content')


<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-8 offset-md-1">
            <div class="card p-2 mb-5">
              <div class="card-header text-white text-bold bg-secondary">
               Add New Product
               </div>
               <div class="card-body">
      

                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf



                        <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">

                                <strong>Bannner Title :</strong>

                                <input type="text" name="title" class="form-control" placeholder="Enter banner title">

                            </div>

                        </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong>Special offer:</strong>

                                        <input class="form-control"  name="offer" placeholder="Enter the special offer "></input>
                                    </div>

                            </div>
                            

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong>Link:</strong>

                                        <input class="form-control"  name="link" placeholder="Enter the link "></input>
                                    </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="from-group"> 

                            <strong>Select Image:</strong>

                            <input name="image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                            <img src="" id="preview" style="max-width: 150px;"/>  
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <strong>Descriptions:</strong>

                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Enter the description"></textarea>

                                </div>

                                </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">

                                <strong> Status :</strong>
                                <select class="form-control"  name="status">     
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    </select>
                                
                            </div>

                        </div>
                                        
                        <div class="col-xs-12 col-sm-12 col-md-12 ">

                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger mr-1 float-right" href="{{ route('banner.index') }}">
                                            <i class="fas fa-undo"></i> Back</a>      
                             
                        </div>

                    </div>



                </form>


                </div>
             </div>
        </div>
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