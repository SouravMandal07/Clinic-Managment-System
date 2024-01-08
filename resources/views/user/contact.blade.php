@include('user.header')
@if (session()->has('contact'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success ! </strong> {{ session()->get('contact') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Contact</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Get in Touch</h1>

        <form class="contact-form mt-5" action="{{ 'send_contact' }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name*</label>
                    <input type="text" required name="name" id="fullName" class="form-control" placeholder="Full name..">
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email*</label>
                    <input type="email" required name="email" id="emailAddress" class="form-control"
                        placeholder="Email address..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="subject">Subject*</label>
                    <input type="text" required name="subject" id="subject" class="form-control"
                        placeholder="Enter subject..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message*</label>
                    <textarea required id="message" name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
        </form>
    </div>
</div>



@include('user.footer')
</body>

</html>
