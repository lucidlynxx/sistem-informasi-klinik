<nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #d5d5d5">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">Sistem Informasi Klinik</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="bi bi-person-fill"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li><button type="submit" class="dropdown-item" href="#!">Logout <i
                                class="bi bi-box-arrow-right"></i></button></li>
                </form>
            </ul>
        </li>
    </ul>
</nav>