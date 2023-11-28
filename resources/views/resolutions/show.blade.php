@extends('layouts.datatable')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Resolutions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('resolutions.index') }}">Resolutions</a></li>
                        <li class="breadcrumb-item active"> Resolution and Issuance Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Display Resolution and Issuance Details -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Resolution and Issuance Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        <!-- Display PDF file -->
                        <div>
                            <h5>Title: {{ $resolution->title }}</h5>
                            
                            @if ($resolution->photo)
                                <img src="{{ asset('images/photos/' . $resolution->photo) }}" alt="Resolution and Issuance Photo"
                                    class="img-fluid rounded mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded"
                                    style="width: 300px; height: 300px;">
                                    <span class="text-muted">No Photo Available</span>
                                </div>
                            @endif

                            <p>Memorandum Number: {{ $resolution->memorandum_number }}</p>
                            <p>Description: {{ $resolution->description }}</p>

                            <p>Category: {{ $resolution->category }}</p>
                            
                            <!-- Display PDF file using iframe -->
                            @if ($resolution->file_path)
                                <iframe src="{{ asset('storage/' . $resolution->file_path) }}" width="100%" height="600px"></iframe>
                            @else
                                <p>No PDF Available</p>
                            @endif

                            <!-- You can add more details based on your actual fields -->
                        </div>


                            <!-- Add additional sections as needed -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

<!-- Additional scripts or styles if needed -->
