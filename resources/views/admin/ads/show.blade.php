@extends('layouts.admin')

@section('content')

    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card p-3">
                            <h3> {{ $ad->title }}</h3>
                            <hr>
                            <div class="card-header p-2">Description</div>
                            <p>{{ $ad->description }}</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Bedrooms
                                          <span class="badge bg-primary rounded-pill">{{ $ad->bedrooms }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Bathrooms
                                          <span class="badge bg-primary rounded-pill">{{ $ad->bathrooms }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Square Feet
                                          <span class="badge bg-primary rounded-pill">{{ $ad->square_feet }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <dl class="row">
                                <dt>Category:</dt>
                                <dd>{{ $ad->category->name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt>Address:</dt>
                                <dd>{{ $ad->address }}</dd>
                            </dl>
                            <dl class="row">
                                <dt>City:</dt>
                                <dd>{{ $ad->city }}</dd>
                            </dl>
                            <dl class="row">
                                <dt>Price:</dt>
                                <dd>{{ $ad->selling_price }}</dd>
                            </dl>
                            <dl class="row">
                                <dt>Purpose:</dt>
                                <dd> @if($ad->purpose === 'sale')
                                    <h6>Sale</span></h6>
                                @else
                                    <h6>Rent</span></h6>
                                @endif</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection

