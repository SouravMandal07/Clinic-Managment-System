<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('/home') }}"><img style="background-color: white"
                src="{{ url('assets/img/logo1.png') }}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{ url('/home') }}"><img src="admin/assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">

                        @if (Auth::user()->profile_photo_path != null)
                        <img class="img-xs rounded-circle "
                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user image">
                        @else
                            <img src="{{ asset('admin/assets/images/avatar.png') }}" alt="avatar image">
                        @endif
                        {{-- <img class="img-xs rounded-circle "
                            src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt=""> --}}
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>Admin</span>
                    </div>
                </div>
                <a href="" id="profile-dropdown" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="{{ url('/user/profile') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/admin_logout') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('all_doctors') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">All Doctors</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('add_doctor_view') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Add Doctors</span>
            </a>
        </li>



        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('view_appointment') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Appointments</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('view_users') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-search"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('view_contacts') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-circle"></i>
                </span>
                <span class="menu-title">Contacts</span>
            </a>
        </li>




    </ul>
</nav>
