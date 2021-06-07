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
            <div class="card p-2  mb-5">
              <div class="card-header text-white text-bold bg-secondary">
               Add New Role
               </div>
               <div class="card-body">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Name:</strong>

                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Permission:</strong>

                            <br/>

                            @foreach($permission as $value)

                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}

                                {{ $value->name }}</label>

                            <br/>

                            @endforeach

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <button type="submit" class="btn btn-success">Submit</button>
                         <a href="{{ route('roles.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                     
                    </div>

                </div>

                {!! Form::close() !!}

               </div>
             </div>
        </div>
    </div>
</section>    


@endsection