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
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('ads.search') }}" method="get" class="row">
                                            @csrf
                                            <div class="form-group col-md-4 col-12">
                                                <select name="country_id" id="countries" class="form-control">
                                                    <option selected value>اختار البلد</option>
                                                    @foreach(\App\Models\Country::all() as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
{{--                                            @dd($sale_or_rent)--}}
                                            <div class="form-group col-md-4 col-12">
                                                <select name="category_id" class="form-control">
                                                    <option selected value>اختار الفئة</option>
                                                    @foreach(\App\Models\AdCategory::all() as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-12">
                                                <select name="sale_or_rent" class="form-control">
                                                    <option value="0">للبيع</option>
                                                    <option value="1">للإيجار</option>
                                                </select>
                                            </div>
                                            <div class="col-12 cities d-none mb-3">
                                                <select class="form-control" name="city_id" id="cities">
                                                    <option selected value>اختار المدينة</option>
                                                </select>
                                            </div>
                                            <!-- Search Widget -->
                                            <div class="ltn__search-widget mb-30 col-12">
                                                <input type="text" name="search" placeholder="بحث عن...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>

                                    @foreach($ads as $item)
                                        <div class="col-lg-4 col-sm-6 col-12">
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
@section('js-code')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //    Start get cities Script
        function addCities(cities) {
            $('.cities').removeClass('d-none')
            $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
            $.each(cities, function (i, item) {
                $('#cities').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        }
        $(document).on('change', '#countries', function () {
            var Id = this.value;
            if (Id == '')
            {
                $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
                $('.cities').addClass('d-none')
                return false
            }
            axios({
                method: 'get',
                url: '/cities/'+Id,
                date: Id
            }).then(function (res) {
                if (res.status == 200)
                {
                    addCities(res.data)
                    return true
                }
            })
        })
    </script>
@endsection
