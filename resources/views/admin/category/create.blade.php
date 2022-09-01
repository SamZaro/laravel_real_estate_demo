@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary mb-3">
                                <h4 style="color: white">Create New Category</h4>
                            </div>
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="POST" class="pb-5" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="House, apartment, villa, etc..">
                                            <div style="color:red;">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug">
                                            <div style="color:red;">{{ $errors->first('slug') }}</div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="description" name="description">
                                            <div style="color:red;">{{ $errors->first('description') }}</div>
                                        </div>


                                        <div class="col-md-5 mb-3">
                                            <button type="submit" class="btn btn-success">Add Category</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
