@extends('website.layouts.app')

@section('title', $product->name)

@section('description', $product->sub_description)

@section('bread', $product->name)

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div
                        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper-container mySwiper2"
                    >
                        <div class="swiper-wrapper">
                            @foreach($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/'.$photo->image) }}"/>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/'.$photo->image_avatar) }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 p-3">
                    <h1 class="h2">
                        {{ $product->name }}
                    </h1>
                    <p>
                        {{ $product->sub_description }}
                    </p>
                    <div>
                        @if($product->discount != 0)
                            <p class="text-line-through h4 d-inline-block ">
                                {{ $product->price }}ريال
                            </p>
                            <p class="h3 ltn__secondary-color d-inline-block my-2">
                                {{ $product->price - ( $product->price * ($product->discount / 100) ) }} ريال
                            </p>
                        @else
                            <p class="h3 ltn__secondary-color ">
                                {{ $product->price }} ريال
                            </p>
                        @endif
                    </div>
                    <div>
                        <div class="d-inline-block">
                            <select name="size" class="form-control" id="size">
                                <option>اختر الحجم</option>
                                @foreach($product->sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-inline-block mx-2">
                            <input name="qy" type="number" class="form-control" placeholder="الكمية">
                        </div>
                        <div>
                            <p class="m-0 mt-2">اختر اللون</p>
                            @foreach($product->colors as $key => $color)
                                <label style="background: {{$color->color}};" class="label-color"
                                       for="color{{$key}}"></label>
                                <input class="input-color" type="radio" name="color" id="color{{$key}}"
                                       value="{{ $color->id }}">
                            @endforeach
                        </div>
                    </div>
                    <button class="btn theme-btn-1 btn-effect-2 text-uppercase">اضف الي العربة</button>
                    <button class="btn theme-btn-2 bg-danger btn-effect-2">اضف الي قائمة الامنيات</button>
                </div>
            </div>
        </div>
    </section>


    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">{{ $product->category->name }}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $product->created_at->format('Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $product->name }}</h1>
                        <label>{{ $product->category->name }}</label>
                        <h4 class="title-2">الوصف</h4>

                        {!! $product->description !!}
                        @if(!$product->specifications->isEmpty())
                            <h4 class="title-2">تفاصيل الملكية</h4>
                            <table class="table table-striped">
                                <tbody>
                                @foreach($product->specifications as $specification)
                                    <tr>
                                        <td>{{$specification->name}}</td>
                                        <td>{{ $specification->body }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div
                            class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">تقيمات</h4>
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                    <li class="review-total"><a href="#"> ( 95 تقييم )</a></li>
                                </ul>
                            </div>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/1.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">عمر خالد</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                                        سيلهي القارئ عن التركيز على الشكل الخارجي</p>
                                                    <span class="ltn__comment-reply-btn">سبتمبر3, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/3.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">خالد عقبي</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                                        سيلهي القارئ عن التركيز على الشكل الخارجي</p>
                                                    <span class="ltn__comment-reply-btn">يناير 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/2.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">يونس محمود</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                                        سيلهي القارئ عن التركيز على الشكل الخارجي</p>
                                                    <span class="ltn__comment-reply-btn">مارس 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- comment-reply -->
                            <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                <form action="#">
                                    <h4>اضف تقييم</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                            <h6>تقييمك:</h6>
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea placeholder="اكتب تعليق...."></textarea>
                                    </div>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="الاسم....">
                                    </div>
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" placeholder="البريد الاليكتروني...">
                                    </div>
                                    <div class="input-item input-item-website ltn__custom-icon">
                                        <input type="text" name="website" placeholder="الموقع....">
                                    </div>
                                    <label class="mb-0"><input type="checkbox" name="agree"> احفظ اسمي ، بريدي
                                        الإلكتروني ، والموقع الإلكتروني في هذا المتصفح لاستخدامها المرة المقبلة في
                                        تعليقي.</label>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                            ارسال
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <h4 class="title-2">اعلانات متعلقة</h4>
                        <div class="row">
                            <!-- ltn__product-item -->
                            <div class="col-xl-6 col-sm-6 col-12">
                                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                    <div class="product-img">
                                        <a href="product-details.html"><img src="img/product-3/1.jpg" alt="#"></a>
                                        <div class="real-estate-agent">
                                            <div class="agent-img">
                                                <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-badge">
                                            <ul>
                                                <li class="sale-badg">اعلان</li>
                                            </ul>
                                        </div>
                                        <h2 class="product-title"><a href="product-details.html">للايجار شقه بجدة</a>
                                        </h2>
                                        <div class="product-img-location">
                                            <ul>
                                                <li>
                                                    <a href="product-details.html"><i class="flaticon-pin"></i> جدة
                                                        السعودية</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                            <li><span>3 </span>
                                                غرف
                                            </li>
                                            <li><span>2 </span>
                                                غرف
                                            </li>
                                            <li><span>3450 </span>
                                                غرف
                                            </li>
                                        </ul>
                                        <div class="product-hover-action">
                                            <ul>
                                                <li>
                                                    <a href="#" title="Quick View" data-toggle="modal"
                                                       data-target="#quick_view_modal">
                                                        <i class="flaticon-expand"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Wishlist" data-toggle="modal"
                                                       data-target="#liton_wishlist_modal">
                                                        <i class="flaticon-heart-1"></i></a>
                                                </li>
                                                <li>
                                                    <a href="portfolio-details.html" title="Compare">
                                                        <i class="flaticon-add"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info-bottom">
                                        <div class="product-price">
                                            <span>ريال349,00<label>/شهر</label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <div class="col-xl-6 col-sm-6 col-12">
                                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                    <div class="product-img">
                                        <a href="product-details.html"><img src="img/product-3/2.jpg" alt="#"></a>
                                        <div class="real-estate-agent">
                                            <div class="agent-img">
                                                <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-badge">
                                            <ul>
                                                <li class="sale-badg">اعلان</li>
                                            </ul>
                                        </div>
                                        <h2 class="product-title"><a href="product-details.html">للايجار فيلا
                                                بالرياض</a></h2>
                                        <div class="product-img-location">
                                            <ul>
                                                <li>
                                                    <a href="product-details.html"><i class="flaticon-pin"></i>
                                                        الرياض</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                            <li><span>3 </span>
                                                غرف
                                            </li>
                                            <li><span>2 </span>
                                                غرف
                                            </li>
                                            <li><span>3450 </span>
                                                غرف
                                            </li>
                                        </ul>
                                        <div class="product-hover-action">
                                            <ul>
                                                <li>
                                                    <a href="#" title="Quick View" data-toggle="modal"
                                                       data-target="#quick_view_modal">
                                                        <i class="flaticon-expand"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Wishlist" data-toggle="modal"
                                                       data-target="#liton_wishlist_modal">
                                                        <i class="flaticon-heart-1"></i></a>
                                                </li>
                                                <li>
                                                    <a href="portfolio-details.html" title="Compare">
                                                        <i class="flaticon-add"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info-bottom">
                                        <div class="product-price">
                                            <span>ريال349,00<label>/الشهر</label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('js-code')
    <script>
        var swiper = new Swiper(".mySwiper", {
            zoom: true,
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,

        });
        var swiper2 = new Swiper(".mySwiper2", {
            zoom: true,
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        $('.slider-for').slick(
            {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            }
        )
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
        $(document).on('click', '.label-color', function () {

            $('.label-color').removeClass('label-color-active')
            $(this).addClass('label-color-active')
        })
    </script>
@endsection
