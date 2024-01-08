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
                    <h4 style="font-size: 30px; margin-top:60px; text-align:center" class="card-title">Add News Details
                    </h4>

                    <form class="forms-sample" action="{{ url('add_news') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">News Headline</label>
                            <input type="text" class="form-control" style="color: white; background-color:black;"
                                name="headline" id="exampleInputName1" placeholder="add headline">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">News Category</label>
                            <input type="text" name="category" style="color: white; background-color:black;"
                                class="form-control" id="exampleInputCity1" placeholder="add category">
                        </div>
                        <div class="form-group">
                            <label>Cover Image</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="file" name="cover_image" id="exampleInputCity1">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail3">News Description</label>
                            <br>
                            <textarea name="description" placeholder="add news description" style="color: white; background-color:black;"
                                id="" cols="115" rows="10"></textarea>
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
