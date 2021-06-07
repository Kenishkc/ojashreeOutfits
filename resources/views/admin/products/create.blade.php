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
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf



                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong>Product Name:</strong>

                                        <input type="text" name="name" class="form-control" placeholder="Name">

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">

                                            <strong>Price:</strong>

                                            <input class="form-control"  name="price" placeholder="Rs."></input>
                                        </div>

                                </div>
                                

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">

                                            <strong>Discounted Price:</strong>

                                            <input class="form-control"  name="discount_price" placeholder="Rs."></input>
                                        </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="from-group">

                                <strong>Manufacturer Date: </strong>

                                <input class="from-control" name="manuf_date" type="date"></input>
                                
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                            <strong>Category type:</strong>
                                            <select class="form-control"   name="cat_id" >           
                                            @foreach ($category as $c)
                                            <option value="{{$c->id}}">{{$c->title}}</option>            
                                            @endforeach
                                            </select>
                                    </div> 

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="from-group"> 

                                <label for ="file">Select Image:</label>

                                <input name="images[]" type="file" multiple="multiple" class="form-control" />
                                                <img src="" id="previewImg" style="max-width:130px;margin-top:20px;">
                                            

                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <strong>Short Detail:</strong>

                                    <input class="form-control"  name="short_detail" placeholder="Short Descriptions"></input>

                                </div>

                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong>Descriptions:</strong>

                                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>

                                    </div>

                                    </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong> IN Stock :</strong>

                                        <input class="form-control" name="stock" placeholder="Availabe in stock"></input>

                                    </div>

                                </div>
                                        
                                <div class="col-xs-12 col-sm-12 col-md-12 ">

                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-danger mr-1 float-right" href="{{ route('products.index') }}">
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

@section('name')






@endsection