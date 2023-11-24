<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
  <!-- Include SweetAlert JS -->
  <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('backend')}}/dist/img/nmpc-logo.png" alt="npmc-logo" height="100" width="200">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
         Admin <i class="fas fa-sign-out-alt"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="{{ route('logout') }}" class="dropdown-item"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-sign-out-alt"></i>   
           <p> {{ __('Logout') }}<p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li> -->

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend')}}/dist/img/nmpc-logo.png" alt="nmpc logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MSUIIT NMPC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
    <a href="{{ route('resolutions.index') }}" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Resolutions
        </p>
    </a>
</li>



        <!-- Add a new list item for Logout with the same style and margin -->
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="tabs">
    <div class="title">BOD Resolutions and Issuances</div>
        <div class="tab-header">
            <div class="active">Pakigsayud</div>
            <div>Forms/Guides</div>
            <div>Downloadable Files</div>
        </div>
        <div class="tab-indicator">
            <div></div>
        </div>
        <div class="tab-body">
            <div class="active">
                <h2>Pakigsayud</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores cumque quo, iusto consectetur explicabo aut sequi! Corrupti iusto, nemo odit quam tenetur aliquam excepturi nobis animi rerum quis quos. Voluptate!</p>
                <p>Accusantium, voluptatibus, iusto consequatur soluta commodi totam, maiores sapiente in sed illum distinctio aliquid voluptas neque tempore earum voluptatum modi recusandae nobis perspiciatis inventore! Perferendis nulla accusamus quidem dicta aliquid?</p>
                <p>Cupiditate itaque minima reprehenderit nam vitae voluptatem, ipsam facere nulla tempore magni delectus porro tenetur nesciunt veniam hic dolores aliquam ipsum expedita vel nobis molestiae omnis. Dolor totam dolorem magni.</p>
                <p>Enim eveniet totam laborum esse! Nulla ad modi ea possimus, atque dolor ratione iusto magnam eos ipsam nam itaque molestiae dolorum aspernatur exercitationem ex dolorem animi deserunt, repudiandae, natus accusamus.</p>
            </div>
            <div>
                <h2>Forms/Guides</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores cumque quo, iusto consectetur explicabo aut sequi! Corrupti iusto, nemo odit quam tenetur aliquam excepturi nobis animi rerum quis quos. Voluptate!</p>
                <p>Accusantium, voluptatibus, iusto consequatur soluta commodi totam, maiores sapiente in sed illum distinctio aliquid voluptas neque tempore earum voluptatum modi recusandae nobis perspiciatis inventore! Perferendis nulla accusamus quidem dicta aliquid?</p>
                <p>Cupiditate itaque minima reprehenderit nam vitae voluptatem, ipsam facere nulla tempore magni delectus porro tenetur nesciunt veniam hic dolores aliquam ipsum expedita vel nobis molestiae omnis. Dolor totam dolorem magni.</p>
                <p>Enim eveniet totam laborum esse! Nulla ad modi ea possimus, atque dolor ratione iusto magnam eos ipsam nam itaque molestiae dolorum aspernatur exercitationem ex dolorem animi deserunt, repudiandae, natus accusamus.</p>
            </div>
            <div>
                <h2>Downloadable Files</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores cumque quo, iusto consectetur explicabo aut sequi! Corrupti iusto, nemo odit quam tenetur aliquam excepturi nobis animi rerum quis quos. Voluptate!</p>
                <p>Accusantium, voluptatibus, iusto consequatur soluta commodi totam, maiores sapiente in sed illum distinctio aliquid voluptas neque tempore earum voluptatum modi recusandae nobis perspiciatis inventore! Perferendis nulla accusamus quidem dicta aliquid?</p>
                <p>Cupiditate itaque minima reprehenderit nam vitae voluptatem, ipsam facere nulla tempore magni delectus porro tenetur nesciunt veniam hic dolores aliquam ipsum expedita vel nobis molestiae omnis. Dolor totam dolorem magni.</p>
                <p>Enim eveniet totam laborum esse! Nulla ad modi ea possimus, atque dolor ratione iusto magnam eos ipsam nam itaque molestiae dolorum aspernatur exercitationem ex dolorem animi deserunt, repudiandae, natus accusamus.</p>
            </div>
        </div>
</div> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend')}}/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
