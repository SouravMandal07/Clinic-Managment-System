@include('user.header')

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal"> Our Doctors</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-lg-10 mt-5">
          <div class="row justify-content-center">
            @foreach ($doctor as $data)
                <div class="col-md-6 col-lg-4 wow zoomIn">
                        <div class="card-doctor">
                            <div class="header">
                            <img style="height: 300px; !important" src="doctors_image/{{ $data->doctor_image }}" alt="">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                            </div>
                            <div class="body">
                            <p class="text-xl mb-0">{{ $data->name }}</p>
                            <span class="text-sm text-grey">{{ $data->speciality }}</span>
                            </div>
                        </div>
                </div>
            @endforeach
          </div>
        </div>
        </div>
    </div>
</div>







@include('user.footer')

</body>

</html>
