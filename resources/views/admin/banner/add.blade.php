@extends('admin.index')
@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Create New User</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('banner.index') }}"> Back</a>

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




{!! Form::open(array('route' => 'banner.store','method'=>'POST','files'=> true)) !!}

<div class="row">

    <div class="col-xs-9 col-sm-9 col-md-9">

        <div class="form-group ">
            <strong>Banner Name:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Name',
            'class' => "form-control (isset($errors->has('title')) ? 'is-invalid':'' )")) !!}
             </div>
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $message }}</div>
             @endif
    </div>

<div class="col-xs-9 col-sm-9 col-md-9">
    
        <div class="form-group ">
            <strong>Status :</strong>
            {!! Form::select('status', ['active'=>'Active','inactive'=>'Inactive'],'', array(
            'class' => "form-control (isset($errors->has('title')) ? 'is-invalid': '' )")) !!}
             </div>
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $message }}</div>
             @endif
    </div>


<div class="col-xs-9 col-sm-9 col-md-9">

    <div class="form-group ">

        <strong>Image:</strong>

        {{ Form::file('image', array('onchange' => 'loadFile(event)','require' => 'true')) }} 
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