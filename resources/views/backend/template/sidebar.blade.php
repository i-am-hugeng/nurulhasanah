<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link text-decoration-none">
        <img src="{{ asset('media/images/logo/logo-admin.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">Nurul Hasanah</span>
    </a>
    
    <div class="sidebar">
    
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
                <li class="nav-item menu-open">
                    <li class="nav-item">
                        <a href="{{url('/admin/dashboard')}}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/anak-asuh')}}" class="nav-link {{ Request::is('admin/anak-asuh*') ? 'active' : '' }}">
                            <i class="fas fa-user-group nav-icon"></i>
                            <p>Anak Asuh</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/kegiatan')}}" class="nav-link {{ Request::is('admin/kegiatan*') ? 'active' : '' }}">
                            <i class="fas fa-photo-film nav-icon"></i>
                            <p>Kegiatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/poster')}}" class="nav-link {{ Request::is('admin/poster*') ? 'active' : '' }}">
                            <i class="fas fa-panorama nav-icon"></i>
                            <p>Poster</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/profil-yayasan')}}" class="nav-link {{ Request::is('admin/profil-yayasan*') ? 'active' : '' }}">
                            <i class="fas fa-mosque nav-icon"></i>
                            <p>Profil Yayasan</p>
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="fas fa-right-from-bracket nav-icon"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </li>
                
            </ul>
        </nav>
    
    </div>

</aside>


