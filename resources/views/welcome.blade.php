
@extends('layouts.app')

@section('content')

<!-- Frontpage Jumbotron -->

<div class="container-fluid">
    <div class="services bg-primary p-4">
        <div class="container">
            <div class="row">
                <!-- Main title -->
                <div class="main-title">
                    <h1 style="color:#fff">Real Estate App</h1>
                    <h5 style="color:#fff">This is a demo website.</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5>
                    Topics:
                    </h5>
                    <p>- CRUD Ads and Categories</p>
                    <p>- User Roles and Permissions</p>
                    <p>- User Management</p>
                    <p>- Admin Dashboard</p>
                    <p>- File Uploads</p>
                    <p>- DB Seeding</p>
                    <p>- Gates and Policies</p>
                </div>

                <div class="col-md-4">
                    <h5>
                        Used Techniques:
                    </h5>
                    <p>- Laravel 9</p>
                    <p>- Bootstrap 5</p>
                    <p>- MySQL</p>
                    <p>- jQuery</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Frontpage Jumbotron end -->

<!-- Featured properties start -->
<div class="content-area featured-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Ads</h1>
        </div>
        <div class="row wow fadeInUp delay-04s">
            <div class="filtr-container">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($featured_ads as $ad)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 filtr-item" data-category="1, 2, 3">
                            <div class="property fp2">
                                <!-- Property img -->
                                <div class="property-img">
                                    <div class="property-tag button alt featured">Featured</div>
                                    @if($ad->purpose === 'sale')
                                    <div class="property-tag button sale">For Sale</div>
                                    @else
                                    <div class="property-tag button sale">For Rent</div>
                                    @endif
                                    <div class="property-price">${{ $ad->selling_price }}</div>
                                    <img src="assets/uploads/images/{{ $ad->image }}" alt="fp" class="img-fluid">
                                    <div class="property-overlay">
                                        <a href="{{ url('category/'.$ad->category->slug.'/'.$ad->slug) }}" class="overlay-link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- info -->
                                    <div class="info">
                                        <!-- title -->
                                        <h1 class="title">
                                            <a href="{{ url('category/'.$ad->category->slug.'/'.$ad->slug) }}">{{ $ad->title }}</a>
                                        </h1>
                                        <!-- Property address -->
                                        <h3 class="property-address">
                                            <a href="{{ url('category/'.$ad->category->slug.'/'.$ad->slug) }}">
                                                <i class="fa fa-map-marker"></i>{{ $ad->address }}, {{ $ad->city }}
                                            </a>
                                        </h3>
                                        <!-- Facilities List -->
                                        <ul class="facilities-list clearfix">
                                            <li>
                                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                                <span>{{ $ad->square_feet }} sq ft</span>
                                            </li>
                                            <li>
                                                <i class="flaticon-bed"></i>
                                                <span>{{ $ad->bedrooms }}</span>
                                            </li>
                                            <li>
                                                <i class="flaticon-monitor"></i>
                                                <span>TV </span>
                                            </li>
                                            <li>
                                                <i class="flaticon-holidays"></i>
                                                <span> 2 Baths</span>
                                            </li>
                                            <li>
                                                <i class="flaticon-vehicle"></i>
                                                <span>1 Garage</span>
                                            </li>
                                            <li>
                                                <i class="flaticon-building"></i>
                                                <span> 3 Balcony</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left">
                                            <a href="#"><i class="fa fa-user"></i>{{ $ad->user->name }}</a>
                                        </span>
                                        <span class="right">
                                            <i class="fa fa-calendar"></i>5 Days ago
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured properties end -->

@endsection
