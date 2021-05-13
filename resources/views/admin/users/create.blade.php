@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-8 offset-md-1">
            <div class="card p-2">
              <div class="card-header text-white text-bold bg-secondary">
               Add New User
               </div>
               <div class="card-body">
                        <form method="POST"  action="{{route('users.store')}}" enctype="multipart/form-data">
                         @method('POST')
                        @csrf
                        <div class="form-group">
                             <label for ="Name">Name:</label>
                             <input required="" type="text" name="name" class="form-control" placeholder="Enter User Name"/>                            
                               @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                           <div class="form-group">
                             <label for ="email">Email</label>
                             <input required="" type="email" name="email" class="form-control" placeholder="Enter Email address"/>                            
                               @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div> 
                           
                           
                            <div class="form-group">
                             <label for ="Password">Password</label>
                             <input required="" type="Password" name="password" class="form-control" placeholder="Enter Password"/>                            
                               @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>     
                           
                            <div class="form-group">
                             <label for ="confirm-password">Confirm Password</label>
                             <input required="" type="Password" name="confirm-password" class="form-control" placeholder="Confirm Password"/>                            
                               @error('confirm-password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>   
                           
                            <button type="submit" class="btn btn-success" >Add User</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                                                

                           </div>
                         </div>
                       </form>
                    </div>
             </div>
        </div>
    </div>
</section>    





<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Create New User</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

        </div>

    </div>

</div>



@if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif




{!! Form::open(array('route' => 'users.store','method'=>'POST','files'=> true)) !!}

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>

            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Password:</strong>

            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Confirm Password:</strong>

            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Role:</strong>

            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>Profile Picture:</strong>

    {{ Form::file('photo', ['onchange' => 'loadFile(event)']) }} 
     <img id="output" class="rounded mx-auto d-block"  style="height: 100px; width: 150px;"/>
   


</div>



</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>

{!! Form::close() !!}
@endsection

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>