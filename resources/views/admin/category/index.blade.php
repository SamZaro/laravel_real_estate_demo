@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                @if (session()->has('message'))
                <div class="alert alert-success" role="alert" style="color:white">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary mb-3">
                                <div class="float-end">
                                <h4 style="color: rgb(255, 255, 255)">All Categories</h4>
                                </div>
                                <div class="float-start">
                                @can('manage-categories')
                                <a href="{{ url('categories/create') }}" class="btn btn-success">Create Category</a></h4>
                                @endcan
                                </div>
                            </div>
                            @csrf

                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary opacity-14">Name</th>
                                            <th class="text-secondary opacity-12">Slug</th>
                                            <th class="text-secondary opacity-10">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category )
                                        <tr>
                                            <td class="text-md font-weight-normal ps-4">{{$category->name }}</td>
                                            <td class="text-md font-weight-normal ps-4">{{ $category->slug }}</td>
                                            <td class="text-md font-weight-normal ps-4">{{ $category->description }}</td>
                                            @can('manage-categories')
                                            <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a></td>
                                            @endcan
                                            @can('manage-categories')
                                            <td>
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
