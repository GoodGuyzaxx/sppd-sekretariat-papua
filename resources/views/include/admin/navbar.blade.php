<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('NiceAdmin') }}/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">SI -SPPD</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
                    <img src="{{ asset('NiceAdmin') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block ps-2">Admin</span>
                </a><!-- End Profile Image Icon -->
            </li><!-- End Profile Nav -->
            <form action="/logout" method="post">
                <li class="nav-item dropdown">
                    @csrf
                    <a class="nav-link nav-icon">
                        <button type="submit" style="background-color: #ffffff; border: none; box-shadow-none">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </a><!-- End Notification Icon -->
                </li><!-- End Notification Nav -->
            </form>
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->
