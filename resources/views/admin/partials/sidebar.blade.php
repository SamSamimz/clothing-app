<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a href="{{route('dashboard')}}" style="text-decoration: none">
        <h4 class="sidebar-brand brand-logo text-white">Clothing <span class="text-warning">Shop</span></h4>
      </a>
      <a href="{{route('dashboard')}}" style="text-decoration: none">
        <h4 class="sidebar-brand brand-logo-mini text-warning">CS</h4>
      </a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset('admin/images/person.jpg')}}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name }}</h5>
              <span>{{ __('Admin') }}</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="{{route('profile.edit')}}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('products.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account"></i>
          </span>
          <span class="menu-title">Products</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('team-members.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account-group"></i>
          </span>
          <span class="menu-title">Team Members</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('partners.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account-group"></i>
          </span>
          <span class="menu-title">Partners</span>
        </a>
      </li>
      {{-- <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
       --}}
    </ul>
  </nav>