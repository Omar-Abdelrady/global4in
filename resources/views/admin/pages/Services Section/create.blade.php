@extends('admin.layouts.app')

@section('title', 'اضافة قسم')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.service.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">اسم الخدمة</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="اسم الخدمة">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" name="image" id="image" class="form-control-file" placeholder="صورة الخدمة">
                        </div>
                        <div class="form-group">
                            <label for="short_description">الوصف القصير</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3" placeholder="الوصف القصير"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">الكلمات الدلالية</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="3" placeholder="الكلمات الدلالية"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <div class="card-body pad">
                                <div class="mb-3">
                                  <textarea class="textarea" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                              </div>                        </div>
                        <button type="submit" class="btn btn-primary mb-3">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')

    <script>
        $(document).ready(function () {
            $('.textarea').summernote({
                lang: 'AR-ar'
            })
        })
    </script>
@endsection
