<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/berandabidang" class="nav-link {{Request::is('berandabidang') ? 'active' : ''}}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    BERANDA
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{Request::is('skpd/bidang/program*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    KEGIATAN
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/gantipass" class="nav-link {{Request::is('gantipass*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-key"></i>
                <p>
                    GANTI PASS
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>