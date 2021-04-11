
@foreach($subcategories as $subcategory)
<li class="dropdown-submenu">
  <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <strong> Category Name:</strong>
   {{$subcategory->title}}
    <img src="{{asset('images')}}/{{$subcategory->image}}" width="100px;" height="100px;" alt="image">
  </button>
  @if(count($subcategory->subcategory))
       <ul class="dropdown-menu">
       @include('admin.category.subCategoryList',['subcategories' => $subcategory->subcategory])
      </a>
  </ul>
</li>
@endif
@endforeach

