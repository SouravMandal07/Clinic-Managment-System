

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


     <div class="col-12 grid-margin stretch-card" style="margin-top: 10px">
        <div class="card">
          <div class="card-body">
            <h4 style="font-size: 30px; margin-top:60px; text-align:center" class="card-title">Add Doctor Details</h4>

            <form class="forms-sample" action="{{ url('add_doctor_view') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Doctor Name</label>
                <input type="text" class="form-control" style="color: white; background-color:black;" name="name" id="exampleInputName1" placeholder="Doctor Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="email" class="form-control" style="color: white; background-color:black;" name="email" id="exampleInputEmail3" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Phone</label>
                <input type="number" class="form-control" style="color: white; background-color:black;" name="phone" id="exampleInputEmail3" placeholder="Phone">
              </div>


              <div class="form-group">
                <label for="exampleSelectGender">Speciality</label>
                <select class="form-control" name="speciality" style="color: white" id="exampleSelectGender">
                    <option>--Select--</option>
                    <option value="Skin">Skin</option>
                    <option value="Heart">Heart</option>
                    <option value="Eye">Eye</option>
                    <option value="Nose">Nose</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dental">Dental</option>
                     <option value="General Health">General Health</option>
                    <option value="Surgen">Surgen</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Room No</label>
                <input type="text" name="room" style="color: white; background-color:black;" class="form-control" id="exampleInputCity1" placeholder="Room No">
              </div>




              <div class="form-group">
                <label>Doctor Image</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                 <input type="file" name="doctor_image" id="exampleInputCity1">

                </div>
              </div>
              <br>


              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <button class="btn btn-dark">Cancel</button>
            </form>
          </div>
        </div>
      </div>



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
