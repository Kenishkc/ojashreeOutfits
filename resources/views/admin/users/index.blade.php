@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
      <div class="col-md-12">
         <div class="card p-2">
            <div class="card-body">
              
               <table class="table table-striped display nowrap" style="width:100%" id="datatable">
                  <thead class="thead-dark" >
                     <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $data)
                     <tr>
                        <td>{{$data['id']}}</td>
                        <td>{{$data['name']}}</td>
                           <td> 
                          @if(is_null($data->photo)) 
                            <img src="{{asset('profile_picture/default-pp.png')}}"  width="100px;" height="100px;" alt="image">
                          @else
                              <img src="{{asset('images')}}/{{$data->photo}}" width="100px;" height="100px;" alt="image">
                          @endif          
                          </td>
                        <td>{{$data['email']}}</td>
                        <td> @foreach($data->getRoleNames() as $role)
                           {{ $role }}
                           @endforeach
                        </td>
                        <td>
                        <a class="btn btn-info" href="{{ route('users.show',$data->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('users.edit',$data->id) }}">Edit</a>

                              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $data->id],'style'=>'display:inline']) !!}

                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                              {!! Form::close() !!}                    
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
                     <a  href="{{ route('users.create') }}" class="btn btn-success btn-sm">Add New User</a>
            
            </div>
         </div>
      </div>
   </div>
</section>



@endsection

