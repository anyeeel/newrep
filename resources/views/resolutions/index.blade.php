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
</style>


<body>

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
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('resolutions.index') }}">Resolutions and Issuances</a></li>
                    <li class="breadcrumb-item active">List</li>
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
<!-- /.content -->

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
