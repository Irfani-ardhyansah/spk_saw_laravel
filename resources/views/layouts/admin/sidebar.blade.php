<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}" style="font-size: 10px">Sistem Pengambilan Keputusan</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('admin.dashboard')}}">SPK</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Super Admin</li>
          <li class="nav-link"><a href="blank.html"><i class="ion ion-ios-folder"></i> <span>Data Admin</span></a></li>

          <li class="menu-header">Admin</li>
          <li class="nav-link {{ (request()->is('admin/mahasiswa')) ? 'active' : ''}}"><a href="/admin/mahasiswa"><i class="ion ion-ios-folder"></i> <span>Data Mahasiswa</span></a></li>
          <li class="nav-link {{ (request()->is('admin/kriteria')) ? 'active' : ''}}"><a href="/admin/kriteria"><i class="ion ion-ios-folder"></i> <span>Data Kriteria</span></a></li>
          <li class="nav-link {{ (request()->is('admin/periode')) ? 'active' : ''}}"><a href="/admin/periode"><i class="far fa-square"></i> <span>Data Beasiswa</span></a></li>
          <li class="nav-link {{ (request()->is('admin/pengumuman')) ? 'active' : ''}}"><a href="/admin/pengumuman"><i class="far fa-square"></i> <span>Pengumuman</span></a></li>
        </ul>
    </aside>
  </div>