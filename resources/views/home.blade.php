<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Dashboard</title>

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
  <link rel="stylesheet"  href="{{ asset('css/user.css') }}">
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
    .active {
        background-color: #9C0D0F;
    }

    .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
    .big {
    background-image: url("{{ asset('images/background.png') }}");
    background-repeat: no-repeat;
    background-size: cover; /* Adjust as needed */
    background-position: center; /* Adjust as needed */
    /* Other background properties can be added as needed */
}
</style>

<body class="hold-transition sidebar-mini layout-fixed" id = "custom-body">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('backend')}}/dist/img/nmpc-logo.png" alt="npmc-logo" height="100" width="200">
  </div>
<!-- nav bar -->
  <header>
  <div class="main-header">
    <img src="{{ asset('images/nmpc-logo.png') }}" class="logo" max-width="10%" max-height="5%">
      <p class="nmpc">MSU-IIT<br>NATIONAL MULTI-PURPOSE COOPERATIVE</p>  

      <div class="user-image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>

      </div>
</header>
     
<body>
<nav class="mt-2">
    <ul class="nav" data-widget="treeview" role="menu" data-accordion="false">
       
        <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

<!-- Add this somewhere in your HTML to display the "No results found" message -->
<div id="noResultsMessage" style="display: none;">No results found.</div>
  <div class="search-container">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <i class="fas fa-filter filter-icon" id="myFilter" data-toggle="modal" data-target="#filterModal"></i>
    <div id="noResultsMessage" style="display: none;">No results found.</div> 
</div>
      
  

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
<!-- ... existing code ... -->

<div class="tab-body">
<div class="active" id="custom-active">
<div class="cont">
        <ul class="list-unstyled">
            @foreach($pakigsayudResolutions as $resolution)
            <div class="card mb-3">
            <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                @if ($resolution->photo)
                                <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                                    class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded"
                                    style="width: 300px; height: 300px;">
                                        <span class="text-muted">No Photo Available</span>
                                </div>
                            @endif
            </div>
            <div class="col-md-9">
            <div class="card-body custom-card-body" style="padding-left: 20px;">
            <h5 class="card-title mt-0 mb-1">{{ $resolution->title }}</h5>
            <p class="card-text">{{ $resolution->description }}</p>
                    </div>
            <p class="card-text memo">Memorandum No. {{ $resolution->memorandum_number }}</p>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
<div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
<a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-warning btn-sm">
                                 View
                            </a>
                            <!-- Assuming your download link leads to the file_path -->
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-info btn-sm" download>
                                Download
                            </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        </ul>
    </div>

    <!-- Forms/Guides Category -->
    <div>

    <div id="custom-active">
        <ul class="list-unstyled">
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
                        <p>{{ $resolution->description }}</p>
                        <div class="mt-3">
                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-primary">View Details</a>
                            <!-- Assuming your download link leads to the file_path -->
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-success" download>Download</a>
                        </div>
                    </div>
                </li>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Downloadable Files Category -->
    <div>
    <div id="custom-active">
        <ul class="list-unstyled">
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
                            <div class="col-md-9">
                    <div class="card-body custom-card-body" style="padding-left: 20px;">
                        <h5 class="card-title mt-0 mb-1">{{ $resolution->title }}</h5>
                        <!-- <p>{{ $resolution->memorandum_number }}</p> -->
                        <p class="card-text">{{ $resolution->description }}</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                          <div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-primary">View Details</a>
                            <!-- Assuming your download link leads to the file_path -->
                            <a href="{{ asset('storage/' . $resolution->file_path) }}" class="btn btn-success" download>Download</a>
                        </div>
                    </div>
                </li>
                </li>
            @endforeach
        </ul>
    </div>
</div>


<!-- ... existing code ... -->

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
