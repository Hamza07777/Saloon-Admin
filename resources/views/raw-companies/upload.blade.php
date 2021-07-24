@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Raw Companies</h5>
                    <div class="card-header-right">
                        <a href="{{ route('home') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">

                @include("common.error-message")

                      <div class="card-body">
                        <div class="row">
                          <div class="col-8">
                            <form action="{{ url('/raw-companies/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                       
            
                              <div class="form-group m-form__group">
                                <label>Company Name</label>
                                <div class="input-group">
                                  <input id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name"  type="text" placeholder="Company Name">
                                  @error('namee')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                           
                              <div class="form-group m-form__group">
                                <label>Address</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address" placeholder="Address">Address</textarea>
                                  @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                          
                                
            
                           
                              <div class="form-group m-form__group">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('business_hours') }}"  autocomplete="phone_number"   type="text" placeholder="Phone Number">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                              </div>
                            
                              <div class="form-group m-form__group">
                                <label>latitude</label>
                                <div class="input-group">
                                  <input id="latitude"  class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('business_hours') }}"  autocomplete="latitude"   type="text" placeholder="latitude">
                                  @error('latitude')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>longitude</label>
                                <div class="input-group">
                                  <input id="longitude"  class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('business_hours') }}"  autocomplete="longitude"   type="text" placeholder="longitude">
                                  @error('longitude')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>website</label>
                                <div class="input-group">
                                  <input id="website"  class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('business_hours') }}"  autocomplete="website"   type="url" placeholder="website">
                                  @error('website')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>business_hours</label>
                                <div class="input-group">
                                  <input id="business_hours"  class="form-control @error('business_hours') is-invalid @enderror" name="business_hours" value="{{ old('business_hours') }}"  autocomplete="business_hours"   type="text" placeholder="Business hours">
                                  @error('business_hours')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
            
            
                            
            
                                <div class="form-group m-form__group">
                                    <label>Rating</label>
                                    <div class="input-group">
                                      <input id="rating"  class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating') }}"  autocomplete="rating"   type="text" placeholder="4.4">
                                      @error('rating')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                       @enderror
                                    </div>
                                  </div>
                                  
                                <div class="form-group m-form__group">
                                    <label>Total Reviews</label>
                                    <div class="input-group">
                                      <input id="total_reviews"  class="form-control @error('total_reviews') is-invalid @enderror" name="total_reviews" value="{{ old('total_reviews') }}" autocomplete="total_reviews"   type="text" placeholder="Total Reviews">
                                      @error('total_reviews')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                       @enderror
                                    </div>
                                  </div>
                                  <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <label>Saloon Type</label><br>
                                    <div class="radio radio-primary">
                                      <input id="radioinline1" type="radio" name="saloon_type" value="women" checked>
                                      <label class="mb-0" for="radioinline1">women</label>
                                    </div>
                                    <div class="radio radio-primary">
                                      <input id="radioinline2" type="radio" name="saloon_type" value="men"> 
                                      <label class="mb-0" for="radioinline2">men</label>
                                    </div>
                                    <div class="radio radio-primary">
                                      <input id="radioinline3" type="radio" name="saloon_type" value="unisex">  
                                      <label class="mb-0" for="radioinline3">unisex</label>
                                      @error('saloon_type')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                       @enderror
                                    </div>
                                  </div>
                                </br>
                    
                      <div class="hr-sect">OR</div>
                      <div class="form-group">
                        <label for="csv_file">Upload CSV</label>
                        <input type="file" name="csv_file" id="csv_file" class="form-control">
                        @error('csv_file')<small class="text-danger">{{ $message }}</small>@enderror

                    </div><br>
                      <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type="submit">Cancel</button>
                      </div>
                    </div>
                  </div>
            
                </form>
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection
