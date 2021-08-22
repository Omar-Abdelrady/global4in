@extends('website.layouts.app')

@section('title', 'كوبونات خصم - جلوبل 4 انفست')

@section('bread', 'كوبونات خصم')

@section('description', 'مع جلوبل 4 انفيست سوف تحصل علي العديد من كوبونات الخصم')

@section('keywords', 'كوبونات خصم, كوبونات, خصومات,خصومات,')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="{{ route('coupon.search') }}" method="get">
                                                @csrf
                                                <input type="text" name="search" placeholder="بحث">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @foreach($coupons as $item)
                                    <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">

                                                <div class="product-info position-relative">
                                                    <h2 class="product-title">
                                                        {{ $item->name }}
                                                    </h2>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li>
                                                            {{ $item->description }}
                                                        </li>
                                                    </ul>
                                                    <div class="get-coupon">
                                                        <a href="{{ route('coupon.get',$item->id) }}"
                                                           class="theme-btn-1 btn btn-effect-1">الحصول علي الكوبون</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            {!! $coupons->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
