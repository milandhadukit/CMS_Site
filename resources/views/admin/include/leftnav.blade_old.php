<aside class="main-sidebar sidebar-light-navy elevation-1">
  <!-- Brand Logo -->
  <a href="{{URL('/dashboard')}}" class="brand-link logo-switch">
    <img src="{{ asset('/public/admin/images/logo.png')}}" alt="Whaletrak" class="brand-image-xl logo-xs" style="left: 10px">
    <img src="{{ asset('/public/admin/images/logo.png')}}" alt="Whaletrak" class="brand-image-xl logo-xl" style="left: 10px">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{URL('/dashboard')}}" class="nav-link @if(url()->current() == url('/dashboard')) active @endif">
            <i class="nav-icon fas fa-atom"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- Customer List -->
        <li class="nav-item">
          <a href="{{URL('/users')}}" class="nav-link @if(url()->current() == url('/users')) active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Calendar management
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL('/order')}}" class="nav-link @if(url()->current() == url('/order')) active @endif">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
            Video Management:

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL('/payment')}}" class="nav-link">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>
            CMS Pages
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL('/category')}}" class="nav-link @if(url()->current() == url('/category')) active @endif">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Category Management
            </p>
          </a>
        </li>
        <!-- Transaction List -->
        <li class="nav-item @if(url()->current() == url('/product') || url()->current() == url('/canvaspanel') || url()->current() == url('/fontstyle')) menu-open @endif">
          <a href="nav-link" class="nav-link @if(url()->current() == url('/product') || url()->current() == url('/canvaspanel') || url()->current() == url('/fontstyle')) active @endif">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Customized data storage
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item pl-1">
              <a href="{{URL('/product')}}" class="nav-link @if(url()->current() == url('/product')) active @endif">
                <i class="fab fa-product-hunt nav-icon"></i>
                <p>Product Management</p>
              </a>
            </li>
            <li class="nav-item pl-1">
              <a href="{{url('/canvaspanel')}}" class="nav-link @if(url()->current() == url('/canvaspanel')) active @endif">
                <i class="fab fa-buromobelexperte nav-icon"></i>
                <p>Canvas Panel Management</p>
              </a>
            </li>
            <li class="nav-item pl-1">
              <a href="{{URL('/fontstyle')}}" class="nav-link @if(url()->current() == url('/fontstyle')) active @endif">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Font Style Management</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Reports
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL('/review')}}" class="nav-link @if(url()->current() == url('/review')) active @endif">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Review Management
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL('/setting')}}" class="nav-link @if(url()->current() == url('/setting')) active @endif">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Setting
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

