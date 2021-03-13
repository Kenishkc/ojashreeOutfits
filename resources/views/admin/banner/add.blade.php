@extends('admin.index')
@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Create New Banner</h2>

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


<div class="container-fluid">

{!! Form::open(array('route' => 'banner.store','method'=>'POST','files'=> true)) !!}

 <div class="form-group row">
    <strong>
      {!! Form::label('title', 'Title:',['class' => 'col-sm-3'])!!}
    </strong>
    <div class="col-sm-9">
      {!! Form::text('title','',['placeholder' => 'Enter Banner Titile',
      'class'=>"form-control (isset($errors->has('title')) ? 'is-invalid':'' )",
      'required'=>true])!!}
     
     @if($errors->has('title'))
       <div class="alert alert-danger">{{ $message }}</div>
     @endif
  </div> 
</div>  

<div class="form-group row">
    <strong>
      {!! Form::label('link', 'Link:',['class' => 'col-sm-3'])!!}
    </strong>
    <div class="col-sm-9">
      {!! Form::text('link','',['placeholder' => 'Enter Banner link',
      'class'=>"form-control (isset($errors->has('link')) ? 'is-invalid':'' )",
      'required'=>true])!!}
     
     @if($errors->has('link'))
       <div class="alert alert-danger">{{ $message }}</div>
     @endif
  </div> 
</div>  





<div class="form-group row">
    <strong>
      {!! Form::label('status','stat:',['class' => 'col-sm-3'])!!}
    </strong>
    <div class="col-sm-7">
    {!! Form::select('status', ['active'=>'Active','inactive'=>'Inactive'],'', [
    'class' => "form-control (isset($errors->has('status')) ? 'is-invalid': '' )"]) !!}
            
     @if($errors->has('status'))
       <div class="alert alert-danger">{{ $message }}</div>
     @endif
  </div> 
</div>



<div class="col-xs-9 col-sm-9 col-md-9">
    <div class="form-group row ">
        <strong>{!! Form::label('image', 'Image:')!!}</strong>
        {{ Form::file('image', array( 'onchange' => 'loadFile(event)','require' => 'true')) }} 
        @if($errors->has('image'))
       <div class="alert alert-danger">{{ $message }}</div>
     @endif
<div class="col-xs-3 col-sm-3 col-md-3">
<img id="output" class="rounded mx-auto d-block"  style="height: 100px; width:350 px;"/>

</div>




</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

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