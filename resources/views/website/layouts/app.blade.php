<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('website.layouts.head')
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

@include('website.layouts.header')

@if(Route::is('index'))
    <!-- SLIDER AREA START (slider-3) -->
        <div class="ltn__slider-area ltn__slider-3  section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/11.jpg">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <div class="slide-video mb-50 d-none">
                                                <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                                                   href="https://www.youtube.com/embed/tlThdr3O5Qo"
                                                   data-rel="lightcase:myCollection">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="shop.html" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/12.jpg">
                    <div class="ltn__slide-item-inner  text-right">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="shop.html" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/13.jpg">
                    <div class="ltn__slide-item-inner  text-left">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="shop.html" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
        <!-- SLIDER AREA END -->
        <!-- CAR DEALER FORM AREA START -->
        <div class="ltn__car-dealer-form-area mt--65 mt-120 pb-115---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__car-dealer-form-tab">
                            <div class="ltn__tab-menu  text-uppercase d-none">
                                <div class="nav">
                                    <a class="active show" data-toggle="tab" href="#ltn__form_tab_1_1"><i
                                            class="fas fa-car"></i>Find A Car</a>
                                    <a data-toggle="tab" href="#ltn__form_tab_1_2" class=""><i class="far fa-user"></i>Get
                                        a
                                        Dealer</a>
                                </div>
                            </div>
                            <div class="tab-content bg-white box-shadow-1 pb-10">
                                <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                    <div class="car-dealer-form-inner">
                                        <form action="#" class="ltn__car-dealer-form-box row">
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>اختار المنطقة</option>
                                                    <option>الرياض</option>
                                                    <option>جدة</option>
                                                    <option>مكه</option>
                                                    <option>مدينة المنورة</option>
                                                    <option>عسير</option>
                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>حالة الملكية</option>
                                                    <option>ايجار</option>
                                                    <option>بيع</option>

                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>النوع</option>
                                                    <option>فيلا</option>
                                                    <option>شقة</option>
                                                    <option>مكتب</option>
                                                    <option>شالية</option>
                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                                <div class="btn-wrapper text-center mt-0">
                                                    <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                    <a href="shop-right-sidebar.html"
                                                       class="btn theme-btn-1 btn-effect-1 text-uppercase">ابحث</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ltn__form_tab_1_2">
                                    <div class="car-dealer-form-inner">
                                        <form action="#" class="ltn__car-dealer-form-box row">
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>اختار المنطقة</option>
                                                    <option>الرياض</option>
                                                    <option>جدة</option>
                                                    <option>مكه</option>
                                                    <option>مدينة المنورة</option>
                                                    <option>عسير</option>
                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>حالة الملكية</option>
                                                    <option>ايجار</option>
                                                    <option>بيع</option>
                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                                <select class="nice-select">
                                                    <option>النوع</option>
                                                    <option>فيلا</option>
                                                    <option>شقة</option>
                                                    <option>مكتب</option>
                                                    <option>شالية</option>
                                                </select>
                                            </div>
                                            <div
                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                                <div class="btn-wrapper text-center mt-0">
                                                    <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                    <a href="shop-right-sidebar.html"
                                                       class="btn theme-btn-1 btn-effect-1 text-uppercase">Search
                                                        Properties</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CAR DEALER FORM AREA END -->
    @else
    <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bg="{{ asset('assets/front-assets/img/bg/14.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                            <h1 class="page-title">@yield('bread')</h1>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="index.blade.php"><span class="ltn__secondary-color"><i
                                                    class="fas fa-home"></i></span> الرئيسية</a></li>
                                    <li>@yield('bread')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->
    @endif
    @include('admin.components.flash session')
    @include('admin.components.errors')

    @yield('content')

    @include('website.layouts.footer')

</div>
<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


@include('website.layouts.scripts')
@yield('js-code')

</body>
</html>

