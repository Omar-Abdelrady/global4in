@extends('website.layouts.app')

@section('title', 'عقارات - جلوبل 4 انفيست')

@section('description', 'توفر لك جلوبل 4 انفيست مجموعه من العقارات اللتي تناسبك')

@section('bread', 'عقارات')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="show active" data-toggle="tab" href="#liton_product_grid"><i
                                                class="fas fa-th-large"></i></a>
                                        <a data-toggle="tab" href="#liton_product_list" class=""><i
                                                class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" style="display: none;">
                                        <option>فلتر</option>
                                        <option>الاقل سعر</option>
                                        <option>الاعلى سعر</option>
                                        <option>الاحدث</option>
                                        <option>الاقدم</option>
                                    </select>
                                    <div class="nice-select" tabindex="0"><span class="current">فلتر</span>
                                        <ul class="list">
                                            <li data-value="Default sorting" class="option selected focus">الاقل سعر
                                            </li>
                                            <li data-value="Sort by popularity" class="option">الاعلى سعر</li>
                                            <li data-value="Sort by new arrivals" class="option">الاحدث</li>
                                            <li data-value="Sort by price: low to high" class="option">الاقدم</li>
                                            <li data-value="Sort by price: high to low" class="option"></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="showing-product-number text-right">
                                    <span>9 اعلانات</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="بحث عن...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @foreach($ads as $item)
                                    <!-- ltn__product-item -->
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div
                                                class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                <div class="product-img">
                                                    <a href="{{ route('ads.show', $item->id) }}">
                                                        <img class="w-100"
                                                             src="{{ asset('storage/'. $item->photos[0]->image_medium) }}"
                                                             alt="{{ $item->title }}"></a>
                                                    <div class="real-estate-agent">
                                                        <div class="agent-img">
                                                            <a href="{{ route('ads.show', $item->id) }}">

                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge">
                                                        <ul>
                                                            {{--                                                            <li class="sale-badg">جديد</li>--}}
                                                        </ul>
                                                    </div>
                                                    <h2 class="product-title">
                                                        <a href="{{ route('ads.show', $item->id) }}">
                                                            {{ $item->title }}
                                                        </a>
                                                    </h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('ads.show', $item->id) }}">
                                                                    <i class="flaticon-pin"></i>
                                                                    {{ $item->city->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        @foreach($item->specifications as $specification)
                                                            <li><span>{{ $specification->value }} </span>
                                                                {{ $specification->key }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('ads.show', $item->id) }}"
                                                                   title="Quick View" data-toggle="modal"
                                                                   data-target="#quick_view_modal">
                                                                    <i class="flaticon-expand"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-price">
                                                        <span>ريال{{ $item->price }}<label></label></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ltn__product-item -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @foreach($ads as $item)
                                    <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                                <div class="product-img">
                                                    <a href="{{ route('ads.show', $item->id) }}">
                                                        <img
                                                            src="{{ asset('storage/'. $item->photos[0]->image_medium) }}"
                                                            alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title">
                                                        <a href="{{ route('ads.show', $item->id) }}">
                                                            {{ $item->title }}
                                                        </a>
                                                    </h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('ads.show', $item->id) }}"><i
                                                                        class="flaticon-pin"></i>
                                                                    {{ $item->city->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        @foreach($item->specifications as $specification)
                                                            <li><span>{{ $specification->value }} </span>
                                                                {{ $specification->key }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('ads.show', $item->id) }}" title="Quick View" data-toggle="modal"
                                                                   data-target="#quick_view_modal">
                                                                    <i class="flaticon-expand"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-price">
                                                        <span>ريال{{ $item->price }}<label></label></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ltn__product-item -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
