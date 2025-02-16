<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Dashtreme Admin</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="{{ route('doctor.dashboard') }}">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <!-- Available Times Section -->
        <li class="nav-item">
            <a href="#" class="nav-link" id="availableTimesToggle">
                <i class="zmdi zmdi-invert-colors"></i> <span>Available Times</span>
                <i class="zmdi zmdi-chevron-down float-end"></i> <!-- Arrow icon -->
            </a>
            <ul class="submenu" id="availableTimesSubmenu">
                <li><a class="text-white dropdown-item" href="{{ route('doctor.avaliable_times.create') }}">Create Available Time</a></li>
                <li><a class="text-white dropdown-item" href="{{ route('doctor.avaliable_times.index') }}">Show Available Times</a></li>
            </ul>
        </li>

        <!-- Other Menu Items -->
        <li>
            <a href="{{ route('doctor.profile') }}">
                <i class="zmdi zmdi-face"></i> <span>Profile</span>
            </a>
        </li>

        <li>
            @if(auth()->guard('doctor')->check())
                <form action="{{ route('doctor.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="all: unset; cursor: pointer; color: inherit;">
                        <i class="zmdi zmdi-lock"></i> <span>Logout doctor</span>
                    </button>
                </form>
            @endif
        </li>

        <li class="sidebar-header">LABELS</li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
    </ul>
</div>


