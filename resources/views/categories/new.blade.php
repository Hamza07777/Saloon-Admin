@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Category</h5>
                    <div class="card-header-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @include("common.error-message")

                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old ('name') }}" id="name" class="form-control">
                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')<small class="text-danger">{{ $message }}</small>@enderror

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Image (.PNG,.JPG)</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')<small class="text-danger">{{ $message }}</small>@enderror

                            </div>
                        </div><br>
                   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <div class="media">
                                            <label for="status" class="m-t-10 ">Status: </label>
                                            <div class="media-body text-right">
                                                <label class="switch">
                                                    <input name="status" value="1" type="checkbox"><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="hr-sect">OR</div>
                                
                                <div class="form-group">
                                    <label for="csv_file">Upload CSV</label>
                                    <input type="file" name="csv_file" id="csv_file" class="form-control">
                                    @error('csv_file')<small class="text-danger">{{ $message }}</small>@enderror
        
                                </div><br>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

        <script type="text/javascript">



        </script>
@endsection
