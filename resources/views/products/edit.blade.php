@extends("layouts.app")

@section("content")
    
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Edit Brand</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <form action="{{ url('product/'.$product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{ method_field('PUT') }}
                  <div class="row">
                    <div class="col-md-6">
                <div class="form-group m-form__group">
                  <label>Product Name</label>
                  <div class="input-group">
                    <input type="text" placeholder="Product  Name"   id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus >
                  </div>
                </div>
                <div class="form-group m-form__group">
                  <label>Product Description</label>
                  <div class="input-group">
                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Product  Description" name="description">{{ $product->description }}</textarea>
                  </div>
                </div>
                <div class="form-group m-form__group">
                  <label>Product Image (.PNG,.JPG)</label>
                  <div class="input-group">
                    <input  class="form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="{{ old('image') }}" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-2">
                      <div class="media">
                          <label for="status" class="m-t-10 ">Status: </label>
                          <div class="media-body text-right">
                              <label class="switch">
                                  <input name="status" value="1" type="checkbox" @if ($product->status) checked @endif><span class="switch-state"></span>
                              </label>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-md-5 offset-md-1 shadow shadow-showcase">
              <div class="card">
                  <img src="{{ asset('product_image/'.$product->logo) }}" style="width: 100%; height: auto;" alt="">
              </div>
          </div>
            </div>
          </div>
        </div>
          </div></div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-light" type="submit">Cancel</button>
        </div>
      </div>
    </div>
  </form>
  </div>

      <script type="text/javascript">



@endsection