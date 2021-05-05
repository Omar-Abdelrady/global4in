@extends('admin.layouts.app')

@section('title', '')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.store.products.store') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <div class="form-group">
                            <label for="images">اختر مجموعة من الصور</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple>
                        </div>
                        <div class="form-group images-content">

                        </div>
                        <div class="form-group">
                            <label for="name">اسم المنتج</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="اسم المنتج">
                        </div>
                        <div class="form-group">
                            <label for="category">القسم</label>
                            <select class="form-control" name="category">
                                <option value="">أختر قسم المنتج</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : null }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_description">الوصف القصير</label>
                            <textarea class="form-control" name="sub_description" id="sub_description" rows="5"
                                      placeholder="الوصف القصير">{{old('sub_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">وصف المنتج</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">الكلمات الدلاليه</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="5"
                                      placeholder="الكلمات الدلاليه">{{ old('keywords') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="colors">الوان المنتج</label>
                            <select class="form-control" name="colors[]" multiple>
                                @foreach($colors as $key => $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sizes">حجم المنتج</label>
                            <select class="form-control" name="sizes[]" multiple>
                                @foreach($sizes as $key => $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
{{--                        @dd(old())--}}
                        <div class="form-group">
                            <div class="btn btn-info add-specification">اضف معلومة للمنتج</div>
                            <div class="specification-content">
                                @if(!empty(old('specification_key')))
                                    @foreach(old('specification_key') as $key => $item)
                                        <div>
                                            <label for="">العنوان</label>
                                            <input type="text" name="specification_key[]" value="{{ old('specification_key')[$key] }}" class="form-control">

                                            <label for="">القيمة</label>
                                            <input type="text" class="form-control" name="specification_value[]" value="{{ old('specification_value')[$key] }}">
                                            <i class="fa fa-inverse specification-clear">clear</i>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-success my-2">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(function () {
            $(document).on('click', '.add-specification', function () {
                let uiInputs =
                    `
                        <div>
                            <label for="">العنوان</label>
                            <input type="text" name="specification_key[]" class="form-control">

                            <label for="">القيمة</label>
<input type="text" class="form-control" name="specification_value[]">
<i class="fa fa-inverse specification-clear">clear</i>
                        </div>
<hr>
                    `;
                let content = $('.specification-content')

                content.append(uiInputs).hide().show('slow');
            })

            $(document).on('click', '.specification-clear', function () {
                $(this).parent('div').hide('slow');
                $(this).parent('div').remove();
            })
            $('#images').change(function () {
                console.log(this.files.length)
                let reader = new FileReader();
                let imageContent = $('.images-content');
                for (let i = 0; i < this.files.length; i++) {
                    reader.onload = function (e) {
                        imageContent.append(
                            `
                            <img src="${e.target.result}" width="50" class="img-fluid"/>
                        `
                        )
                    }
                    reader.readAsDataURL(this.files[i])
                    reader.DONE
                }
            })
        })

    </script>
@endsection
