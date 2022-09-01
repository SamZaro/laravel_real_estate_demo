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
                            <div class="card-header bg-primary pb-3">
                                <div class="float-end">
                                <h4 style="color: rgb(255, 255, 255)">All Properties</h4>
                                </div>
                                <div class="float-start">
                                    <a href="{{ url('ads/create') }}" class="btn btn-success">Create Property</a></h4>
                                </div>
                            </div>
                            @csrf

                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary opacity-14">ID</th>
                                            <th class="text-secondary opacity-14">Title</th>
                                            <th class="text-secondary opacity-14">Adress</th>
                                            <th class="text-secondary opacity-12">Price</th>
                                            <th class="text-secondary opacity-10">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ads as $ad)
                                        <tr>
                                            <td class="text-secondary">{{ $ad->id }}</td>
                                            <td class="text-secondary"><a href="{{ url('ads/show/'.$ad->id ) }}"> {{ $ad->title }}</a></td>
                                            <td class="text-secondary">{{ $ad->address }}</td>
                                            <td class="text-secondary">{{ $ad->selling_price }}</td>
                                            <td class="text-secondary">{{ $ad->category->name }}</td>
                                            <td><a href="{{ url('ads/edit/'.$ad->id) }}" class="btn btn-secondary">Edit</a></td>
                                            <td>
                                                <form action="{{ url('ads/destroy/'.$ad->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
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
