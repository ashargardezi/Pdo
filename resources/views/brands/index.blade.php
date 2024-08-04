@extends('layouts.admin-master')

@section('content')
<div class="container-fluid">
    <div class="content-wrapper">
        <!-- Card for Header and Actions -->
        <div class="card mt-3">
            <!-- Card Header with Actions -->
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h1 class="card-titles">Product Brand</h1>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <div class="btn-group">
                            <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm mr-2">
                                + Add Brand
                            </a>
                            <a href="#" class="btn btn-primary btn-sm">
                                Search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <!-- Card Body with Table -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Sr.#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>
                                @if ($brand->image)
                                    <img src="{{ asset('storage')."/".$brand->image }}" width="100">
                                @else
                                    <img src="{{ asset('storage/staticimage/default-image.png') }}" width="100">
                                @endif
                            </td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default">
                                        <li>
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-link">
                                                <i class="dripicons-document-edit"></i> Edit
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <form method="POST" action="{{ route('brand.destroy', $brand->id) }}" accept-charset="UTF-8">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link" onclick="return confirmDelete()">
                                                    <i class="dripicons-trash"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="pagination mt-3">
                    {{ $data->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
