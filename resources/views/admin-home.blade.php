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

<style>
  body {
    font-family: 'Open Sans', sans-serif;
  }
      
  .custom-card {
    max-width: 50rem;
    margin: 0 auto;
    margin-top: 10rem;
  }

  #custom-active {
            width: 50rem; /* Adjust the width as needed */
        margin: 0 auto; /* Center the div */
        border: 1px solid #ddd; /* Add a border */
        padding: 20px; /* Add padding as needed */
        background: #9C0D0F;     
  }

  .card1 {
    background: #fff;
    padding: 2px 2px 2px 2px;     

  }

  .memo {
        font-weight: 550; /* Set the desired font weight */
        margin-bottom: 5px;
        font-size: 14px;
    }

  .custom-description {
        font-weight: 400; /* Set the desired font weight */
        margin-bottom: 2rem;
        font-size: 14px;
    }

    .custom-date {
        font-weight: 300; /* Set the desired font weight */
        font-size: 12px;
        margin-right: 9rem;
        margin-top: 1rem;
    }

</style>

<body class="hold-transition sidebar-mini layout-fixed" id = "custom-body">
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
        <a class="nav-link" data-widget="navbar-search" href="#"  role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" id="search" placeholder="Search" aria-label="Search">
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
            <a href="{{ route('admin.home') }}" class="nav-link">
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

  <!-- <div class="search-bar">
    <div class="input-group">
        <input id="search-input" class="form-control" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#filterModal">
                <i class="fas fa-filter"></i>
            </button>
        </div>
    </div>
</div> -->

<div class="card custom-card">
  <div class="tabs">
    <!-- <div class="title">BOD Resolutions and Issuances</div> -->

        <div class="tab-header">
            <div class="active">Pakigsayud</div>
            <div>Forms/Guides</div>
            <div>Downloadable Files</div>
        </div>
        <div class="tab-indicator">
            <div></div>
        </div>


    <div class="tab-body">
        <div class="active" id="custom-active">
            <!-- <h2>Pakigsayud</h2> -->
            <!-- <ul class="list-unstyled"> -->
              <div class="cont">
                
                <ul class="list-unstyled">
                <!-- <div class="card1"> -->
    @foreach($pakigsayudResolutions as $resolution)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center">
                    @if ($resolution->photo)
                        <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                            class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                    @else
                        <div class="bg-light d-flex justify-content-center align-items-center rounded"
                            style="width: 150px; height: 150px;">
                                <span class="text-muted">No Photo Available</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="card-body custom-card-body" style="padding-left: 20px;">
                        <h5 class="card-title mt-0 mb-1">{{ $resolution->title }}</h5>
                        <p class="card-text memo">Memorandum No. {{ $resolution->memorandum_number }}</p>
                        <p class="card-text custom-description">{{ $resolution->description }}</p>
                        <!-- <p class="card-text custom-date">Date Created: {{ $resolution->created_at }}</p> -->
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                    <p class="card-text custom-date">Date Created: {{ $resolution->created_at }}</p>

                          <div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-warning btn-sm">
                                 View
                            </a>
                            <a href="{{ route('resolutions.edit', $resolution->id) }}" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-info btn-sm" download>
                                Download
                            </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- </div> -->

            </ul>
            
        </div>
    </div>

    <!-- Forms/Guides Category -->
    <div id="custom-active">
        <!-- <h2>Forms/Guides</h2> -->
        <ul class="list-unstyled">
        <!-- <div class="card1"> -->
    @foreach($formGuidesResolutions as $resolution)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center">
                    @if ($resolution->photo)
                        <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                            class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                    @else
                        <div class="bg-light d-flex justify-content-center align-items-center rounded"
                            style="width: 150px; height: 150px;">
                                <span class="text-muted">No Photo Available</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="card-body custom-card-body" style="padding-left: 20px;">
                        <h5 class="card-title mt-0 mb-1">{{ $resolution->title }}</h5>
                        <!-- <p class="card-text">{{ $resolution->memorandum_number }}</p> -->
                        <p class="card-text">{{ $resolution->description }}</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                          <div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-warning btn-sm">
                                 View
                            </a>
                            <a href="{{ route('resolutions.edit', $resolution->id) }}" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-info btn-sm" download>
                                Download
                            </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- </div> -->

        </ul>
    </div>

    <!-- Downloadable Files Category -->
    <div id="custom-active">
        <!-- <h2>Downloadable Files</h2> -->
        <ul class="list-unstyled">
        <!-- <div class="card1"> -->
    @foreach($downloadableFilesResolutions as $resolution)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center">
                    @if ($resolution->photo)
                        <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                            class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                    @else
                        <div class="bg-light d-flex justify-content-center align-items-center rounded"
                            style="width: 150px; height: 150px;">
                                <span class="text-muted">No Photo Available</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="card-body custom-card-body" style="padding-left: 20px;">
                        <h5 class="card-title mt-0 mb-1">{{ $resolution->title }}</h5>
                        <!-- <p class="card-text">{{ $resolution->memorandum_number }}</p> -->
                        <p class="card-text">{{ $resolution->description }}</p>
                    </div>
                        <div class="col-md-12 d-flex justify-content-end">
                          <div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-warning btn-sm">
                                 View
                            </a>
                            <a href="{{ route('resolutions.edit', $resolution->id) }}" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-info btn-sm" download>
                                Download
                            </a>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- </div> -->

        </ul>
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

<!-- <script>
  function applyFilters() {
        // Get selected filter options and perform filtering logic
        const filterOption1 = document.getElementById('filterOption1').checked;
        const filterOption2 = document.getElementById('filterOption2').checked;

        // Add your logic to filter based on selected options

        // Close the modal after applying filters
        $('#filterModal').modal('hide');
    }

    // Handle search functionality
    document.getElementById('search-input').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        // Add your logic to filter content based on the search term
        // You might want to make an AJAX request to your backend for dynamic searching

        // Example: Filtering content with jQuery
        $('.tab-body div').hide().filter(':contains(' + searchTerm + ')').show();
    });
</script> -->

<!-- Add this script tag if you haven't included jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Add this script in the head or at the end of the body section -->
<script>
  $(document).ready(function () {
    // Toggle the search bar when the search link is clicked
    $('#search').on('click', function (e) {
      e.preventDefault();
      $('.navbar-search-block').toggle(); // Show/hide the search bar
    });

    // Close the search bar when the close button is clicked
    $('.btn-navbar[data-widget="navbar-search"]').on('click', function () {
      $('.navbar-search-block').hide();
    });
  });
</script>


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
