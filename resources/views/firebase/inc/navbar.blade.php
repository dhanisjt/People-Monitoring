<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        @auth

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome back, {{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle"
                    src="logoprofil.svg">
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                        <i class="bi bi-box-arrow-right"></i>Logout</button>
                </form>
                </li>
            </ul>
        </li>

        @else

        {{-- <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
            </li>
        </ul> --}}

        @endauth


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
        </ul>

    </ul>

    </nav>

