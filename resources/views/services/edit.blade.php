@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Service</h5>
                    <div class="card-header-right">
                        <a href="{{ route('services.index') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @include("common.error-message")

                    <form action="{{ url('services/'.$service->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}


                        <input type="hidden" name="category_id" value="{{ $service->category_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $service->name }}" id="name" class="form-control">
                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="text" name="price" value="{{ $service->price }}" id="price" class="form-control">
                                    @error('price')<small class="text-danger">{{ $message }}</small>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ $service->description }}</textarea>
                                    @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label>NImage (.PNG,.JPG)</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                </div><br>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <div class="media">
                                            <label for="status" class="m-t-10 ">Status: </label>
                                            <div class="media-body text-right">
                                                <label class="switch">
                                                    <input name="status" value="1" type="checkbox" @if ($service->status) checked @endif><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 offset-md-1 shadow shadow-showcase">
                                <div class="card">
                                    <img src="{{ asset('service_image/'.$service->image) }}" style="width: 100%; height: auto;" alt="">
                                </div>
                            </div>

                        </div>



                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Service permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/services/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection
