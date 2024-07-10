
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html">
                        <span class="brand-logo">
                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <!-- SVG Content -->
                            </svg>
                        </span>
                        <h2 class="brand-text mb-0">Vuexy</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>

        <!-- Horizontal menu content -->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="dropdown nav-item @if(Request::is('users')) active @endif">
                    <a class=" nav-link d-flex align-items-center" href="/users">
                        <i data-feather="user"></i><span class="" data-i18n="Dashboards">User</span>
                    </a>
                </li>
                <li class="dropdown nav-item @if(Request::is('headquarters')) active @endif">
                    <a class=" nav-link d-flex align-items-center" href="/headquarters">
                        <i data-feather="home"></i><span class="" data-i18n="Apps">Headquarters</span>
                    </a>
                </li>
                <li class="dropdown nav-item @if(Request::is('locations')) active @endif">
                    <a class=" nav-link d-flex align-items-center" href="/locations">
                        <i data-feather="map"></i><span class="" data-i18n="Apps">Locations</span>
                    </a>
                </li>
                <li class="dropdown nav-item @if(Request::is('master-templates')) active @endif">
                    <a class=" nav-link d-flex align-items-center" href="/master-templates">
                        <i data-feather="package"></i><span class="" data-i18n="Apps">Master</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Dropdown User Section -->
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link  dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar">
                            <img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <div class="dropdown-header d-flex align-items-center">
                            <div class="avatar me-1">
                                <!-- Assuming you have an avatar for the user -->
                            </div>
                            <div class="user-info">
                                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                @foreach(Auth::user()->roles as $role)
                                <small class="text-muted">{{ $role->name }}</small><br>
                            @endforeach
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="me-50" data-feather="power"></i>
                                Logout
                            </button>
                        </form>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>
<style>
    .navbar-horizontal {
        width: 100%; /* Ensure full width */
        position: fixed; /* Fixed position */
        top: 0; /* Position at the top */
        z-index: 1000; /* Ensure it's above other content */
        background-color: #ffffff; /* Optional: Set background color */
        padding: 0 15px; /* Adjust padding as needed */
    }

    .navbar-container {
        width: 100%; /* Ensure full width */
        max-width: none; /* Remove max-width limitation */
    }

    .nav-link {
        color: #333333; /* Optional: Customize link color */
    }
</style>
