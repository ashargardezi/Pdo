@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Brand</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Card for the form -->
            <div class="card mt-3">
                <!-- Card Header -->
                <div class="card-header">
                    <p class="italic">
                        <small>The field labels marked with * are required input fields.</small>
                    </p>
                

                <!-- Card Body with Form -->
                    
                    <!-- Form Start -->
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="brand_name">Name*</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                id="brand_name" name="brand_name" placeholder="Enter brand name...">
                            @error('brand_name')
                                <span id="brand_name" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file...</label>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
