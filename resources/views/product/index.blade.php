@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            @include('shared.flash-message')

            <!-- Card for the table and actions -->
            <div class="card mt-3">
                <!-- Card Header with Actions -->
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h1 class="card-titles">Product</h1>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <div class="btn-group">
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mr-2">
                                    + Add Product
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">
                                    Search
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card Body with Table -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-primary text-white">
                            <tr>
                                {{-- <th>Sr.#</th> --}}
                                <th>Image</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Serial No</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Whole Sale Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                                <tr>
                                    <td>
                                        @if ($product->product_image)
                                            <img src="{{ asset('storage/' . $product->product_image) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $product->barcode_id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->serial_no }}</td>
                                    <td>{{ $product->category_name  }}</td>
                                    <td>{{ $product->unit_name  }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->whole_sale_price }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default">
                                                <li>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-link">
                                                        <i class="dripicons-document-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <form method="POST" action="{{ route('products.destroy', $product->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li>
                                                        <button type="submit" class="btn btn-link" onclick="return confirmDelete()">
                                                            <i class="dripicons-trash"></i> Delete
                                                        </button>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
