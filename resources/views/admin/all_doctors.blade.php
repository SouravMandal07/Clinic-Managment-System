<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.header')

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->

        <!-- partial:partials/_footer.html -->
        {{-- <div class="container-fluid page-body-wrapper"> --}}

            <div class="col-lg-12" style="margin-top: 60px; text-align:center;  "  stretch-card">
                @if (session()->has('delete'))
                    <div style=" margin-top:30px; font-size:30px" class="alert alert-success">
                        <button type="button" class="close" data-dismiss="close">x</button>
                        {{ session()->get('delete') }}

                    </div>
                 @endif
                <p style=" margin-top:30px; font-size:30px" >Doctor Details</p>

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive" >
                            <table class="table table-bordered" >
                                <thead >
                                    <tr>
                                        <th style="font-size: 20px"> Doctor Name </th>

                                        <th style="font-size: 20px"> Phone </th>
                                        <th style="font-size: 20px"> Speciality </th>
                                        <th style="font-size: 20px"> Room No </th>
                                        <th style="font-size: 20px"> Doctor Image </th>
                                        <th style="font-size: 20px"> Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctor as $data)

                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->speciality }}</td>
                                            <td>{{ $data->room }}</td>
                                            <td><img style="width: 70px; height:70px; border-radius:10%" src="doctors_image/{{ $data->doctor_image }}"></td>
                                            <td>
                                                <a class="btn btn-primary mr-2" href="{{ url('edit_doctor',$data->id) }}">Edit</a>
                                                <a class="btn btn-danger " onclick="return confirm('Are you sure to delete doctor details?')" href="{{ url('delete_doctor',$data->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.footer')
</body>

</html>
