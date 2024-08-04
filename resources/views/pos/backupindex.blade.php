@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            @include('shared.flash-message')

            <div class="row">
                {{-- For the first section --}}
                <div class="col-lg-6">
                    {{-- <section class="content">
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="reservation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Main</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Cash Customer</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> --}}
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="reservation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Main</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Cash Customer</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>

                    </div>
                    </div>
                </div>
                </div>

                {{-- For the second section --}}
                <div class="col-lg-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <button type="button" class="btn btn-block btn-info">Category</button>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-block btn-info">Brand</button>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-block btn-danger">Feature</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
    <!-- /.container-fluid -->
@endsection
