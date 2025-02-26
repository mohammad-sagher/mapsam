<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.html">
      <img src="{{asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
      <h5 class="logo-text"></h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION ADMIN</li>
     <li>
       <a href="{{route('admin.dashboard')}}">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>
     <li class="nav-item">
        <a href="#" class="nav-link" id="doctorToggle">
            <i class="zmdi zmdi-invert-colors"></i> <span>Doctors</span>
            <i class="zmdi zmdi-chevron-down float-end"></i> <!-- Arrow icon -->
        </a>
        <ul class="submenu" id="doctorSubmenu">
            <li><a class="text-white dropdown-item" href="{{ route('admin.doctor.specialization.create') }}">Create Specialization</a></li>
            <li><a class="text-white dropdown-item" href="{{ route('admin.doctor.specialization.index') }}">Show Specializations</a></li>
            <a href="{{route('doctor.ShowRegister')}}" >
                <i class="zmdi zmdi-invert-colors"></i> <span>Registeration doctor</span>
              </a>
        </ul>
    </li>


    <li>
        @if(auth()->guard('admin')->check())
        <a href="{{route('accountant.ShowRegister')}}" >
          <i class="zmdi zmdi-invert-colors"></i> <span>Registeration accountant</span>
        </a>
        @endif

      </li>

     <li>
       <a href="{{route('icones')}}">
         <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
       </a>
     </li>

     <li>
       <a href="{{route('forms')}}">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
       </a>
     </li>

     <li>
       <a href="{{route('tables')}}">
         <i class="zmdi zmdi-grid"></i> <span>Tables</span>
       </a>
     </li>

     <li>
       <a href="{{route('calendar')}}">
         <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
         <small class="float-right badge badge-light">New</small>
       </a>
     </li>

     <li>
       <a href="{{route('admin.profile.show')}}">
         <i class="zmdi zmdi-face"></i> <span>Profile</span>
       </a>
     </li>

     <li>



      @if(auth()->guard('admin')->check())

          <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" style="all: unset; cursor: pointer; color: inherit;">
                  <i class="zmdi zmdi-lock"></i> <span>Logout admin</span>
              </button>
          </form>
      @else
          <a href="{{ route('admin.ShowLogin') }}" target="_blank">
              <i class="zmdi zmdi-lock"></i> <span>Login</span>
          </a>
          <a href="{{ route('admin.ShowRegister') }}" target="_blank">
              <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
          </a>
      @endif
  </li>


     <li class="sidebar-header">LABELS</li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

   </ul>

  </div>
  <!--End sidebar-wrapper-->!
