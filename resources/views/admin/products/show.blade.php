@extends('admin.index')



@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h3 class="my-1" style="color:blue;">Product Description
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </h3>

        </div>

    </div>

</div>



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Product Name: </strong>{{$product->name}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Price: </strong></b> {{$product->price}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Short Details: </strong>{{$product->short_detail}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Discounted Price:</strong>{{$product->discount_price}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Manf. Date </strong>{{$product->manuf_date}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="card">
                            <div class="row">
                                @foreach($product->images as $images)
                                <div class='title'>
                                    <a class="item" href="#" data-image-id="" data-toggle="modal">
                                        <img style="border:white solid 4px;" class="item" src="{{asset('images/'. $images->images)}}" alt="{{ $images->images }}" height="200" width="200">
                
                                        <button style="position:absolute; top:0px; float:none" onclick="handeldelete({{$images->id}})" class='delete' title="Delete Image">
                                            <i class="fa fa-times"></i></button>
                                        
                                  </a>
                                    <!-- Mymodel for delete -->
                                    <div id="deletemodal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <form id="deleteimg" action="{{route('delete',$images->id)}}" method="POST" id="delete">
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
                                </div>
                                @endforeach
                            </div>
                            </div>
                    </div>

        
    </div>


@section('script')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    function handeldelete(id) {

        var form = document.getElementById('deleteimg')
        form.action = '/deleteimg/' + id

        $('#deletemodal').modal('show')

    }
</script>
@endsection

<style>
    .delete {
        color: green;
        display: none;
    }

    .title:hover .delete {
        display: block
    }
</style>
@stop