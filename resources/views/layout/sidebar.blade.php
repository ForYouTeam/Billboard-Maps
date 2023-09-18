<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        
      </div>
      <div class="sidebar-brand-text mx-3"><img src="{{asset('logo.png')}}" style="max-width: 100%;"></div>
    </a>
    <hr class="sidebar-divider my-0">
    @hasrole('super-admin|admin')
    <li class="nav-item active">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('bo-billboard')}}">
        <i class="fas fa-map"></i>
        <span>Billboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('bo-owners')}}">
        <i class="fas fa-users"></i>
        <span>Pemilik</span>
      </a>
    </li>
    @endhasrole
    @hasrole('super-admin')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Manage User
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('bo-user')}}">
        <i class="fas fa-user"></i>
        <span>Akun</span>
      </a>
    </li>
    @endhasrole
    
  </ul>