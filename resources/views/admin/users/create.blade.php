@extends('admin.index')
@section('content')

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



<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-8 offset-md-1">
            <div class="card p-2">
              <div class="card-header text-white text-bold bg-secondary">
               Add New User
               </div>
               <div class="card-body">
   
                        {!! Form::open(array('route' => 'users.store','method'=>'POST','files'=> true)) !!}


                    <div class="form-group">

                        <strong>Name:</strong>

                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                    </div>

                    <div class="form-group">
                        <label for="phoneno"><strong>Phone:</strong></label>
                      
                        {!! Form::text('phone', null, array('placeholder' => 'Enter Phone number','class' => 'form-control')) !!}

                    </div>
                

            

                    <div class="form-group">

                        <strong>Email:</strong>

                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                    </div>

            

            

                    <div class="form-group">

                        <strong>Password:</strong>

                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                    </div>



            

                    <div class="form-group">

                        <strong>Confirm Password:</strong>

                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                    </div>

            

            

             

                


   

                <div class="form-group">

                    <strong>Profile Picture:</strong>

                    {{ Form::file('photo', ['onchange' => 'loadFile(event)']) }} 
                    <img id="output" style="max-height:100px; "/>
                


                </div>

                             <button type="submit" class="btn btn-success" >Add User</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                     

                    {!! Form::close() !!}

                  </div>
             </div>
        </div>
    </div>
</section>    

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