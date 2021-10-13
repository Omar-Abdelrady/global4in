@extends('admin.layouts.app')

@section('title', $ad->title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div class="row">
                    <div class="col-12">
                        <h2>
                            معلومات المستخدم
                        </h2>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>أسم المعلن</h4>
                        <p>{{ $ad->user->first_name . ' '. $ad->user->last_name }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>البريد الالكتروني للمعلن</h4>
                        <p>{{ $ad->user->email }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>رقم هاتف الملعن</h4>
                        <p>{{ $ad->user->phone }}</p>
                    </div>
                </div>
            </div>
            <br>
            <form action="{{ route('admin.estates.ads.update', $ad->id) }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="card p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2>
                                معلومات الاعلان وتفاصيله
                            </h2>
                        </div>
                        <div class="col-12">
                            <h4>صور الاعلان</h4>
                            @foreach($ad->photos as $key => $photo)
                                <img src="{{ asset('storage/'. $photo->image_avatar) }}" alt="">
                            @endforeach
                            <div class="form-group my-2">
                                <label for="">تغير صور الاعلان</label>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                                <div class="form-group images-content">

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اسم الاعلان</label>
                                <input type="text" name="title" class="form-control" placeholder="اسم الاعلان"
                                       value="{{ $ad->title }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">القسم الخاص بالاعلان</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option
                                            {{ $category->id === $ad->category_id ? 'selected': null }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اسم صاحب الاعلان</label>
                                <input type="text" name="advertiser_name" class="form-control"
                                       placeholder="اسم صاحب الاعلان" value="{{ $ad->advertiser_name }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اميل صاحب الاعلان</label>
                                <input type="email" name="advertiser_email" class="form-control"
                                       placeholder="اميل صاحب الاعلان" value="{{ $ad->advertiser_email }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">هاتف اول صاحب الاعلان</label>
                                <input type="text" name="phone" class="form-control" placeholder="هاتف اول صاحب الاعلان"
                                       value="{{ $ad->phone }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">هاتف ثاني صاحب الاعلان</label>
                                <input type="text" name="second_phone" class="form-control"
                                       placeholder="هاتف ثاني صاحب الاعلان" value="{{ $ad->second_phone }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">تفاصيل الاعلان</label>
                                <textarea name="description" placeholder="تفاصيل الاعلام"
                                          class="form-control">{{ $ad->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">السعر</label>
                                <input type="text" name="price" class="form-control" placeholder="السعر"
                                       value="{{ $ad->price }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">المساحة</label>
                                <input type="text" name="space" class="form-control" placeholder="المساحة"
                                       value="{{ $ad->space }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">العنوان</label>
                                <textarea name="address" class="form-control"
                                          placeholder="تفاصيل العنوان">{{ $ad->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">الدولة</label>
                                <select class="form-control" id="countries">
                                    @foreach($countries as $country)
                                        <option {{ $ad->city->country->id == $country->id ? 'selected': null }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">المدينة</label>
                                <select name="city_id" class="form-control" id="cities">

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <h5>للإيجار ام للبيع</h5>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $ad->sale_or_rent == 0 ? 'checked' : null }}  id="sale" type="radio"
                                           value="0" name="sale_or_rent" class="custom-control-input">
                                    <label class="custom-control-label" for="sale">للبيع</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $ad->sale_or_rent == 1 ? 'checked' : null }} id="rant" type="radio"
                                           value="1" name="sale_or_rent" class="custom-control-input">
                                    <label class="custom-control-label" for="rant">للإيجار</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5>وكيل الاعلان</h5>
                            <select class="form-control" name="ad_agent_id">
                                <option selected value>اختيار وكيل الاعلان</option>
                                @foreach(\App\Models\AdAgent::all() as $item)
                                    <option
                                        {{ $item->id === $ad->ad_agent_id ? 'selected' : null }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="btn btn-info btn-add">اضافة مواصفات اضافية</div>
                            <div class="content-specification">
                                @foreach($ad->specifications as $item)
                                    <div class="form-group my-3 row position-relative">
                                        <i class="fas fa-times specification-clear text-danger"></i>
                                        <div class="col-6">
                                            <label for="">العنوان</label>
                                            <input value="{{ $item->key }}" type="text" name="key[]" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="">الوصف</label>
                                            <input value="{{ $item->value }}" type="text" name="value[]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <button class="btn btn-success">تعديل</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js_code')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function addCities(cities) {
            var mySelect = {{ $ad->city_id }}
            $('#cities').find('option').remove().end().append(`<option value>اختر المدينة</option>`);
            $.each(cities, function (i, item) {
                $('#cities').append(`<option ${ item.id == mySelect ? 'selected': null } value='${item.id}'>${item.name}</option>`)
            })
        }
        $(document).ready(function () {
            Axios();
            var UiInput =
                `
                   <div class="form-group my-3 row position-relative">
<i class="fas fa-times specification-clear text-danger"></i>
<div class="col-6">
                   <label for="">العنوان</label>
<input type="text" name="key[]" class="form-control">
</div>
<div class="col-6">
<label for="">الوصف</label>
<input type="text" name="value[]" class="form-control">
</div>
<div class="col-12"><hr></div>
</div>
`;
            $(document).on('click', '.btn-add', function () {
                $('.content-specification').hide().append(UiInput).show('slow');
            })
            $(document).on('click', '.specification-clear', function () {
                console.log('ok')
                $(this).parent('div').hide('slow');
                $(this).parent('div').remove();
            })
        })

        $("#images").on('change', function () {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $(".images-content");
            image_holder.empty();
            if (countFiles > 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'يجب اختيار 4 صور ك اقصى حد!',
                })
                this.value = '';
                return false;
            } else if (countFiles < 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'يجب ان اختيار صورتين علي الاقل',
                })
                this.value = '';
                return false;
            }
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {
                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image img-fluid m-2 rounded",
                                'width': '200'
                            }).appendTo(image_holder);
                        }
                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }
        });

        function Axios() {
            var ID = $('#countries').val();
            if (ID == 0){
                $('#cities').find('option').remove().end().append(`<option selected value>اختر الدولة لظهور المدن</option>`);
                return false;
            }
            axios({
                method: 'get',
                url: '/cities/'+ID,
                date: ID
            }).then(function (res) {
                if (res.status == 200)
                {
                    addCities(res.data)
                    return true
                }
            })
        }

        $(document).on('change', '#countries', Axios)

    </script>
@endsection
