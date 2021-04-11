@extends('admin.index')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('products.update',$product->id) }}" method="POST">

    	@csrf

        @method('PUT')



         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Name:</strong>

		            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">

		        </div>

		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Detail:</strong>

		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Price:</strong>

		            <input type="text" name="price" value="{{ $product->price }}" class="form-control">

		        </div>

		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Manufacturer Date:</strong>

		            <input type="text" name="manuf_date" value="{{ $product->manuf_date }}" class="form-control">

		        </div>

		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Discount Price:</strong>

		            <input type="text" name="discount_price" value="{{ $product->discount_price}}" class="form-control">

		        </div>

		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Short Details:</strong>

		            <input type="text" name="short_detail" value="{{ $product->short_detail }}" class="form-control">

		        </div>

		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>Stock:</strong>

		            <input type="text" name="stock" value="{{ $product->stock }}" class="form-control">

		        </div>

		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="from-group"> 

                <label for ="file">Select Image:</label>

                <input name="images[]" type="file" multiple="multiple" class="form-control" />
                                <img src="" id="previewImg" style="max-width:130px;margin-top:20px;">
                            

                </div>

                            <div class="column" style="padding-right:5px; float:center;"  >
                        
                            @foreach($product->images as $image)      
                            <img  
                            src="{{asset('images/'. $image->images)}}" alt="{{ $image->images }}" width="200" height="200">
                            @endforeach
                            
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <form action="{{route('delete',$image->id)}}" method="post">
                                        @csrf
                                        @Method('GET')
                                        <input type="hidden" name="id" value="{{$image->id}}"/>
                                        <button type="submit" class="btn btn-sm btn-danger ml-2">Delete</button>
                                    </form>
                               </div>
         
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		      <button type="submit" class="btn btn-primary">Submit</button>

		    </div>

		</div>



    </form>


@endsection