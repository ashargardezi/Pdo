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
                            <h1 class="card-titles">Product Unit</h1>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <div class="btn-group">
                                <a href="{{ route('units.create') }}" class="btn btn-primary btn-sm mr-2">
                                    + Add Unit
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
                                <th>Sr.#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $unit)
                                <tr>
                                    <td>{{ $unit->id }}</td>
                                    <td>{{ $unit->name_unit }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default">
                                                <li>
                                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-link">
                                                        <i class="dripicons-document-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <form method="POST" action="{{ route('units.destroy', $unit->id) }}" accept-charset="UTF-8">
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
