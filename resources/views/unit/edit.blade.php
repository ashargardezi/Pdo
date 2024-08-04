@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Product Unit</h1>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="modal-title"></h5>
                            <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                        </div>
                    </div>
                </div>

                <!-- Card Body with Form -->
                <div class="card-body">
                    <form method="POST" action="{{ route('units.update', $unit->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_unit">Name *</label>
                                    <input type="text" id="name_unit" name="name_unit" class="form-control @error('name_unit') is-invalid @enderror" value="{{ old('name_unit', $unit->name_unit) }}" placeholder="...">
                                    @error('name_unit')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
