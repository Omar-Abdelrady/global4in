@extends('website.layouts.app')

@section('title', $product->name)

@section('description', $product->sub_description)

@section('bread', $product->name)

@section('content')
    <!-- LOGIN AREA START -->
    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach($product->photos as $photo)
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a>
                                <img src="{{ asset('storage/'. $photo->image) }}" alt="Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-inline-block">
                        <div class="slider-nav">
                            @foreach($product->photos as $photo)
                                <div>
                                    <img width="50" src="{{ asset('storage/'. $photo->image) }}" alt="Image">
                                </div>
                            @endforeach
                        </div>
                        <div class="slider-for">

                        </div>
                    </div>
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
                        @if(!empty($product->specifications))
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
                            {{--                            <div class="property-detail-info-list section-bg-1 clearfix mb-60">--}}
                            {{--                                <ul>--}}
                            {{--                                    @foreach($product->specifications as $item)--}}
                            {{--                                        <li><label>{{ $item->name }}:</label></li>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </ul>--}}
                            {{--                                <ul>--}}
                            {{--                                    @foreach($product->specifications as $item)--}}
                            {{--                                    <li><span>{{ $item->body }} </span></li>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                        @endif
                        <h4 class="title-2">صور </h4>
                        <div class="ltn__property-details-gallery mb-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ asset('storage/'.$product->photos[0]->image_medium) }}"
                                       data-rel="lightcase:myCollection">
                                        <img class="mb-30"
                                             src="{{ asset('storage/'.$product->photos[0]->image_medium) }}"
                                             alt="Image">
                                    </a>
                                    <a href="{{ asset('storage/'.$product->photos[1]->image_medium) }}"
                                       data-rel="lightcase:myCollection">
                                        <img class="mb-30"
                                             src="{{ asset('storage/'.$product->photos[1]->image_medium) }}"
                                             alt="Image">
                                    </a>
                                </div>
                                @if(isset($product->photos[2]->image_medium))
                                    <div class="col-md-6">
                                        <a href="{{ asset('storage/'.$product->photos[2]->image) }}"
                                           data-rel="lightcase:myCollection">
                                            <img class="img-fluid"
                                                 src="{{ asset('storage/'.$product->photos[2]->image) }}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
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
    </script>
@endsection
