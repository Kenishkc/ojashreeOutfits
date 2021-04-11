<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('../vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/custome.css')}}" rel="stylesheet">
   <!-- css of  DataTAble -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

  {{-- <link href="{{asset('css/fresh-bootstrap-table.css')}}" rel="stylesheet" /> --}}

  <!-- Fonts and icons -->
  <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
 


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
          <h1 class="h3 mb-4 text-center text-gray-800">Wellcome to Dashbord</h1>
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
