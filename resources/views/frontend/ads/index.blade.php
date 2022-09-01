@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="wrapper">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Category / {{ $category->name }}</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($ads as $ad)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ url('category/'.$category->slug.'/'.$ad->slug) }}">
                                    <div class="card" style="width:300px; margin:20px;">

                                        <div class="card-body">
                                            <h5>{{ $ad->title }}</h5>

                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
