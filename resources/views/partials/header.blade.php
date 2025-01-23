<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
     <ul class="mr-auto navbar-nav align-items-center">
       <li class="nav-item">
         <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
       </li>
       <li class="nav-item">
         <form class="search-bar">
           <input type="text" class="form-control" placeholder="Enter keywords">
            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
         </form>
       </li>
     </ul>

     <ul class="navbar-nav align-items-center right-nav-link">
       <li class="nav-item dropdown-lg">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
         <i class="fa fa-envelope-open-o"></i></a>
       </li>
       <!-- notification -->
       <li class="nav-item dropdown-lg">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
         <i class="fa fa-bell-o"></i></a>
       </li>
       <!-- language -->
       <li class="nav-item language">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
         <ul class="dropdown-menu dropdown-menu-right">
             <li class="dropdown-item"> <i class="mr-2 flag-icon flag-icon-gb"></i> English</li>
             <li class="dropdown-item"> <i class="mr-2 flag-icon flag-icon-fr"></i> French</li>
             <li class="dropdown-item"> <i class="mr-2 flag-icon flag-icon-cn"></i> Chinese</li>
             <li class="dropdown-item"> <i class="mr-2 flag-icon flag-icon-de"></i> German</li>
           </ul>
       </li>
       <!-- user -->
       @if(auth()->guard('accountant')->check())
       <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"><img src="{{asset('images/profile/'.auth()->guard('accountant')->user()->images->url) }}" class="img-circle" alt="user avatar"></span>
        </a>
       @else
       <li class="nav-item">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
           <span class="user-profile"><img src="{{asset('images/profile/'.auth()->user()->images->url) }}" class="img-circle" alt="user avatar"></span>
         </a>
         @endif
         <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
          @if(auth()->guard('accountant')->check())
           <a href="{{ route('accountant.ShowProfile') }}">
            @endif
            @if(auth()->guard('admin')->check())
           <a href="{{ route('admin.profile.show') }}">
            @endif
            @if(auth()->guard('doctor')->check())
           <a href="{{ route('doctor.profile') }}">
            @endif
            @if(auth()->guard('accountant')->check())
            <div class="media">
                <div class="avatar"><img class="mr-3 align-self-start" src="{{asset('images/profile/'.auth()->guard('accountant')->user()->images->url) }}" alt="user avatar"></div>
               <div class="media-body">
            @else
              <div class="media">
                <div class="avatar"><img class="mr-3 align-self-start" src="{{asset('images/profile/'.auth()->user()->images->url) }}" alt="user avatar"></div>
               <div class="media-body">
           @endif
                @if(auth()->guard('admin')->check())
               <h6 class="mt-2 user-title">{{ auth()->guard('admin')->user()->name }}</h6>
               <p class="user-subtitle">{{ auth()->guard('admin')->user()->email }}</p>
               @endif
               @if (auth()->guard('doctor')->check())
               <h6 class="mt-2 user-title">{{ auth()->guard('doctor')->user()->name }}</h6>
               <p class="user-subtitle">{{ auth()->guard('doctor')->user()->email }}</p>
               @endif
               @if (auth()->guard('accountant')->check())
               <h6 class="mt-2 user-title">{{ auth()->guard('accountant')->user()->name }}</h6>
               <p class="user-subtitle">{{ auth()->guard('accountant')->user()->email }}</p>
               @endif


               </div>
              </div>
             </a>
           </li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><i class="mr-2 icon-envelope"></i> Inbox</li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><i class="mr-2 icon-wallet"></i> Account</li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><i class="mr-2 icon-settings"></i> Setting</li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item">
            @if(auth()->guard('admin')->check())
             <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

               <button type="submit" class="p-0 dropdown-item">
                 <i class="mr-2 icon-power"></i> Logout
               </button>
             </form>
             @elseif(auth()->guard('doctor')->check())
             <form action="{{ route('doctor.logout') }}" method="POST">
                    @csrf
               <button type="submit" class="p-0 dropdown-item">
                 <i class="mr-2 icon-power"></i> Logout
               </button>
             </form>
             @elseif(auth()->guard('accountant')->check())
             <form action="{{ route('accountant.Logout') }}" method="POST">
                    @csrf
               <button type="submit" class="p-0 dropdown-item">
                 <i class="mr-2 icon-power"></i> Logout
               </button>
             </form>
             @endif
           </li>
         </ul>
       </li>
     </ul>
   </nav>
   </header>
   <!--End topbar header-->

