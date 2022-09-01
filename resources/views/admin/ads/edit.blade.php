@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header bg-primary mb-3">
                                <h4 style="color: rgb(255, 255, 255)">Edit Property</h4>
                            </div>
                            <div class="card-body">
                              <!-- Multi Columns Form -->
                              <form action="{{ url('ads/update/'.$ad->id ) }}" class="row g-3" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Property Title</label>
                                    <input type="text" value="{{ $ad->title }}" class="form-control" id="title" name="title">
                                    <div style="color:red;">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" value="{{ $ad->slug }}" class="form-control" id="slug" name="slug">
                                    <div style="color:red;">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cate_id" class="form-label">Category</label>
                                    <select name="cate_id" id="cate_id" class="form-select">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $ad->cate_id ? 'selected': '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <select name="purpose" id="purpose" class="form-select">
                                        <option {{ ($ad->purpose) == 'sale' ? 'selected':'' }} value="sale">Sale</option>
                                        <option {{ ($ad->purpose) == 'rent' ? 'selected':'' }} value="rent" >Rent</option>
                                    </select>
                                    {!! $errors->has('purpose')? '<p class="help-block">'.$errors->first('purpose').'</p>':'' !!}
                                </div>

                                <div class="col-md-5">
                                    <label for="selling_price" class="form-label">Price</label>
                                    <input type="text" value="{{ $ad->selling_price }}" class="form-control" id="selling_price" name="selling_price">
                                    <div style="color:red;">{{ $errors->first('selling_price') }}</div>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" value="{{ $ad->description }}" id="description" class="form-control" rows="4">{{ $ad->description }}</textarea>
                                    <div style="color:red;">{{ $errors->first('description') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" value="{{ $ad->address }}" class="form-control" id="address" name="address">
                                    <div style="color:red;">{{ $errors->first('address') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" value="{{ $ad->city }}" class="form-control" id="city" name="city">
                                    <div style="color:red;">{{ $errors->first('city') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="square_feet" class="form-label">Square Feet</label>
                                    <input type="text" value="{{ $ad->square_feet }}" class="form-control" id="square_feet" name="square_feet">
                                    <div style="color:red;">{{ $errors->first('square_feet') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bedrooms" class="form-label">Bedrooms</label>
                                    <input type="text" value="{{ $ad->bedrooms }}"class="form-control" id="bedrooms" name="bedrooms">
                                    <div style="color:red;">{{ $errors->first('bedrooms') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <input type="text" value="{{ $ad->bathrooms }}" class="form-control" id="bathrooms" name="bathrooms">
                                    <div style="color:red;">{{ $errors->first('bathrooms') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group d-flex flex-column">
                                        <label class="m-2">Ad Image</label>
                                        <input type="file"  class="form-control m-2" name="image">
                                    </div>
                                </div>

                                <div class="col-md-2 form-check">
                                    <input class="form-check-input" type="checkbox" {{ $ad->featured == "1" ? 'checked':''}} name="featured">
                                    <label for="featured" class="form-check-label">Featured</label>
                                    <div style="color:red;">{{ $errors->first('featured') }}</div>
                                </div>



                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                              </form><!-- End Multi Columns Form -->

                            </div>
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
