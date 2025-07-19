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
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('staff/pengeluaran*') ? 'active' : 'collapsed' }}" href="{{route('staff.rincian.index')}}">
                <i class="bi bi-cash-stack"></i>
                <span>Rincian Pengeluaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('pengeluaran*') ? 'active' : 'collapsed' }}" href="#">
                <i class="bi bi-journal"></i>
                <span>Data Pengajuan SPT / SPPD </span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->
