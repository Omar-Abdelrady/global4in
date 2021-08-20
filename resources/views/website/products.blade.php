@extends('website.layouts.app')

@section('title', isset($category) ? $category->name :'منتجات - جلوبل 4 انفيست')

@section('description', isset($category) ? $category->sub_description :'مرحبا بك في متجر جلوبل 4 انفيست نقدم لك افضل اسعار وافضل منتجات')

@section('keywords', isset($category) ? $category->keywords :'مرحبا بك في متجر جلوبل 4 انفيست نقدم لك افضل اسعار وافضل منتجات')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', isset($category) ? $category->name :'المتجر')

@section('content')
    <!-- LOGIN AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-center">
                            <li>
                                <div class="short-by text-center">
                                    <h4>الاقسام</h4>
                                    <select class="custom-select " onchange="location = this.value">
                                        <option>فلتر</option>
                                        @foreach($categories as $item)
                                            <option
                                                @if(isset($category))
                                                @if($category->id == $item->id)
                                                selected
                                                @endif
                                                @endif
                                                value="{{ route('store.category', $item->slug) }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
                                            <form action="{{ route('product.search') }}" method="get">
                                                @csrf
                                                <input required type="text" name="search" placeholder="بحث عن...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @foreach($products as $product)
                                    <!-- Product start -->
                                        <div class="col-lg-4 col-sm-6 col-12">
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
                                                                <a href="#" title="Wishlist" data-toggle="modal"
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
                                                        <span class="{{ $product->discount != 0 ? 'text-line-through text-gray-dark': null }}">ريال{{ $product->price }}<label></label></span>
                                                    </div>
                                                    @if($product->discount != 0)
                                                        <div class="product-price ">
                                                            <span>ريال{{ $product->price - ( $product->price * ($product->discount / 100) ) }}<label></label></span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--Product End-->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            {{ $products->links() }}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fas fa-angle-double-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li><a href="#">1</a></li>--}}
{{--                                <li class="active"><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">...</a></li>--}}
{{--                                <li><a href="#">10</a></li>--}}
{{--                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
