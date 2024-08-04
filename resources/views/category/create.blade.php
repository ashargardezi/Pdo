@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Category</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Card for the form -->
            <div class="card mt-3">
                <!-- Card Header -->
                <div class="card-header">
                    <p class="italic" style="margin-top: 10px;">
                        <small>The field labels marked with * are required input fields.</small>
                    </p>
                </div>

                <!-- Card Body with Form -->
                <div class="card-body">
                    <!-- Form Start -->
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="category_name">Name*</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                id="category_name" name="category_name" placeholder="Enter category name...">
                            @error('category_name')
                                <span id="category_name" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file...</label>
                                @error('image')
                                    <span id="image" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="parent_cat">Parent Category*</label>
                            <select class="form-control @error('parent_cat') is-invalid @enderror" id="parent_cat" name="parent_cat">
                                <option value="">Select a category...</option>
                                <option value="cake">Cake</option>
                                <option value="food">Food</option>
                                <option value="vegetables">Vegetables</option>
                                <option value="fruits">Fruits</option>
                                <option value="electronics">Electronics</option>
                            </select>
                            @error('parent_cat')
                                <span id="parent_cat" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
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
