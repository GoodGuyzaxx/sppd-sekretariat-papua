<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('sekretaris') ? 'active' : 'collapsed' }}" href="{{ url('sekretaris') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('sekretaris/sppd*') ? 'active' : 'collapsed' }}" href="{{ url('sekretaris/sppd') }}">
                <i class="bi bi-person"></i>
                <span>Laporan Pengajuan SPT / SPPD</span>
            </a>
        </li><!-- End Dashboard Nav -->
    </ul>
</aside><!-- End Sidebar-->
