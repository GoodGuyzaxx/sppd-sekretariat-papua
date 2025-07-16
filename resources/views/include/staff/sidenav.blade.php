<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('staff') ? 'active' : 'collapsed' }}" href="{{ route('staff.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ Request::is('staff/sppd*') ? 'active' : 'collapsed' }}" href="{{ route('staff.sppd.index') }}">
                <i class="bi bi-person"></i>
                <span>SPT / SPPD</span>
            </a>
        </li><!-- End Dashboard Nav -->
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link {{ Request::is('admin/pegawai*') ? 'active' : 'collapsed' }}" href="{{ url('admin/pegawai') }}">--}}
        {{--                        <i class="bi bi-person-add"></i>--}}
        {{--                        <span>Data Master Pegawai</span>--}}
        {{--                    </a>--}}
        {{--                </li><!-- End Profile Page Nav -->--}}
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
