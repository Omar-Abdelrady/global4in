@extends('website.layouts.app')

@section('title', ' - جلوبل 4 انفيست'.$ad->title)

@section('description', $ad->description)

@section('bread', $ad->title)

@section('image', asset('storage/'.$ad->photos[0]->image_medium))

@section('content')
    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach($ad->photos as $photo)
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a href="{{ asset('storage/'. $photo->image) }}" data-rel="lightcase:myCollection">
                                <img src="{{ asset('storage/'. $photo->image_medium) }}" alt="Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">{{ $ad->category->name }}</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">
                                        {{ $ad->sale_or_rent == 0 ? 'للبيع': 'للإيجار' }}
                                    </a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $ad->updated_at->format('Y-M-D') }}
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $ad->title }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span>
                            {{ $ad->city->name .', '. $ad->city->country->name }}
                        </label>
                        <h4 class="title-2">الوصف</h4>
                        <p>
                            {{ $ad->description }}
                        </p>
                        <h4 class="title-2">تفاصيل</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                @foreach($ad->specifications as $item)
                                    <li><label>{{ $item->key }}:</label> <span>{{ $item->value }}</span></li>

                                @endforeach
                            </ul>
                        </div>
                        <h4 class="title-2">الوكيل الخاص بالاعلان</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <li>
                                        <div class="ltn__comment-item clearfix">
                                            <div>
                                                <h5><a href="#">{{ $ad->agent->name }}</a></h5>
                                                <h6>
                                                    <span>البريد الالكتروني</span> : <a class="text-bold"
                                                                                        href="mailto:{{ $ad->agent->email }}">{{ $ad->agent->email }}</a>
                                                    <br>
                                                    <span>رقم الهاتف</span> : <a class="text-bold"
                                                                                 href="tel:{{ $ad->agent->phone }}">{{ $ad->agent->phone }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="title-2">اعلانات متعلقة</h4>
                        <div class="row">
                        @foreach($ads as $item)
                            <!-- ltn__product-item -->
                                <div class="col-xl-6 col-sm-6 col-12">
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
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
