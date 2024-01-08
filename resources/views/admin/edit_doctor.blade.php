

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
   @include('admin.header')
   <style>
    /* Style for the image container */
    .image-container {
        display: flex;
        align-items: center;
    }

    /* Style for the image */
    .selected-image {
        max-width: 100px; /* Adjust the width as needed */
        max-height: 100px; /* Adjust the height as needed */
        margin-right: 10px; /* Add some spacing between the input and image */
    }
</style>
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
            <h4 style="font-size: 30px; margin-top:60px; text-align:center" class="card-title">Edit Doctor Details</h4>

            <form class="forms-sample" action="{{ url('update_doctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

              <div class="form-group">
                <label for="exampleInputName1">Doctor Name</label>
                <input type="text" class="form-control" value="{{ $data->name }}" style="color: white; background-color:black;" name="name" id="exampleInputName1" placeholder="Doctor Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="email" class="form-control" value="{{ $data->email }}" style="color: white; background-color:black;" name="email" id="exampleInputEmail3" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Phone</label>
                <input type="number" class="form-control" value="{{ $data->phone }}" style="color: white; background-color:black;" name="phone" id="exampleInputEmail3" placeholder="Phone">
              </div>


              <div class="form-group">
                <label for="exampleSelectGender">Speciality</label>
                <select class="form-control" name="speciality" style="color: white" id="exampleSelectGender">
                    <option>{{ $data->speciality }}</option>
                    <option value="Skin">Skin</option>
                    <option value="Heart">Heart</option>
                    <option value="Eye">Eye</option>
                    <option value="Nose">Nose</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Room No</label>
                <input type="text" name="room" value="{{ $data->room }}" style="color: white; background-color:black;" class="form-control" id="exampleInputCity1" placeholder="Room No">
              </div>


              {{-- <div class="form-group">
                <label>Doctor Image</label>
                <div class="input-group col-xs-12">
                 <input type="file" style="col-md-8" name="doctor_image" id="exampleInputCity1">

                </div>

                <img src="doctors_image/{{ $data->doctor_image }}" style="col-md-12" height="100" width="100" alt="">
              </div> --}}

              <div class="image-container">
                <input type="file" id="image" name="doctor_image" accept="image/*">
                <img  src="doctors_image/{{ $data->doctor_image }}"  alt="Selected Image" class="selected-image" id="selected-image">
              </div>


              <br>


              <button type="submit" class="btn btn-primary me-2">Update</button>
                <a class="btn btn-dark me-2" href="{{ url('all_doctors') }}">Cancel</a>
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
    <script>
        // JavaScript to display the selected image
        const imageInput = document.getElementById('image');
        const selectedImage = document.getElementById('selected-image');

        imageInput.addEventListener('change', function () {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                selectedImage.src = '#';
            }
        });
    </script>
  </body>
</html>
