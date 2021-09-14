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

                <li class="nav-item has-treeview {{ Route::is('admin.store.*') ? 'active menu-open' : null }}">
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
                        <li class="nav-item">
                            <a href="{{ route('admin.store.orders.index') }}"
                               class="nav-link {{ Route::is('admin.store.sizes.*') ? 'active': null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الطلبات@if(\App\Models\Order::query()->where('read', 0)->count() > 0) <span class="bg-danger rounded px-2">{{\App\Models\Order::query()->where('read', 0)->count()}}</span> @endif</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="{{ route('admin.service.index') }}" class="nav-link {{ Route::is('admin.service.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>خدمات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.store.coupons.index') }}" class="nav-link {{ Route::is('admin.store.coupons.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>الكوبونات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile.index') }}" class="nav-link">
                        <i class="fas fa-user  nav-icon"></i>
                        الملف الشخصي
                    </a>
                </li>
                <li class="nav-item has-treeview {{ Route::is('admin.estates.*') ? 'active menu-open' : null }}">
                    <a href="#" class="nav-link {{ Route::is('admin.estates.*') ? 'active' : null }} ">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            العقارات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.countries.index') }}"
                               class="nav-link {{ Route::is('admin.estates.countries.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الدول</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.agents.index') }}"
                               class="nav-link {{ Route::is('admin.estates.agents.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الوكلاء</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.citys.index') }}"
                               class="nav-link {{ Route::is('admin.estates.citys.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المدن</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.categories.index') }}"
                               class="nav-link {{ Route::is('admin.estates.categories.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اقسام العقارات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.ads.index') }}"
                               class="nav-link {{ Route::is('admin.estates.ads.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اعلانات العقارات</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
