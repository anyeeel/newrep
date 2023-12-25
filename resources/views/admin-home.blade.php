<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!--Filter and Searchbar 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   -->
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
  <link rel="stylesheet"  href="{{ asset('css/admin.css') }}">
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

  <!-- Navbar -->
  <header>
  <div class="main-header">
    <img src="{{ asset('images/nmpc-logo.png') }}" class="logo" max-width="10%" max-height="5%">
      <p class="nmpc">MSU-IIT<br>NATIONAL MULTI-PURPOSE COOPERATIVE</p>  

      <div class="user-image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      </div>
</header>

<body>

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('backend')}}/dist/img/nmpc-logo.png" alt="npmc-logo" height="100" width="200">
  </div>

<nav class="mt-2">
    <ul class="nav" data-widget="treeview" role="menu" data-accordion="false">
       
        <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
    <a href="{{ route('resolutions.index') }}" class="nav-link">
        <p>
            Resolutions
        </p>
    </a>
</li>
  
<!-- Add a new list item for Logout with the same style and margin -->
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


<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Modified Filter options form -->
          <form class="form" method="POST" action="#">
            <div class="input-group input--large">
              <label class="label">Title</label> <br>
              <input class="input--style-1" type="text" placeholder="Filter by title" name="title" style="width: 55rem;">
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label class="label">Month</label>
                <select class="form-control" id="input-month">
                  <option value="0">All Months</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <!-- Add other months as needed -->
                </select>
              </div>
              <div class="col-sm-6">
                <label class="label">Year</label>
                <select class="form-control" id="input-year">
                  <option value="0">All Years</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <!-- Add other years as needed -->
                </select>
              </div>
            </div>
          </form>
        </div>
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
