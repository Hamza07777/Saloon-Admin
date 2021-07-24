@extends("layouts.app")

@section("content")




            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="float-left">
                      <h5>Purpose Brands</h5>
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
                                <th scope="col">Brand Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($brand as $brand)
                            <tr>
                                <td align="center" scope="row"><a title="Edit brand" href="{{url('purpose_brand/'.$brand->id .'/edit')}}"><i data-feather="edit"></i></a></td>
                                <td>{{ $brand->title }}</td>
                                <td>{{ $brand->company_name($brand->company_id)}}</td>
                                <td align="center">
                                    <form action="{{url('purpose_brand/'.$brand->id)}}" method="POST">
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