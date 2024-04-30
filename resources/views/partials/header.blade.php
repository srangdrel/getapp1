<nav class="main-header navbar navbar-expand navbar-primary navbar-dark p-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
		@if(Auth::user()->isAdmin())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle user-panel" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="nav-icon fa fa-cubes pr-1"></i> Masters
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						
					<a class="dropdown-item" href="/Documents/index" class="nav-link  {{ $elementActive == 'startapplication' ? 'active' : '' }}"><i class="fa fa-file-pdf"></i> Documents </a>
						<a class="dropdown-item" href="/Qualifications/index" class="nav-link  {{ $elementActive == 'startapplication' ? 'active' : '' }}"><i class="fa fa-map-signs"></i> Qualifications</a>
						<a class="dropdown-item" href="/Institutes/index" class="nav-link  {{ $elementActive == 'startapplication' ? 'active' : '' }}"><i class="fa fa-university"></i> Institutes</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/Sponsers/index" class="nav-link  {{ $elementActive == 'startapplication' ? 'active' : '' }}"><i class="fa fa-credit-card"></i> Manage Sponsers</a>
						
					
						
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle user-panel" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="nav-icon fa fa-cog pr-1"></i> Systems
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						
						<a class="dropdown-item" href="#"><i class="fa fa-microchip"></i> Manage Roles</a>
						<a class="dropdown-item" href="/Manageusers/index" class="nav-link  {{ $elementActive == 'startapplication' ? 'active' : '' }}"><i class="fas fa-users"></i> Manage Users</a>
						
						
					</div>
				</li>

		@endif

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle user-panel" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="nav-icon fas fa-user pr-1"></i> {{Auth::user()->name}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{route('profile.change-password')}}"><i class="fas fa-key"></i> Change Password</a>
							<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
					</div>
				</li>
		</ul>
    
  </nav>

  <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
			@csrf
			
	</form>