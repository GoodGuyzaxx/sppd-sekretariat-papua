<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('NiceAdmin') }}/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">SI -SPPD</span>
        </a>
{{--        <i class="bi bi-list toggle-sidebar-btn"></i>--}}
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
                    <img src="{{ asset('NiceAdmin') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block ps-2">Administrator</span>
                </a><!-- End Profile Iamge Icon -->
            </li><!-- End Profile Nav -->
            <form action="/logout" method="post">
                <li class="nav-item dropdown">
                    @csrf
                    <a class="nav-link nav-icon">
                        <button type="submit" style="background-color: #ffffff; border: none;"><i class="bi bi-box-arrow-right"></i></button>
                    </a><!-- End Notification Icon -->
                </li><!-- End Notification Nav -->
            </form>
        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') || Request::is('admin') ? 'active' : 'collapsed' }}" href="{{ url('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ Request::is('admin/users*') ? 'active' : 'collapsed' }}" href="{{ url('admin/users') }}">
                <i class="bi bi-person"></i>
                <span>Data akun</span>
            </a>
        </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/pegawai*') ? 'active' : 'collapsed' }}" href="{{ url('admin/pegawai') }}">
                        <i class="bi bi-person-add"></i>
                        <span>Data Master Pegawai</span>
                    </a>
                </li><!-- End Profile Page Nav -->
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="{{ url('biaya') }}">--}}
        {{--                <i class="bi bi-cash"></i>--}}
        {{--                <span>Data Master Biaya</span>--}}
        {{--            </a>--}}
        {{--        </li><!-- End Profile Page Nav -->--}}
        {{--        </li><!-- End Dashboard Nav -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="{{ url('transportasi') }}">--}}
        {{--                <i class="bi bi-bus-front"></i>--}}
        {{--                <span>Data Master Transport</span>--}}
        {{--            </a>--}}
        {{--        </li><!-- End Profile Page Nav -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="{{ url('penginapan') }}">--}}
        {{--                <i class="bi bi-house-door"></i>--}}
        {{--                <span>Data Master Penginapan</span>--}}
        {{--            </a>--}}
        {{--        </li><!-- End Profile Page Nav -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="{{ url('tiket') }}">--}}
        {{--                <i class="bi bi-taxi-front"></i>--}}
        {{--                <span>Data Master Tiket</span>--}}
        {{--            </a>--}}
        {{--        </li><!-- End Profile Page Nav -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="{{ url('suratmasuk') }}">--}}
        {{--                <i class="bi bi-envelope-paper"></i>--}}
        {{--                <span>Surat Masuk</span>--}}
        {{--            </a>--}}
        {{--        </li><!-- End F.A.Q Page Nav -->--}}

    </ul>

</aside><!-- End Sidebar-->
