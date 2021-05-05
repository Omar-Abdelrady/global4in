@extends('admin.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.store.products.update', $product->slug) }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="images">اختر مجموعة من الصور</label>
                            <div class="row">
                                @foreach($product->photos as $image)
                                    <div class="col-md-3">
                                        <div class="p-2">
                                            <img class="img-fluid rounded"
                                                 src="{{ asset('storage/'. $image->image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple>
                        </div>
                        <div class="form-group images-content">

                        </div>
                        <div class="form-group">
                            <label for="name">اسم المنتج</label>
                            <input type="text" value="{{ $product->name }}" class="form-control" name="name"
                                   placeholder="اسم المنتج">
                        </div>
                        <div class="form-group">
                            <label for="category">القسم</label>
                            <select class="form-control" name="category">
                                <option value="">أختر قسم المنتج</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{ $product->category->id == $category->id ?: 'selected' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        f
                        <div class="form-group">
                            <label for="sub_description">الوصف القصير</label>
                            <textarea class="form-control" name="sub_description" id="sub_description" rows="5"
                                      placeholder="الوصف القصير">{{$product->sub_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">وصف المنتج</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="5">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">الكلمات الدلاليه</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="5"
                                      placeholder="الكلمات الدلاليه">{{ $product->keywords }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="colors">الوان المنتج</label>
                            <select class="form-control" name="colors[]" multiple>
                                @foreach($colors as $key => $color)
                                    <option
                                        {{ $product->hasColor($color->id) ? 'selected' : null }} value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sizes">حجم المنتج</label>
                            <select class="form-control" name="sizes[]" multiple>
                                @foreach($sizes as $key => $size)
                                    <option
                                        {{ $product->hasSize($size->id) ? 'selected' : null }} value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="btn btn-info add-specification">اضف معلومة للمنتج</div>
                            <div class="specification-content">
                                @if($product->specifications)
                                    @foreach($product->specifications as $key => $item)
                                        <div>
                                            <label for="">العنوان</label>
                                            <input type="text" name="specification_key[]"
                                                   value="{{ $item->name }}" class="form-control">

                                            <label for="">القيمة</label>
                                            <input type="text" class="form-control" name="specification_value[]"
                                                   value="{{ $item->body }}">
                                            <i class="fa fa-inverse specification-clear">clear</i>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <button class="btn btn-success my-2">تحديث</button>
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
