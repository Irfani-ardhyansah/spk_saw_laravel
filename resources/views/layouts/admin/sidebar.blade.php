<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}" style="font-size: 10px">Sistem Pengambilan Keputusan</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('admin.dashboard')}}">SPK</a>
      </div>
      <ul class="sidebar-menu mt-3">
        @can('isSuper')
          <li class="nav-link {{ (request()->is('admin/super')) ? 'active' : ''}}"><a href="/admin/super"><i class="ion ion-ios-folder"></i> <span>Data Admin</span></a></li>
          @elsecan('isPimpinan')
          <li class="nav-link {{ (request()->is('admin/pimpinan')) ? 'active' : ''}}"><a href="/admin/pimpinan"><i class="ion ion-ios-folder"></i> <span>Data Pengumuman</span></a></li>
          @elsecan('isAdmin')
          <li class="nav-link {{ (request()->is('admin/kriteria')) ? 'active' : ''}}"><a href="{{route('admin.dashboard.user')}}"><i class="ion ion-home"></i> <span>Dashboard User</span></a></li>
          <li class="menu-header">Mahasiswa</li>
          <li class="nav-link {{ (request()->is('admin/mahasiswa')) ? 'active' : ''}}"><a href="/admin/mahasiswa"><i class="ion ion-ios-people"></i> <span>Data</span></a></li>
          <li class="nav-link {{ (request()->is('admin/mahasiswa')) ? 'active' : ''}}"><a href="/admin/prodi"><i class="ion ion-university"></i> <span>Prodi</span></a></li>
          <li class="menu-header">Kriteria & Bobot</li>
          <li class="nav-link {{ (request()->is('admin/kriteria')) ? 'active' : ''}}"><a href="/admin/kriteria"><i class="ion ion-ios-browsers"></i> <span>Data</span></a></li>
          <li class="menu-header">Beasiswa</li>
          <li class="nav-link {{ (request()->is('admin/periode')) ? 'active' : ''}}"><a href="/admin/periode"><i class="ion ion-ios-bookmarks"></i> <span>Data</span></a></li>
          <li class="nav-link {{ (request()->is('admin/pengumuman')) ? 'active' : ''}}"><a href="/admin/pengumuman"><i class="ion ion-share"></i> <span>Pengumuman</span></a></li>
        @endcan
        </ul>

        @can('isSuper')
        <div class="sidebar-brand" style="margin-top:420px">
          <a href="#" style="font-size: 20px; font-family:monaco;">Super Admin</a>
        </div>
        @elsecan('isPimpinan')
        <div class="sidebar-brand" style="margin-top:420px">
          <a href="#" style="font-size: 20px; font-family:monaco;">Pimpinan</a>
        </div>
        {{-- @elsecan('isAdmin')
        <div class="sidebar-brand" style="margin-top:35px">
          <a href="#" style="font-size: 20px; font-family:monaco;">Admin</a>
        </div> --}}
        @endcan
    </aside>
  </div>