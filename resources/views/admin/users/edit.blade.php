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
                                <h4 style="color: white">Edit roles for user {{ $user->name }} </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('users/update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6 mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6 mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                                        <div class="col-md-6 mb-3">
                                            @foreach ($roles as $role)
                                                <div class="form-check">
                                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>

                                                    <label>{{ $role->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

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
