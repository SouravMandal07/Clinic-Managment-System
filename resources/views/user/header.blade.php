<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="https://www.facebook.com/souravmandal.sou"><span
                                    class="mai-logo-facebook-f"></span></a>
                            <a href="https://twitter.com/Sourav00077"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/"><span style="color:rgb(228, 152, 165);">One</span>-Health</a>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctor_view') }}">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('news') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        </li>

                        @if (Route::has('login'))
                            @auth

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('show_appointment') }}">Appointment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3"
                                        style="background-color: green; padding-right:10px; margin-right:10px"
                                        href="{{ url('my_appointment') }}">My Appointment</a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route("logout") }}">Logout</a>
                                </li> --}}

                                {{-- Bootstrap dropdown --}}
                                {{-- <li>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('/user/profile') }}">Profile</a></li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                </li> --}}


                                <li class="nav-item dropdown">
                                    <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                        <div class="navbar-profile">
                                            @if (Auth::user()->profile_photo_path != null)
                                                <img class="img-xs rounded-circle "
                                                    src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" style="height: 48px; width:48px; !important" alt="user image">
                                            @else
                                                <img src="{{ asset('admin/assets/images/avatar.png') }}" alt="avatar image">
                                            @endif
                                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                        </div>
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                        aria-labelledby="profileDropdown">

                                        <a href="{{ url('user/profile') }}" class="dropdown-item preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-settings text-success"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p class="preview-subject mb-1">Profile</p>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ url('admin_logout') }}" class="dropdown-item preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-logout text-danger"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p href="{{ url('logout') }}" class="preview-subject mb-1">Log out</p>
                                            </div>
                                        </a>

                                    </div>
                                </li>




                            @else
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="return confirm('Before make an appointment, user must be logged in!')"
                                        href="{{ url('login') }}">Appointment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                                </li>
                        </ul>
                    @endauth
                    @endif

                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

