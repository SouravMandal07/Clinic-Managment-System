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

        <div class="col-lg-12" style="margin-top: 60px; text-align:center;  " stretch-card">
            {{-- @if (session()->has('delete'))
                <div style=" margin-top:30px; font-size:30px" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="close">x</button>
                    {{ session()->get('delete') }}

                </div>
            @endif --}}
            <p style=" margin-top:30px; font-size:30px">Doctor Details</p>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="font-size: 20px"> User Name </th>

                                    <th style="font-size: 20px"> Email </th>
                                    <th style="font-size: 20px"> Phone </th>
                                    <th style="font-size: 20px"> Address </th>
                                    <th style="font-size: 20px"> User Type </th>
                                    <th style="font-size: 20px"> User Image </th>
                                    <th style="font-size: 20px"> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>

                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->usertype }}</td>

                                        <td>
                                            @if ($data->profile_photo_path != null)
                                                <img style="width: 70px; height: 70px"
                                                    src="storage/{{ $data->profile_photo_path }}" alt="">
                                            @else
                                                <img style="width: 70px; height:70px;"
                                                    src="{{ asset('admin/assets/images/avatar.png') }}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" style="margin-right:5px"
                                                href="{{ url('edit_user', $data->id) }}">Edit</a>
                                            @if (Auth::user()->id != $data->id)
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete this user?')"
                                                    href="{{ url('delete_user', $data->id) }}">Delete</a>
                                            @else
                                            @endif


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
    @include('admin.footer');
</body>

</html>
