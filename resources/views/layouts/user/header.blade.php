<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <a href="{{url('user')}}" class="navbar-brand sidebar-gone-hide">SPK</a>
  <div class="navbar-nav">
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
  </div>
  <div class="nav-collapse">
    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
      <i class="fas fa-ellipsis-v"></i>
    </a>
    <ul class="navbar-nav">
      {{-- <li class="nav-item {{ (request()->is('user/profile')) ? 'active' : ''}}"><a href="{{route('user.profile')}}" class="nav-link">Profile</a></li> --}}
      <li class="nav-item {{ (request()->is('user/beasiswa')) ? 'active' : ''}}"><a href="{{route('user.period')}}" class="nav-link">Beasiswa</a></li>
      <li class="nav-item {{ (request()->is('user/kriteria')) ? 'active' : ''}}"><a href="{{route('user.criteria')}}" class="nav-link">Kriteria</a></li>
      <li class="nav-item {{ (request()->is('user/pengumuman')) ? 'active' : ''}}"><a href="{{route('user.pengumuman')}}" class="nav-link">Pengumuman</a></li>
    </ul>
  </div>
  <ul class="navbar-nav navbar-right ml-auto">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block"></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-divider"></div>
        {{-- <a href="#" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a> --}}
        <a href="{{route('user.profile', Crypt::encrypt(Auth::user()->id))}}" class="dropdown-item has-icon">
          <i class="ion ion-person"></i> {{auth()->user()->mahasiswa->name}}
        </a>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"  class="dropdown-item has-icon text-danger">
            <i class="ion ion-log-out"></i>Logout
        </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </div>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg" style="background-color:#E6F4F2;">

</nav>