@include('user.header')
<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Edit your Appointment</h1>

      <form class="main-form" action="{{ url('update_appointment/'.$appointment->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label for="date">Applicant's Name</label>

            <input type="text" class="form-control" value="{{ $appointment->name }}" name="name" required placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="">Applicant's Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $appointment->phone }}" required placeholder="Number..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="date">Doctors Name</label>

              <select name="selected_doctor" id="departement"  required class="custom-select">
                  <option value="">--- Select Doctor ---</option>
                  @foreach ($doctor as $doctors)
                  <option value="{{ $doctors->name }}">{{ $doctors->name }} ({{ $doctors->speciality }})</option>

                  @endforeach

              </select>
            </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <label for="date">Appointment Date</label>

            <input type="date" name="date" value="{{ $appointment->date }}" required class="form-control">
          </div>



          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="Message">Message</label>
            <input type="text" name="message" id="message" value="{{ $appointment->message }}" required class="form-control" placeholder="Enter message..">
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Update Appointment</button>
      </form>
    </div>
  </div> <!-- .page-section -->

@include('user.footer')
