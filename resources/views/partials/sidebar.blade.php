<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item nav-category">Data Master</li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-floor-plan"></i>
            <span class="menu-title">Data Master</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('data.rombel.page') }}">Data Rombel</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('data.rayon.page') }}">Data Rayon</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('data.siswa.page') }}">Data Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('data.user.page') }}">Data User</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item nav-category">Data Keterlambatan</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('data.keterlambatan.page') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Rekap Keterlambatan</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->