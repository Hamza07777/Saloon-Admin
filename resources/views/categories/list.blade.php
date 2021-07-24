@extends("layouts.app")

@section("content")

@if (count($categories)>0)

            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="float-left">
                      <h5>Categories of Company</h5>
                      </div>
                      <div class="float-right">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a>
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="display" id="basic-2">

                          <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td align="center" scope="row"><a title="Edit Category" href="{{url('categories/'.$category->id .'/edit')}}"><i data-feather="edit"></i></a></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if ($category->status)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <form action="{{url('categories/'.$category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                               <button class="float-right text-danger m-r-10" type="submit" style="background: transparent;" ><i data-feather="minus-circle" ></i></button>
                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                          </tbody>
                        </table>



                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            @else
            <div class="page-wrapper compact-wrapper" id="pageWrapper">
                <!-- error-400 start-->
                <div class="error-wrapper">
                  <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
                    <div class="error-heading mb-5">
                      <h2 class="font-info">Categories are Not Found</h2>
                    </div>
                    <div class="col-md-8 offset-md-2">
                      <p class="sub-content">Categories are not yet added for further Proceding Add Categories</p>
                    </div>
                    <div>
                        <a name="" id="" class="btn btn-primary" href="{{ route('categories.create') }}" role="button">Add Categories</a>
        
                    </div>
                  </div>
                </div>
                <!-- error-400 end-->
              </div>
            @endif
          </div>



        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Category permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/categories/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection