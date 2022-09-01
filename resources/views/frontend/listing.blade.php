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
                        <form action="{{route('listing.index')}}" method="GET">
                            <div class="form-group">
                                <select name="purpose" id="purpose" class="form-select">
                                    <option value="">Sale / Rent</option>
                                    <option value="sale" {{ old('purpose') == 'sale' ? 'selected':'' }}>Sale</option>
                                    <option value="rent" {{ old('purpose') == 'rent' ? 'selected':'' }}>Rent</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="category" id="cate_id" class="form-select">
                                    <option value="">Type</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected="selected"' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="selling_price" id="selling_price" class="form-select">
                                    <option value="">Price </option>
                                    <option {{request('selling_price') == '100000' ? 'selected="selected"' : ''}} value="100000">€ 0 - € 100.000</option>
                                    <option {{request('selling_price') == '200000' ? 'selected="selected"' : ''}} value="200000">€ 100.000 - € 200.000 </option>
                                    <option {{request('selling_price') == '300000' ? 'selected="selected"' : ''}} value="300000">€ 200.000 - € 300.000 </option>
                                    <option {{request('selling_price') == '400000' ? 'selected="selected"' : ''}} value="400000">€ 300.000 - € 400.000 </option>
                                    <option {{request('selling_price') == '500000' ? 'selected="selected"' : ''}} value="500000">€ 400.000 - € 500.000 </option>
                                    <option {{request('selling_price') == '500000+' ? 'selected="selected"' : ''}} value="500000+">€ 500.000 up </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="bedrooms" id="bedrooms" class="form-select">
                                    <option value="">Bedrooms</option>
                                    <option value="1" {{ old('1') == '1' ? 'selected':'' }}>1</option>
                                    <option value="2" {{ old('2') == '2' ? 'selected':'' }}>2</option>
                                    <option value="3" {{ old('3') == '1' ? 'selected':'' }}>3</option>
                                    <option value="4" {{ old('4') == '1' ? 'selected':'' }}>4</option>
                                    <option value="5" {{ old('5') == '1' ? 'selected':'' }}>5</option>
                                    <option value="6" {{ old('6') == '1' ? 'selected':'' }}>6</option>
                                    <option value="7" {{ old('7') == '1' ? 'selected':'' }}>7</option>
                                    <option value="8" {{ old('8') == '1' ? 'selected':'' }}>8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="bathrooms" id="bathrooms" class="form-select">
                                    <option value="">Bathrooms</option>
                                    <option value="1" {{ old('1') == '1' ? 'selected':'' }}>1</option>
                                    <option value="2" {{ old('2') == '2' ? 'selected':'' }}>2</option>
                                    <option value="3" {{ old('3') == '1' ? 'selected':'' }}>3</option>
                                    <option value="4" {{ old('4') == '1' ? 'selected':'' }}>4</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn-primary button-md  w-100" style="background-color: blue; color: #fff">Search</button>
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
                            <p>Torenlaan. Blaricum,</p>
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

                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="sorting-options">

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
                                    <i class="fa fa-calendar">{{ $ad->created_at }}</i>
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
