@extends('admin.index')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Product</h2>

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

            <!-- <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Category type:</strong>

                        <select class="form-control" type="drop4down"  name="cat_id" placeholder="Enter the category id"></select>

            </div> -->

            <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="from-group"> 

            <label for ="file">Select Image:</label>

            <input name="images[]" type="file" multiple="multiple" id="profileImage"   class="form-control" />
            <div class="row" id="preview_img">
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
                      
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">Submit</button>

		    </div>

		</div>



    </form>


@endsection