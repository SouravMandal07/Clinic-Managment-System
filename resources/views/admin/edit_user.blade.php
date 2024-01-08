

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
            <h4 style="font-size: 30px; margin-top:60px; text-align:center" class="card-title">Edit User Details</h4>

            <form class="forms-sample" action="{{ url('update_user',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">User Name</label>
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
                <label for="exampleInputCity1">Address</label>
                <input type="text" name="address" value="{{ $data->address }}" style="color: white; background-color:black;" class="form-control" id="exampleInputCity1" placeholder="Room No">
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Usertype</label>
                <select class="form-control" name="usertype" value="{{ $data->usertype }}"   style="color: white" id="exampleSelectGender">
                    <option>

                        @if ($data->usertype == "user")
                            user
                        @else
                            admin
                        @endif

                    </option>
                    @if ($data->usertype == "admin")

                    <option value="user">user</option>

                    @else
                        <option value="admin">admin</option>

                    @endif


                </select>
              </div>









              <button type="submit" class="btn btn-primary me-2">Update</button>
              <a class="btn btn-dark me-2" href="{{ url('view_users') }}">Cancel</a>
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
