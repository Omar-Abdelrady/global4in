<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Global4in</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->photo)
                    <img src='{{ asset('assets/admin-assets/dist/img/user2-160x160.jpg') }}'
                         class='img-circle elevation-2' alt='User Image'>
                @else
                    <i class="fa fa-user" style="font-size: 30px"></i>
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ Route::is('admin.store.*') ? 'active' : null }} ">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            المتجر
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.store.products.index') }}"
                               class="nav-link {{ Route::is('admin.store.products.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المنتجات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.category') }}"
                               class="nav-link {{ Route::is('admin.store.category.*') || Route::is('admin.store.category') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الاقسام</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.colors.index') }}"
                               class="nav-link {{ Route::is('admin.store.colors.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الالوان</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.sizes.index') }}"
                               class="nav-link {{ Route::is('admin.store.sizes.*') ? 'active': null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المقاسات</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="{{ route('adminprofile.index') }}" class="nav-link">
                        <i class="fas fa-user  nav-icon"></i>
                        الملف الشخصي
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
