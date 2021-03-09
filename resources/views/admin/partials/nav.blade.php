@section('navbar')

 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
             </div>
            <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
              </a>

             <!-- Divider -->
           <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                       <span>Dashboard</span></a>
                     </li>

            <!-- Divider -->
           <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-user"></i>
                            <span>User Managerment</span>
                        </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Components:</h6>
                            <a class="collapse-item" href="/add-users">
                            <i class="fas fa-fw fa-plus"></i>
                            Add Users</a>
                            <a class="collapse-item" href="{{ route('users.index') }}">
                            <i class="fas fa-list"></i>
                            Show Users</a>
                        </div>
                 </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserole" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-lock"></i>
                            <span>Role Managerment</span>
                        </a>
                            <div id="collapserole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Role & permission:</h6>
                            <a class="collapse-item" href="{{ route('roles.index') }}">
                            <i class="fas fa-fw fa-plus"></i>
                            Role</a>
                            <a class="collapse-item" href="{{ route('users.index') }}">
                            <i class="fas fa-list"></i>
                            Assign Role</a>
                        </div>
                 </div>
            </li>           

             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                        
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-box-open"></i>
                  <span>Products</span>
                 </a>
                  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('products.create') }}"><i class="fas fa-fw fa-plus"></i> Add Products</a>
                            <a class="collapse-item" href="{{ route('products.index') }}"><i class="fas fa-list"></i> Show Products</a>
                     </div>
                 </div>
            </li>

            <li class="nav-item">
        <a class="nav-link" href="{{route('banner.index')}}">
        <i class="fas fa-image"></i>
        Banner</a>
      </li>
</ul>