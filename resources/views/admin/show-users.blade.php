@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">All Users 
               <a href="/add-users" class="btn btn-success ">Add Users</a>
               </div>
                     <div class="card-body">
                        <!-- @if(Session::has('categories_delete'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('categories_delete')}}
                        </div>
                            @endif -->

                       <table class="table table-striped">
                       
                       <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($user as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            
                            @if($user->photo!=null)
                            <img src="{{asset('images')}}/{{$user->photo}}" width="100px;" height="100px;" alt="image">
                            @else
                            no image avalible
                            @endif
                            
                            </td>
                            <td>
                            <a href="/single/{{$user->id}}" class="btn btn-sm btn-info">Details</a>
                            <a href="/edit-user/{{$user->id}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="/delete-user/{{$user->id}}" class="btn btn-sm btn-danger">Delete</a>
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