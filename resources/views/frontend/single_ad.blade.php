@extends('layouts.app')

@section('content')

<!-- Properties details page start -->
<div class="properties-details-page">
    <div class="container">
        <div class="row mb-20">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <!-- Header properties start -->
                <div class="heading-properties clearfix sidebar-widget">
                    <div class="pull-left">
                        <h3>{{ $ad->title }}</h3>
                        <p>
                            <i class="fa fa-map-marker"></i>{{ $ad->address }}, {{ $ad->city }}
                        </p>
                    </div>
                    <div class="pull-right">
                        <h3><span>${{ $ad->selling_price }}</span></h3>
                        <h5>
                            Single AD
                        </h5>
                    </div>
                </div>
                <!-- Header properties end -->

                <!-- Properties slider section start -->
                <div class="properties-slider-section mb-25 clearfix">
                    <div class="slider slider-for">
                        <div>
                            <img src="assets/uploads/images/{{ $ad->image }}"  class="w-100 img-fluid" alt="photo">
                        </div>
                    </div>
                </div>
                <!-- Properties slider section end -->

                <!-- Properties details section start -->
                <div class="sidebar-widget">

                    <!-- Properties description start -->
                    <div class="properties-description mb-30">
                        <div class="main-title-4">
                            <h1><span>Description</span></h1>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra</p>
                        <br>
                        <p>felis imperdiet felis, et iaculis dui magna vitae diam. Donec mattis diam nisl, quis ullamcorper enim malesuada non. Curabitur lobortis eu mauris nec vestibulum. Nam efficitur, ex ac semper malesuada nisi odio consequat dui, hendrerit vulputate odio dui</p>
                        <p>Nam mattis lobortis felis eu blandit. Morbi tellus ligula, interdum sit amet ipsum et, viverra hendrerit lectus. Nunc efficitur sem vel est laoreet, sed bibendum eros viverra. Vestibulum finibus, ligula sed euismod tincidunt, lacus libero lobortis ligula, sit amet molestie ipsum purus ut tortor. Nunc varius, dui et sollicitudin facilisis, erat felis imperdiet felis, et iaculis dui magna vitae diam. Donec mattis diam nisl, quis ullamcorper enim malesuada non. Curabitur lobortis eu mauris nec vestibulum. Nam efficitur, ex ac semper malesuada nisi odio consequat dui, hendrerit vulputate odio dui </p>
                    </div>
                    <!-- Properties description end -->

                    <!-- Properties condition start -->
                    <div class="properties-condition mb-20">
                        <div class="main-title-4">
                            <h1><span>Condition</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-bed"></i>3 Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i>Bathroom
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>4800 sq ft
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i>TV
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-vehicle"></i>1 Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-building"></i>Balcony
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Properties condition end -->

                    <!-- Properties amenities start -->
                    <div class="properties-amenities">
                        <div class="main-title-4">
                            <h1><span>Amenities</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="flaticon-air-conditioner"></i>Air conditioning
                                    </li>
                                    <li>
                                        <i class="flaticon-bars"></i>Balcony
                                    </li>
                                    <li>
                                        <i class="flaticon-people-2"></i>Pool
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i>TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>Gym
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="flaticon-wifi"></i>Wifi
                                    </li>
                                    <li>
                                        <i class="flaticon-transport"></i>Parking
                                    </li>
                                    <li>
                                        <i class="flaticon-bed"></i>Double Bed
                                    </li>
                                    <li>
                                        <i class="flaticon-machine"></i>Iron
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="flaticon-old-telephone-ringing"></i>Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-person-enjoying-jacuzzi-hot-water-bath"></i>Jacuzzi
                                    </li>
                                    <li>
                                        <i class="flaticon-clock"></i>Alarm
                                    </li>
                                    <li>
                                        <i class="flaticon-vehicle"></i>Garage
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Properties amenities end -->
                </div>
                <!-- Properties details section end -->
            </div>

            <div class="col-md-4">
                <!-- Floor plans start -->
                <div class="floor-plans sidebar-widget">
                    <table>
                        <tbody>
                        <tr>
                            <td><strong>Category</strong></td>
                            <td>{{ $ad->category->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>SLug</strong></td>
                            <td>{{ $ad->slug }}</td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                        <tr>
                            <td><strong>Purpose</strong></td>
                            @if($ad->purpose === 'sale')
                            <td>For Sale</td>
                            @else
                            <td>For Rent</td>
                            @endif
                        </tr>
                        </tbody>
                    </table>

                    <div class="main-title-4">
                        <h1><span>Floor Plans</span></h1>
                    </div>

                    <table>
                        <tbody><tr>
                            <td><strong>Square Feet</strong></td>
                            <td><strong>Bedooms</strong></td>
                            <td><strong>Bathrooms</strong></td>
                        </tr>
                        <tr>
                            <td>{{ $ad->square_feet }}</td>
                            <td>{{ $ad->bedrooms }}</td>
                            <td>{{ $ad->bathrooms }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Floor plans end -->
            </div>

        </div>
    </div>
</div>
<!-- Properties details page end -->

@endsection

