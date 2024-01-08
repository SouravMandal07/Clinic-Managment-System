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

            <div class="col-lg-12" style="margin-top: 60px; text-align:center"  stretch-card">

                <p style=" margin-top:30px; font-size:30px" >Appointment Details</p>

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: white;"> Applicant Name </th>
                                        <th style="color: white;"> Email </th>
                                        <th style="color: white;"> Phone </th>
                                        <th style="color: white;"> Doctor Name </th>
                                        <th style="color: white;"> Message </th>
                                        <th style="color: white;"> Date </th>
                                        <th style="color: white;"> Status </th>
                                        <th style="color: white;"> Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointment as $data)

                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->doctor_name }}</td>
                                            <td>{{ $data->message }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ url('approve_appointment',$data->id) }}">Approve</a>
                                                <a class="btn btn-danger" href="{{ url('cancel_appointment',$data->id) }}">Cancel</a>
                                                <a class="btn btn-primary" href="{{ url('email_view',$data->id) }}">Send Email</a>


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
