<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Pesantren-Ku</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul style="text-decoration: none !important; list-style:none;">
            <li class="nav-item mb-2 mt-0 ms-3">

                @if (Auth::user()->role == 'admin')
                <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-50">
                @elseif (Auth::user()->role == 'alumni')
                    @if (Auth::user()->status_daftar == 'pending')
                    <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-50">
                        @elseif (Auth::user()->status_daftar == 'update')
                            @if(empty($user->alumni->image))
                            <img src="{{url('storage', $user->alumni->photo)}}" alt="" class="img-thumbnail w-50">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-50">
                        @endif
                    @endif
                @elseif (Auth::user()->role == 'staff')
                    @if (Auth::user()->status_daftar == 'pending')
                    <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-50">
                        @elseif (Auth::user()->status_daftar == 'update')
                            @if(empty($user->staff->image))
                            <img src="{{url('storage', $user->staff->photo)}}" alt="" class="img-thumbnail w-50">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="..." class="img-thumbnail w-50">
                        @endif
                    @endif
                @endif
            </li>

            <hr class="horizontal light mt-0">

            @if (Auth::user()->role == 'admin')
            <!-- ===== ADMIN ===== -->
            <div class="collapse  show " id="dashboardsExamples">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/home">
                            <span class="sidenav-mini-icon"> <i class="fas fa-home"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
                        </a>
                    </li>

                    <!-- ===== JENJANG ====-->
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="{{route('jenjang')}}">
                            <span class="sidenav-mini-icon"><i class="fas fa-project-diagram"></i></span>
                            <span class="sidenav-normal  ms-2  ps-1"> Jabatan</span>
                        </a>
                    </li>
                    <!-- ===== END JENJANG ===== -->

                    <!-- ===== TAHUN LULUS ====-->
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="{{route('lulus')}}">
                            <span class="sidenav-mini-icon"><i class="fas fa-graduation-cap"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Tahun Masuk</span>
                        </a>
                    </li>
                    <!-- ===== END JENJANG ===== -->

                </ul>
                {{-- <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/jabatan">
                            <span class="sidenav-mini-icon"> <i class="fas fa-building"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Jabatan </span>
                        </a>
                    </li>
                </ul> --}}
                {{-- <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/staff">
                            <span class="sidenav-mini-icon"> <i class="fas fa-users"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Staff </span>
                        </a>
                    </li>
                </ul> --}}
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('loker.index')}}">
                            <span class="sidenav-mini-icon"><i class="fas fa-briefcase"></i></span>
                            <span class="sidenav-normal  ms-2  ps-1"> Program</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white " href="#">
                            <span class="sidenav-mini-icon"><i class="fas fa-briefcase"></i></span>
                            <span class="sidenav-normal  ms-2  ps-1"> Profile</span>
                        </a>
                    </li>
                </ul>
                {{-- <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('carousel.index')}}">
                            <span class="sidenav-mini-icon"><i class="fas fa-briefcase"></i></span>
                            <span class="sidenav-normal  ms-2  ps-1"> Carousel</span>
                        </a>
                    </li>
                </ul> --}}
            </div>
            <!-- ===== END AMDIN ===== -->

            @elseif (Auth::user()->role == 'staff')
            <div class="collapse  show " id="dashboardsExamples">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/home">
                            <span class="sidenav-mini-icon"> <i class="fas fa-home"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="{{route('loker.index')}}">
                            <span class="sidenav-mini-icon"><i class="fas fa-briefcase"></i></span>
                            <span class="sidenav-normal  ms-2  ps-1"> Loker</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('gantiPassword')}}">
                            <span class="sidenav-mini-icon"> <i class="fas fa-unlock-alt"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Change Password </span>
                        </a>
                    </li>
                </ul>
            </div>
            @else
            <div class="collapse  show " id="dashboardsExamples">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/home">
                            <span class="sidenav-mini-icon"> <i class="fas fa-home"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('gantiPassword')}}">
                            <span class="sidenav-mini-icon"> <i class="fas fa-unlock-alt"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Change Password </span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif






        </ul>
    </div>
</aside>