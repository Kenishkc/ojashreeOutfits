<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>

 
  @include('admin.partials.css')
  @yield('css')
  @toastr_css
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   @include('admin.partials.nav')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.partials.topbar')

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
            @yield('content')

       </div>
          <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
           @include('admin.partials.footer')
          <!-- End of Footer -->

          </div>
          <!-- End of Content Wrapper -->

          </div>
          <!-- End of Page Wrapper -->

           <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>

  <!-- Logout Modal-->
      @include('admin.partials.logoutModal')
  <!-- Bootstrap core JavaScript-->
      @include('admin.partials.script')
      @yield('script')
</body>

@toastr_js
@toastr_render
</html>
