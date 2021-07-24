@extends("layouts.app")

@section("content")


@if (count($services)>0)

            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="float-left">
                      <h5>Services</h5>
                      </div>
                      <div class="float-right">
                        <a href="{{ route('services.create') }}" class="btn btn-primary">Add New</a>
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="display" id="basic-2">

                          <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Description</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td align="center" scope="row"><a title="Edit Category" href="{{url('services/'.$service->id .'/edit')}}"><i data-feather="edit"></i></a></td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>
                                    @if ($service->status)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-warning">Inactive</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <form action="{{url('services/'.$service->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                           <button class="float-right text-danger m-r-10" type="submit" style="background:transparent;" ><i data-feather="minus-circle" ></i></button>
                                        
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
                      <h2 class="font-info">Services are Not Found</h2>
                    </div>
                    <div class="col-md-8 offset-md-2">
                      <p class="sub-content">Services are not yet added for further Proceding Add Services</p>
                    </div>
                    <div>
                        <a name="" id="" class="btn btn-primary" href="{{ route('services.create') }}" role="button">Add Services</a>
        
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