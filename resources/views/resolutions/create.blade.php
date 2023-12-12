<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolutions / Create</title>
</head>
<body>
@extends('layouts.datatable')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Resolution</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('resolutions.index') }}">Resolutions</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="resolutionForm" method="POST" action="{{ route('resolutions.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Resolution Info Section -->
                            <div id="section1">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Resolution Information') }}</h7>
                                </div><br>

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="memorandum_number">{{ __('Memorandum Number') }}</label>
                                    <input id="memorandum_number" type="text" class="form-control" name="memorandum_number">
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="photo">{{ __('Photo') }}</label>
                                    <input id="photo" type="file" class="form-control" name="photo">
                                </div>


                                <div class="form-group">
                                    <label for="category">{{ __('Category') }}</label>
                                    <select id="category" class="form-control" name="category">
                                        <option value="" disabled selected>Select a category</option>
                                        <option value="pakigsayud">pakigsayud</option>
                                        <option value="forms/guides">forms/guides</option>
                                        <option value="downloadable files">downloadable files</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="file_path">{{ __('File Upload') }}</label>
                                    <input id="file_path" type="file" class="form-control" name="file_path">

                            <!-- Submit button -->
                            <div class="form-group mt-5 d-flex justify-content-between">
                                <a href="{{ route('resolutions.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>Create Resolution</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript code for handling form sections and dynamic fields -->
    <script>
        // Function to show/hide sections and update section header
        function showSection(sectionNumber) {
            // Hide all sections
            document.querySelectorAll('[id^="section"]').forEach(function (section) {
                section.style.display = 'none';
            });

            // Show the current section
            document.getElementById('section' + sectionNumber).style.display = 'block';

            // Update section header
            updateSectionHeader(sectionNumber);
        }

        // Function to update section header
        function updateSectionHeader(sectionNumber) {
            const sectionHeaders = {
                1: 'Resolution Information',
                // Add more headers if needed
            };

            document.querySelector('.card-header').innerText = sectionHeaders[sectionNumber];
        }

        // Show the first section initially
        showSection(1);
    </script>
@endsection

</body>
</html>