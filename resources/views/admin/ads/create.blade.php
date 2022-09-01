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
                                <h4 style="color: rgb(255, 255, 255)">Create New Property</h4>
                            </div>
                            <div class="card-body">
                              <!-- Multi Columns Form -->
                              <form action="{{ url('ads/store') }}" class="row g-3"method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Property Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                    <div style="color:red;">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                    <div style="color:red;">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cate_id" class="form-label">Category</label>
                                    <select name="cate_id" id="cate_id" class="form-select">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}" >{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <select name="purpose" id="purpose" class="form-select">
                                        <option value="sale" {{ old('purpose') == 'sale' ? 'selected':'' }}>Sale</option>
                                        <option value="rent" {{ old('purpose') == 'rent' ? 'selected':'' }}>Rent</option>
                                    </select>
                                    {!! $errors->has('purpose')? '<p class="help-block">'.$errors->first('purpose').'</p>':'' !!}
                                </div>
                                <div class="col-md-5">
                                    <label for="selling_price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price">
                                    <div style="color:red;">{{ $errors->first('selling_price') }}</div>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="70" rows="4"></textarea>
                                    <div style="color:red;">{{ $errors->first('description') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    <div style="color:red;">{{ $errors->first('address') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                    <div style="color:red;">{{ $errors->first('city') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="square_feet" class="form-label">Square Feet</label>
                                    <input type="text" class="form-control" id="square_feet" name="square_feet">
                                    <div style="color:red;">{{ $errors->first('square_feet') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bedrooms" class="form-label">Bedrooms</label>
                                    <select type="number" min="1" max="10" id="bedrooms" name="bedrooms" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    <div style="color:red;">{{ $errors->first('bedrooms') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <select type="number" min="1" max="4" name="bathrooms" id="bathrooms" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div style="color:red;">{{ $errors->first('bathrooms') }}</div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group d-flex flex-column">
                                        <label class="m-2">Ad Image</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="image">
                                    </div>
                                </div>

                                <div class="col-md-8 form-group">
                                </div>

                                <div class="col-md-4 form-group mt-4">
                                    <input class="form-check-input" type="checkbox" name="featured">
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
