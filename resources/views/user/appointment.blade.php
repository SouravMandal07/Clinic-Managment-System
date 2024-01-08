@include("user.header")
@if (session()->has('success_appointment'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success ! </strong> {{ session()->get('success_appointment') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{ url('appointment') }}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <label for="">Applicant Name</label>
            <input type="text" class="form-control" name="name" required placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <label for="">Applicant Email</label>
            <input type="text" class="form-control" name="email" required placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="">Application Date</label>
            <input type="date" name="date" required class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="">Doctor Name</label>
            <select name="selected_doctor" id="departement" required class="custom-select">
                <option value="">--- Select Doctor ---</option>
                @foreach ($doctor as $doctors)
                <option value="{{ $doctors->name }}">{{ $doctors->name }} ({{ $doctors->speciality }})</option>

                @endforeach

            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="">Applicant Phone Number</label>
            <input type="text" class="form-control" name="phone" required placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="">Message</label>
            <textarea name="message" id="message" name="message" required class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>


      </form>
    </div>
  </div> <!-- .page-section -->
@include('user.footer')
