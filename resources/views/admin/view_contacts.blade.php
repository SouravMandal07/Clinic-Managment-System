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
            <p style=" margin-top:30px; font-size:30px">Contact Details</p>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="font-size: 20px"> Name </th>

                                    <th style="font-size: 20px"> Email </th>
                                    <th style="font-size: 20px"> Subject </th>
                                    <th style="font-size: 20px"> Message </th>

                                    <th style="font-size: 20px"> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>

                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->subject }}</td>

                                        <td>{{ $data->message }}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete this user?')"
                                                href="{{ url('delete_contact', $data->id) }}">Delete</a>

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
