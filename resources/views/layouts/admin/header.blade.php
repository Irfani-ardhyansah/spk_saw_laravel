<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="dropdown-menu dropdown-menu-right">
          @can('isAdmin')
          {{-- <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> {{Auth::user()->password}}
          </a> --}}
          @endcan
          <div class="dropdown-divider"></div>
          {{-- <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a> --}}

          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"  class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i>Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
  </nav>