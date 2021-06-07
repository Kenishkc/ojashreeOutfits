@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
      <div class="col-md-12">
         <div class="card p-2">
            <div class="card-body">
      
                       <table class="table table-striped" style="width:100%"  id="datatable">

                       <thead class="thead-dark">
                            <tr>
                                <th>S.N</th>           
                                <th>Customer Name</th>
                                <th>Payment ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($order as $s)
                      
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$s->user->name}}</td>
                            <td>{{$s->payment_id}}</td>
                                      
                            <td>
                                {{$s->status}}
                            </td>
        
   
                           
                            <td>
                                 
                                 
                                    <a href="{{route('order.show',$s)}}" class="btn btn-info btn-sm mr-1 "><i class="fa fa-eye"> Details</i></a>
                               
                                  
                             </td>
                                                  
                        </tr>

    

                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                 </div>
         </div>
      </div>
   </div>
</section>

@endsection