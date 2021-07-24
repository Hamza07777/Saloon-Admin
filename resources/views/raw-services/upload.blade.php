@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Upload Raw Services</h5>
                    <div class="card-header-right">
                        <a href="{{ route('home') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">

                @include("common.error-message")

                    <form action="{{ url('/raw-service/store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="csv_file">Upload CSV</label>
                                    <input type="file" name="csv_file" id="csv_file" class="form-control">
                                    @error('csv_file')<small class="text-danger">{{ $message }}</small>@enderror

                                </div><br>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
