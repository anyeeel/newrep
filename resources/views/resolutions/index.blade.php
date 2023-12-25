<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Resolutions and Issuances / List</title>
</head>

<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }
    .custom-title-color {
        color: #9C0D0F; /* Set the desired font color */
    }

    .custom-font-weight {
        font-weight: 501; /* Set the desired font weight */
        margin-bottom: 1px;
    }

    .custom-category {
        margin-bottom: 1px;
        font-size: 16px;
    }

    .custom-date {
        font-size: 16pxpx;
        font-weight: 300;
    }
    
    .custom-content {
        width: 80%; /* Adjust the width as needed */
        margin: 0 auto; /* Center the div */
        border: 1px solid #ddd; /* Add a border */
        padding: 20px; /* Add padding as needed */
    }

    [class*=sidebar-dark-] {
    background-color: #007bff !important;
}
</style>

<!-- Navbar -->


<body>


<!-- Add this somewhere in your HTML to display the "No results found" message -->

  
@extends('layouts.datatable')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List of Resolutions and Issuances</h1>
                
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <div class="search-container">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
  
    <div id="noResultsMessage" style="display: none;">No results found.</div> 
</div></li>
                    <li class="breadcrumb-item active">  <i class="fas fa-filter filter-icon" id="myFilter" data-toggle="modal" data-target="#filterModal"></i></li>
            
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<div class="content custom-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('resolutions.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Add Resolution/Issuance
                        </a>

                        <ul class="list-unstyled">
                            @forelse($resolutions as $resolution)
                                <li>
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                                                    class="img-fluid rounded" style="max-width: 200px; max-height: 200px; padding-left: 2rem;">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-body"  style="padding-left: 20px;">
                                                    <h5 class="card-title custom-title-color">{{ $resolution->title }}</h5>
                                                    <!-- <p class="card-text">{{ $resolution->description }}</p> -->
                                                    <p class="card-text custom-font-weight">Memorandum No. {{ $resolution->memorandum_number }}</p>
                                                    <!-- <p class="card-text custom-category"> {{ $resolution->category }}</p> -->
                                                    <p class="card-text custom-date">Date Created: {{ $resolution->created_at }}</p>
                                                    <!-- <p class="card-text">File Path:
                                                        @if ($resolution->file_path)
                                                            <a href="{{ asset('storage/' . $resolution->file_path) }}" target="_blank">{{ $resolution->file_path }}</a>
                                                        @else
                                                            No file
                                                        @endif
                                                    </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <div class="d-flex" style="padding-right: 20px; padding-bottom: 20px;">
                                                    <!-- <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-primary btn-sm">
                                                        View
                                                    </a> -->
                                                    <a href="{{ route('resolutions.edit', $resolution->id) }}" class="btn btn-success btn-sm">
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-resolution-id="{{ $resolution->id }}">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>

                                    </div>
                                </li>
                            @empty
                                <li>No resolutions/issuances found.</li>
                            @endforelse
                        </ul>



                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
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
<!-- /.content -->
<!-- Add this script in the head section of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Search functionality
        $('#myInput').on('input', function () {
            var searchText = $(this).val().toLowerCase();
            filterResolutions(searchText);
        });

        // Filter functionality
        $('#myFilter').on('click', function () {
            // Add your filter logic here
            // You may use a modal or some other UI to get filter criteria
            // For simplicity, I'll just use an alert for demonstration
            alert('Filter functionality will be implemented here.');
        });

        function filterResolutions(searchText) {
            // Filter the resolutions based on the search text
            $('.list-unstyled li').each(function () {
                var title = $(this).find('.custom-title-color').text().toLowerCase();
                if (title.indexOf(searchText) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });

            // Show/hide the "No results found" message
            var noResultsMessage = $('#noResultsMessage');
            if ($('.list-unstyled li:visible').length === 0) {
                noResultsMessage.show();
            } else {
                noResultsMessage.hide();
            }
        }
    });
</script>

<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const resolutionId = this.getAttribute('data-resolution-id');

                // Display SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action is irreversible.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, proceed with deletion
                        fetch(`{{ url("resolutions") }}/${resolutionId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                        })
                            .then(response => response.json())
                            .then(data => {
                                // Check the response and show the SweetAlert accordingly
                                if (data.success) {
                                    Swal.fire('Deleted!', data.message, 'success');
                                    // Reload the page or update the UI as needed
                                    location.reload();
                                } else {
                                    Swal.fire('Error!', data.message, 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'An error occurred during deletion.', 'error');
                            });
                    }
                });
            });
        });
    });
</script>
@include('sweetalert::alert')
@endsection

</body>
</html>
