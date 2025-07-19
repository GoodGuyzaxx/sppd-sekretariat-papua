<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('kasubag') ? 'active' : 'collapsed' }}" href="{{ url('kasubag') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('kasubag/laporan') ? 'active' : 'collapsed' }}" href="{{ url('kasubag/laporan') }}">
                <i class="bi bi-journal-bookmark"></i>
                <span>Laporan Pengajuan SPT / SPPD</span>
            </a>
        </li><!-- End Dashboard Nav -->
    </ul>

</aside><!-- End Sidebar-->
