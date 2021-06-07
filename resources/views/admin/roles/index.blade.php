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
 
           <table class="table table-striped display nowrap" style="width:100%" id="datatable">
          <thead class="thead-dark" >
              
            <tr>

                <th>No</th>

                <th>Name</th>

                <th width="280px">Action</th>

            </tr>
          </thead>
          <tbody>
                @foreach ($roles as $key => $role)

                <tr>

                    <td>{{ ++$i }}</td>

                    <td>{{ $role->name }}</td>

                    <td>

                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>

                        @can('role-edit')

                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                        @endcan

                        @can('role-delete')

                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}

                        @endcan

                    </td>

                </tr>

                @endforeach
          </tbody>
            </table>
            {!! $roles->render() !!}
            <a  href="{{ route('roles.create') }}" class="btn btn-success btn-sm">Add New Role</a> 
            </div>
         </div>
      </div>
   </div>
</section>




@endsection