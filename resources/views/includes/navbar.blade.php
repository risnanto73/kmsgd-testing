<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown px-3">
                    <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons me-sm-1">
                            account_circle
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="/">
                                <div class="d-flex align-items-center py-1">
                                    <i class="material-icons me-sm-1">
                                        home
                                    </i>
                                    <div class="ms-2">
                                        <h6 class="text-sm font-weight-normal my-auto">
                                            Beranda
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center py-1">
                                    <i class="material-icons me-sm-1">
                                        logout
                                    </i>
                                    <div class="ms-2">
                                        <h6 class="text-sm font-weight-normal my-auto">
                                            Logout
                                        </h6>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf

                                    </form>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>