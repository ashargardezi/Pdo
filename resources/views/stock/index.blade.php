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
                        <h1 class="card-titles">Stock Count</h1>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <div class="btn-group">
                            {{-- Uncomment if you need to add any action button --}}
                            {{-- <a href="{{ route('units.create') }}" class="btn btn-primary btn-sm mr-2">
                                + Add Unit
                            </a> --}}
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
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stock)
                            <tr>
                                <td>{{ $stock->barcode }}</td>
                                <td>{{ $stock->product_name }}</td>
                                <td>{{ $stock->unit }}</td>
                                <td>{{ $stock->quantity }}</td>
                                <td>{{ $stock->unit_price }}</td>
                                <td>{{ $stock->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
