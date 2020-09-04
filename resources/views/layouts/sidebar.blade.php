<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light brand-lightblue icon-colored menupos-static">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('dashboard') }}" class="b-brand">
                <img class="if-logo-img" src="{{ asset('img/landing/logo-white.png') }}">
                <span class="b-title">MedMazza</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
       </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <li data-username="Dashboard" class="nav-item @yield('sidebar_dashboard')">
                    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li data-username="Appointments" class="nav-item @yield('sidebar_appointments')">
                    <a href="{{ route('appointments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Agendamentos</span></a>
                </li>
                <li data-username="Doctors" class="nav-item @yield('sidebar_doctors')">
                    <a href="{{ route('doctors.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Médicos</span></a>
                </li>
                <li data-username="Configuration" class="nav-item @yield('sidebar_config')">
                    <a href="{{ route('users.edit', $user->id) }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Configuração</span></a>
                </li>
                <li data-username="Logout" class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
