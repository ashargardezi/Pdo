@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        @include('shared.flash-message')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Product</h1>
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
                            <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                        </div>
                    </div>
                </div>

                <!-- Card Body with Form -->
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">Product Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name">
                                    @error('name')
                                        <span id="name" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Serial_no">Serial No</label>
                                    <input type="text" class="form-control" id="Serial_no" name="Serial_no">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Model_no">Model No</label>
                                    <input type="text" class="form-control" id="Model_no" name="Model_no">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Barcode">Barcode *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('Barcode') is-invalid @enderror"
                                            id="Barcode" name="Barcode">
                                        <div class="input-group-append">
                                            <button id="genbutton" type="button" class="btn btn-sm btn-default"
                                                title="Generate Barcode">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('Barcode')
                                        <span id="Barcode" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- for brand --}}
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Brand">Brand</label>
                                    <select class="form-control @error('brand_id') is-invalid @enderror" id="brand_id"
                                        name="brand_id">
                                        <option value="">Select a brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- for brand --}}

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                        name="category_id">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Product_unit">Product Unit *</label>
                                    <select class="form-control @error('Product_unit') is-invalid @enderror"
                                        id="Product_unit" name="Product_unit">
                                        <option value="">Select a unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                        @endforeach
                                    </select>
                                    @error('Product_unit')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- till here unit --}}

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Purchase_price">Purchase Price *</label>
                                    <input type="text" class="form-control @error('Purchase_price') is-invalid @enderror"
                                        id="Purchase_price" name="Purchase_price">
                                    @error('Purchase_price')
                                        <span id="Purchase_price" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price *</label>
                                    <input type="text" class="form-control @error('sale_price') is-invalid @enderror"
                                        id="sale_price" name="sale_price">
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
                                    <input type="text"
                                        class="form-control @error('whole_sale_price') is-invalid @enderror"
                                        id="whole_sale_price" name="whole_sale_price">
                                    @error('whole_sale_price')
                                        <span id="whole_sale_price" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alert_quantity">Alert Quantity</label>
                                    <input type="text" class="form-control" id="alert_quantity"
                                        name="alert_quantity">
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
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><input type="checkbox" id="featured" name="featured"> Featured</label>
                                    <p class="italic">Featured product will be displayed in POS</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Details</label>
                                    <textarea class="form-control" rows="3" id="product_detail" name="product_detail" placeholder="Enter ..."></textarea>
                                </div>
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

{{-- <div class="col-lg-4">
    <div class="form-group">
        <label for="Barcode">Barcode *</label>
        <div class="input-group">
            <input type="text" class="form-control @error('Barcode') is-invalid @enderror" id="Barcode" name="Barcode">
            <div class="input-group-append">
                <button id="genbutton" type="button" class="btn btn-sm btn-default" title="Generate Barcode">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>
        @error('Barcode')
            <span id="Barcode" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div> --}}

{{-- <div class="input-group">
    <input type="text" class="form-control @error('Barcode') is-invalid @enderror" id="Barcode" name="Barcode">
    <div class="input-group-append">
        <button id="genbutton" type="button" class="btn btn-sm btn-default" title="Generate Barcode">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div> --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById('genbutton').addEventListener('click', function() {
            // Generate a random 10-digit number
            const randomBarcode = Math.floor(1000000000 + Math.random() * 9000000000).toString();

            // Set the value of the Barcode input field
            document.getElementById('Barcode').value = randomBarcode;
        });
    });
</script>
