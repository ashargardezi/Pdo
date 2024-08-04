@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card-body">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <p class="italic" style="margin-left: 20px;">
                    <small>The field labels marked with * are required input fields.</small>
                </p>

                <!-- form start -->
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_name">Name*</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" placeholder="Enter category name...">
                            @error('category_name') 
                                <span id="category_name" class="error invalid-feedback"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file...</label>
                                @error('image')
                                    <span id="image" class="error invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Display existing image -->
                            @if($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" style="max-width: 150px;">
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="parent_cat">Parent Category*</label>
                            <select class="form-control @error('parent_cat') is-invalid @enderror" id="parent_cat" name="parent_cat">
                                <option value="">Select a category...</option>
                                <option value="cake" {{ old('parent_cat', $category->parent_category) == 'cake' ? 'selected' : '' }}>Cake</option>
                                <option value="food" {{ old('parent_cat', $category->parent_category) == 'food' ? 'selected' : '' }}>Food</option>
                                <option value="vegetables" {{ old('parent_cat', $category->parent_category) == 'vegetables' ? 'selected' : '' }}>Vegetables</option>
                                <option value="fruits" {{ old('parent_cat', $category->parent_category) == 'fruits' ? 'selected' : '' }}>Fruits</option>
                                <option value="electronics" {{ old('parent_cat', $category->parent_category) == 'electronics' ? 'selected' : '' }}>Electronics</option>
                            </select>
                            @error('parent_cat')
                                <span id="parent_cat" class="error invalid-feedback"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
