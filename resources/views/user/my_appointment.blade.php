@include('user.header')
@if (session()->has('update_appointment'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success ! </strong> {{ session()->get('update_appointment') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<h1 style="text-align: center">Appointment Details</h1>
<br>
<div class="col-md-12">
    @if (session()->has('appointment_cancel_message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success ! </strong> {{ session()->get('appointment_cancel_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">Applicant Name</th>

                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointment as $appointment)
                <tr>
                    <td>{{ $appointment->name }}</td>

                    <td>{{ $appointment->doctor_name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->message }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ url('edit_appointment', $appointment->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('cancel_appointment', $appointment->id) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure to cancel your appointment?')">Cancel</a>
                    </td>


                </tr>
            @endforeach


        </tbody>
    </table>

</div>
@include('user.footer')
