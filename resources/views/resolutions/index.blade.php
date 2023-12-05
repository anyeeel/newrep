<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Resolutions and Issuances / List</title>
</head>
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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('resolutions.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Add Resolution/Issuance
                        </a>

                        <table class="table" id="advancedDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <!-- <th>Memorandum Number</th> -->
                                    <th>Description</th>
                                    <th>File Path</th>
                                    <th>Category</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($resolutions as $resolution)
                                    <tr>
                                        <td>{{ $resolution->id }}</td>
                                        <td>{{ $resolution->title }}</td>
                                        <td>
                                        @if ($resolution->photo)
                                            <img src="{{ asset('storage/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                                                class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                                        @else
                                            <div class="bg-light d-flex justify-content-center align-items-center rounded"
                                                style="width: 300px; height: 300px;">
                                                <span class="text-muted">No Photo Available</span>
                                            </div>
                                        @endif

                                        </td>
                                        <!-- <td>{{ $resolution->memorandum_number }}</td> -->
                                        <td>{{ $resolution->description }}</td>
                                        <td>
                                            @if ($resolution->file_path)
                                                <a href="{{ asset('storage/' . $resolution->file_path) }}" target="_blank">{{ $resolution->file_path }}</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                        <td>{{ $resolution->category }}</td>
                                        <td>{{ $resolution->created_at }}</td>
                                        <td>
                                            <a href="{{ route('resolutions.show', $resolution->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('resolutions.edit', $resolution->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete Button with SweetAlert Confirmation -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-resolution-id="{{ $resolution->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No resolutions/issuances found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
