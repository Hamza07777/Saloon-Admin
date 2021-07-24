@extends("layouts.app")

@section("content")


            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="float-left">
                      <h5>Purpose Services</h5>
                      </div>
                      <div class="float-right">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="display" id="basic-2">

                          <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td align="center" scope="row"><a title="Edit Service" href="{{url('purpose_brand/'.$service->id .'/edit')}}"><i data-feather="edit"></i></a></td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->company_name($service->company_id) }}</td>
                                <td align="center">
                                    <form action="{{url('purpose_brand/'.$service->id)}}" method="POST">
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