@extends('admin.index')
@section('content')

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


<section style="padding-top:60px;">
   <div class="container">
      <div class="col-md-12">
         <div class="card p-2">
            <div class="card-body">
 
                <table class="table table-striped" style="width:100%" id="datatable">
                <thead class="thead-dark" >
                     <tr>

                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discounted Price</th>
                        <th>Category</th>
                      
                        <th>stock</th>

                        

                        <th width="280px">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($products as $product)

                    <tr>

                        <td>{{$loop->iteration  }}</td>
                        <td>{{ $product->name }}</td>
                
                         <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                    
                        <th>{{ $product->category->title }}</th>

                         <td>{{$product->stock}}</td>
                        
                        <td>

                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                                @can('product-edit')

                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                                @endcan



                                @csrf

                                @method('DELETE')

                                @can('product-delete')

                                <button type="submit" class="btn btn-danger">Delete</button>

                                @endcan

                            </form>

                        </td>

                    </tr>

                    @endforeach
                </tbody>
                </table>



                {!! $products->links() !!}


                     <a  href="{{ route('products.create') }}" class="btn btn-success btn-sm">Create New Product</a>
              
            </div>
         </div>
      </div>
   </div>
</section>

@endsection