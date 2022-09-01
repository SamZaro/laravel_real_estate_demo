@extends('layouts.app')

@section('content')

<div id="wrapper">
    <!-- Properties section body start -->
    <div class="properties-section-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <!-- Advanced search start -->
                    <div class="sidebar-widget advanced-search">
                        <div class="main-title-4">
                            <h1>Advanced  Search</h1>
                        </div>
                        <form action="/adsearch" method="GET">

                            <div class="form-group">
                                <label for="purpose" class="form-label">Property Status</label>
                                <select name="purpose" id="purpose" class="form-select">
                                    <option value="sale" {{ old('purpose') == 'sale' ? 'selected':'' }}>Sale</option>
                                    <option value="rent" {{ old('purpose') == 'rent' ? 'selected':'' }}>Rent</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="cate_id" class="form-label">Category</label>
                                    <select name="cate_id" id="cate_id" class="form-select">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group mb-0">
                                <button type="submit" class="btn-primary button-md  w-100">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Advanced search end -->



                    <!-- Category posts start -->
                    <div class="sidebar-widget category-posts">
                        <div class="main-title-4">
                            <h1>Popular Category</h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Single Family </a> <span>(45)  </span></li>
                            <li><a href="#">Apartment  </a> <span>(21)  </span></li>
                            <li><a href="#">Condo </a> <span>(23)  </span></li>
                            <li><a href="#">Multi Family </a> <span>(19)  </span></li>
                            <li><a href="#">Villa </a> <span>(19)  </span></li>
                            <li><a href="#">Other  </a> <span>(22)  </span></li>
                        </ul>
                    </div>
                    <!-- Category posts end -->

                    <!-- Helping box Start -->
                    <div class="sidebar-widget helping-box clearfix">
                        <div class="main-title-4">
                            <h1>Helping Center</h1>
                        </div>
                        <div class="helping-center">
                            <div class="icon"><i class="fa fa-map-marker"></i></div>
                            <h4>Address</h4>
                            <p>123 Kathal St. Tampa City,</p>
                        </div>
                        <div class="helping-center">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <h4>Phone</h4>
                            <p><a href="tel:+55-417-634-7071">+55 417 634 7071</a> </p>
                        </div>
                    </div>
                    <!-- Helping box end -->
                </div>

                <div class="col-lg-8 col-md-12 col-xs-12">
                    <!-- Option bar start -->
                    <div class="option-bar">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <h4>
                                    <span class="heading-icon">
                                        <i class="fa fa-th-list"></i>
                                    </span>
                                    <span class="title">Properties List</span>
                                </h4>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="sorting-options advanced-search">
                                    <select class="selectpicker search-fields sorting" name="new-to-old">
                                        <option>New To Old</option>
                                        <option>Old To New</option>
                                        <option>Properties (High To Low)</option>
                                        <option>Properties (Low To High)</option>
                                    </select>
                                    <a href="properties-list-leftside.html" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                    <a href="properties-grid-leftside.html" class="change-view-btn"><i class="fa fa-th-large"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Option bar end -->

                    <!-- property start -->
                    @foreach ($ads as $ad )
                    <div class="property property-hp row g-0 fp2 clearfix wow fadeInUp delay-03s">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <!-- Property img -->
                            <div class="property-img">
                                @if($ad->featured == '1')
                                <div class="property-tag button alt featured">Featured</div>
                                @endif
                                @if($ad->purpose === 'sale')
                                <div class="property-tag button sale">For Sale</div>
                                @else
                                <div class="property-tag button sale">For Rent</div>
                                @endif
                                <div class="property-price">${{ $ad->selling_price }}</div>
                                <img src="assets/uploads/images/{{ $ad->image }}"  alt="fp-list" class="img-fluid w-100">
                                <div class="property-overlay">
                                    <a href="{{ url('category/'.$ad->category->slug.'/'.$ad->slug) }}" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 property-content">
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
                                        <span>{{ $ad->bedrooms }} Bedrooms</span>
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i>
                                        <span>TV </span>
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i>
                                        <span> {{ $ad->bathrooms }} Bathrooms</span>
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
                    @endforeach
                    <!-- property end -->


                    <!-- Pagination box start -->
                    <div class="pagination-box text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Prev</a>
                                </li>
                                <li class="page-item"><a class="page-link  active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Properties section body end -->
    <!-- property end -->
</div>

@endsection
