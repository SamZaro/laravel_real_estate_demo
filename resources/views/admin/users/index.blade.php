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
                            <div class="card-header bg-primary">
                                <h4 style="color: white">Manage user roles</h4>
                            </div>
                            @csrf

                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary opacity-14">#</th>
                                            <th class="text-secondary opacity-12">Name</th>
                                            <th class="text-secondary opacity-10">Email</th>
                                            <th class="text-secondary opacity-10">Roles</th>
                                            <th class="text-secondary opacity-10">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                            <tr>
                                                <td class="text-md font-weight-normal ps-4"> {{ $user->id }} </td>
                                                <td class="text-md font-weight-normal ps-4"> {{ $user->name }} </td>
                                                <td class="text-md font-weight-normal ps-4"> {{ $user->email }} </td>
                                                <td class="text-md font-weight-normal ps-4"> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} </td>
                                                <td>
                                                    <a href="{{ url('users/edit/'.$user->id) }}" class="btn btn-secondary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ url('admin.users/destroy', $user) }}" method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
