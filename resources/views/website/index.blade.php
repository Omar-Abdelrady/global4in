@extends('website.layouts.app')

@section('title', 'الرئيسية - جلوبل 4 انفيست')

@section('description', 'الرئيسية - جلوبل 4 انفيست')

@section('keywords', 'جلوبل 4 انفيست ')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <!-- Best Services Section -->
    <div class="ltn__feature-area section-bg-1 pt-120 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">اهم الخدمات</h6>
                        <h1 class="section-title">خدمتنا</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter--- justify-content-center">
                @foreach(\App\Models\Service::query()->get() as $key => $service)
                    @if($key == 3)
                        @break
                    @endif
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white box-shadow-1">
                            <div class="ltn__feature-icon">
                                <!-- <span><i class="flaticon-house"></i></span> -->
                                <img src="{{ asset('storage/'. $service->logo) }}" alt="{{ $service->name }}">
                            </div>
                            <div class="ltn__feature-info">
                                <h3 class="animated fadeIn"><a
                                        href="{{ route('service.show', $service->slug)}}">{{ $service->name }}</a></h3>
                                <p>
                                    {{ $service->short_description }}
                                </p>
                                <a class="ltn__service-btn" href="{{ route('service.show', $service->slug)}}">المزيد <i
                                        class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Best Services Section End -->


    <!--    Services Section -->
    <section class="services-section pb-90">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 mt-5">
                    <h1 class="text-center">الخدمات</h1>
                </div>
                <div class="col-lg-4 col-12">
                    <ul class="d-flex flex-lg-column list-unstyled services-ul jumbotron overflow-auto py-2 px3">
                        @foreach(\App\Models\Service::all() as $key => $service)
                            @if($key > 2)
                                <li class="service-tap">
                                    <a href="#{{"tap$key"}}" class="d-inline {{ $key ==4 ?'active' :null }}">
                                        <div class="hr d-none d-lg-inline-block"></div>
                                        {{ $service->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="content">
                        @foreach(\App\Models\Service::all() as $key => $service)
                            @if($key > 2)
                                <div class="tap {{ $key == 4 ?'active' : 'd-none' }}" id="{{ "tap$key" }}">
                                    <div
                                        class="content-serv d-flex justify-content-center align-items-center flex-column">
                                        <img src="{{ asset('storage/'. $service->logo) }}" class="img-fluid"
                                             alt="{{ $service->name }}">
                                        <h2>{{ $service->name }}</h2>
                                        <p class="text-center">
                                            {{ $service->short_description }}
                                        </p>
                                        <a href="{{ route('service.show', $service->slug) }}"
                                           class="theme-btn-1 btn btn-effect-1">المزيد</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    End Services Section -->

    <!-- VIDEO AREA START -->
    <div class="ltn__video-popup-area ltn__video-popup-margin---">
        <div
            class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1"
            data-bg="{{ asset('assets/front-assets/img/bg/19.jpg') }}">
            <a class="ltn__video-icon-2 ltn__video-icon-2-border---"
               href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0" data-rel="lightcase:myCollection">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <!-- VIDEO AREA End -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90 plr--7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">المنتجات</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
            @foreach(\App\Models\Product::query()->latest()->take(4)->get() as $product)
                <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div
                            class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="{{ route('product.index', $product->slug) }}">
                                    <img
                                        class="w-100"
                                        src="{{ asset('storage/'. $product->photos[0]->image_medium) }}"
                                        alt="{{ $product->name }}">
                                </a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        @if($product->discount != 0)
                                            <a href="{{ route('product.index', $product->slug) }}"
                                               class="disount-class">
                                                {{ $product->discount . '%' }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h2 class="product-title">
                                    <a href="{{ route('product.index', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h2>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <p>
                                        {{ $product->sub_description }}
                                    </p>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="{{ route('store.wishlist.add', $product->slug) }}" title="Wishlist"
                                               data-toggle="modal"
                                               data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product.index', $product->slug) }}"
                                               title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span
                                        class="{{ $product->discount != 0 ? 'text-line-through text-gray-dark': null }}">ريال{{ $product->price }}<label></label></span>
                                </div>
                                @if($product->discount != 0)
                                    <div class="product-price ">
                                        <span>ريال{{ $product->price - ( $product->price * ($product->discount / 100) ) }}<label></label></span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- Start Banner for Brands Section   -->
    <section class="brand-section section-bg-1">
        <div class="container-fluid h-100">
            <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90 plr--7">
                <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
                @foreach(\App\Models\Partner::all() as $partner)
                    <!-- ltn__product-item -->
                        <div class="col-lg-12">
                            <img src="{{ asset('storage/'. $partner->logo) }}" alt="{{ $partner->name }}"
                                 title="{{ $partner->name }}" class="img-fluid">
                        </div>
                        <!-- ltn__product-item -->
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- End Banner of Brands Section   -->

    <!-- Coupon AREA Start -->
    <div class="ltn__about-us-area section-bg-1 bg-image-right-before pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">كوبونات</h6>
                            <h1 class="section-title">يمكنك الاشتراك في منصة الكوبونات الان</h1>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد
                                محتوى نصي، هنا يوجد محتوى نصي"</p>
                        </div>
                        <ul class="ltn__list-item-half ltn__list-item-half-2 clearfix">
                            <li>
                                <i class="icon-done"></i>
                                افضل الكوبونات فى السوق
                            </li>
                            <li>
                                <i class="icon-done"></i>
                                كوبونات على المطاعم
                            </li>
                            <li>
                                <i class="icon-done"></i>
                                كوبونات مضمونة
                            </li>
                            <li>
                                <i class="icon-done"></i>
                                كوبونات افضل الاسعار
                            </li>

                            <li>
                                <a href="shop.html" class="theme-btn-1 btn btn-effect-1" tabindex="0">اشتراك</a>
                                <a href="{{ route('coupon.index') }}" class="theme-btn-2 btn btn-effect-2" tabindex="0">الكوبونات</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Coupon AREA END -->
    <br>
    <br>
    <!-- Ad AREA Start -->
    <div class="ltn__blog-area pt-115--- pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">عقارات</h6>
                        <h1 class="section-title">اخر عقارات</h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            @foreach(\App\Models\Ad::query()->where('ad_status', 1)->latest()->take(4)->get() as $item)
                <!-- Real estate Item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="{{ route('ads.show', $item->slug) }}"><img
                                        src="{{ asset('storage/'. $item->photos[0]->image_medium) }}"
                                        alt="{{ $item->title }}" class="w-100"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-green---">{{ $item->sale_or_rent == 0 ? 'للبيع': 'للإيجار' }}</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a><i
                                                        class="flaticon-pin"></i> {{ $item->city->country->name .' ,'.$item->city->name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="{{ route('ads.show', $item->slug) }}"><i
                                                        class="fas fa-camera"></i> {{ count($item->photos) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>ريال {{ $item->price }}</span>
                                </div>
                                <h2 class="product-title"><a
                                        href="{{ route('ads.show', $item->slug) }}">
                                        {{ $item->title }}
                                    </a></h2>
                                <div class="product-description">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($item->description, '80') }}
                                    </p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    @foreach($item->specifications as $key => $specification)
                                        @if($key == 3)
                                            @break
                                        @endif
                                        <li><span>{{ $specification->value }} </span>
                                            {{ $specification->key }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- Real estate Item -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ad AREA END -->
@endsection

@section('js-code')
    <script>
        $(document).on('click', '.services-section .service-tap a', function (e) {
            $('.services-section .tap').hide('slow');
            $('.services-section .service-tap a').removeClass('active');
            $($(this).attr('href')).removeClass('d-none').show('slow');
            $(this).addClass('active');
            e.preventDefault();
            return false;
        })
    </script>
@endsection
