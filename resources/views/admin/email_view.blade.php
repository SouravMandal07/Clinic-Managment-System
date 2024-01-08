

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
            <h4 style="font-size: 30px; margin-top:60px; text-align:center" class="card-title">Send Email Notofication</h4>

            <form class="forms-sample" action="{{ url('sendEmailNotification',$data->id) }}" method="POST" >
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Greeting</label>
                <input type="text" class="form-control" style="color: white; background-color:black;" name="greeting" id="exampleInputName1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Body</label>
                <input type="text" class="form-control" style="color: white; background-color:black;" name="body" id="exampleInputEmail3">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Action Text</label>
                <input type="text" class="form-control" style="color: white; background-color:black;" name="actiontext" id="exampleInputEmail3" >
              </div>




              <div class="form-group">
                <label for="exampleInputCity1">Action URL</label>
                <input type="text" name="actionurl" style="color: white; background-color:black;" class="form-control" id="exampleInputCity1" >
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">End Part</label>
                <input type="text" name="endpart" style="color: white; background-color:black;" class="form-control" id="exampleInputCity1">
              </div>







              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <a href="{{ url("view_appointment") }}" class="btn btn-dark">Cancel</a>
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
