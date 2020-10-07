<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="index.html" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('images/logo-white-pins.png') }}" alt="" height="60" width="100">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('images/logo-white-pins.png') }}" alt="" height="40" width="80">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

        

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                    href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">AybisSZR</span>
                        <span class="account-position">CEO of Aybis Company</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lifebuoy mr-1"></i>
                        <span>Support</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-outline mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout mr-1"></i>
                        <span>Logout</span>
                        <div class="text-center">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="username" value="aybis">
                            </form>
                        </div>
                    </a>
                </div>
            </li>

        </ul>

        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>

    </div>
</div>
