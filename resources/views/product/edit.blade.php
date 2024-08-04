@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        @include('shared.flash-message')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0">Edit Product</h4>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Card for the form -->
            <div class="card mt-3">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <p class="italic">
                                <small>The field labels marked with * are required input fields.</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Body with Form -->
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">Product Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->product_name) }}">
                                    @error('name')
                                        <span id="name" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="serial_no">Serial No</label>
                                    <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ old('serial_no', $product->serial_no) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="model_no">Model No</label>
                                    <input type="text" class="form-control" id="model_no" name="model_no" value="{{ old('model_no', $product->model_no) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="barcode">Barcode *</label>
                                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}">
                                    @error('barcode')
                                        <span id="barcode" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $product->brand) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="group">Group</label>
                                    <input type="text" class="form-control" id="group" name="group" value="{{ old('group', $product->group) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_unit">Product Unit *</label>
                                    <input type="text" class="form-control @error('product_unit') is-invalid @enderror" id="product_unit" name="product_unit" value="{{ old('product_unit', $product->product_unit_id) }}">
                                    @error('product_unit')
                                        <span id="product_unit" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="purchase_price">Purchase Price *</label>
                                    <input type="text" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}">
                                    @error('purchase_price')
                                        <span id="purchase_price" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price *</label>
                                    <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                                    @error('sale_price')
                                        <span id="sale_price" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="whole_sale_price">Whole Sale Price *</label>
                                    <input type="text" class="form-control @error('whole_sale_price') is-invalid @enderror" id="whole_sale_price" name="whole_sale_price" value="{{ old('whole_sale_price', $product->whole_sale_price) }}">
                                    @error('whole_sale_price')
                                        <span id="whole_sale_price" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alert_quantity">Alert Quantity</label>
                                    <input type="text" class="form-control" id="alert_quantity" name="alert_quantity" value="{{ old('alert_quantity', $product->alert_quantity) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Image Upload</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if($product->product_image)
                                        <img src="{{ Storage::url($product->product_image) }}" alt="Product Image" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="featured" name="featured" {{ $product->featured ? 'checked' : '' }}> Featured
                                    </label>
                                    <p class="italic">Featured product will be displayed in POS</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Uncomment if needed --}}
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="product_detail">Product Details</label>
                                    <textarea class="form-control" rows="3" id="product_detail" name="product_detail" placeholder="Enter ...">{{ old('product_detail', $product->product_detail) }}</textarea>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
