<aside class="main-sidebar sidebar-dark-success elevation-1">
    <!-- Brand Logo -->
    <a href="#" class="brand-link logo-switch">
        {{-- <img src="{{ asset('/admin/dist/img/logo-xl.webp') }}" alt="AdminLTE" class="brand-image-xs logo-xl"> --}}
        <h5>CMS</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin-dashboard')}}" class="nav-link @if (url()->current() == url('/dashboard')) active @endif">
                        <i class="nav-icon fas fa-atom"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <!-- User List -->
                <li class="nav-item">
                    <a href="{{route('index-event')}}" class="nav-link @if (url()->current() == url('/users')) active @endif">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Calendar management
                        </p>
                    </a>

                </li>
                <!-- Customer List -->
                <li class="nav-item">
                    <a href="{{ URL('/employee') }}" class="nav-link @if (url()->current() == url('/employee')) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Video Management
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link @if (url()->current() == url('/')) active @endif">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            CMS Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('index-city')}}" class="nav-link @if (url()->current() == url('/')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>City Government</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('index-deparment')}}" class="nav-link @if (url()->current() == url('/')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('index-service')}}" class="nav-link @if (url()->current() == url('/')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @if (url()->current() == url('/')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Community</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('index-contact')}}" class="nav-link @if (url()->current() == url('/')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ URL('/review') }}" class="nav-link @if (url()->current() == url('/review')) active @endif">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Document management
                        </p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
