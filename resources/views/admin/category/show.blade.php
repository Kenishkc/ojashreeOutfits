@extends('admin.index')
@section('content')

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      
            <img src="{{asset('images')}}/{{$category->image}}" width="100px;" height="100px;" alt="image">  
            <h3 class="text-white"><strong>{{$category->title}}</strong></h3>
            <p class=" text-white"></strong>{{$category->description}}</p>
           
    </button>

    @if(count($category->subcategory))
    <ul class="dropdown-menu multi-level" aria-labelledby="dropdownMenu"> 
        <a class="dropdown-item " href="#">
         @include('admin.category.subCategoryList',['subcategories' => $category->subcategory])
        </a>    
    </ul>
</div>
@endif


@endsection