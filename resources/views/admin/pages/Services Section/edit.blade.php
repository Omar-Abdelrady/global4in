@extends('admin.layouts.app')

@section('title', 'تعديل')

@section('meta')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.service.update', $service->slug) }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">اسم الخدمة</label>
                            <input type="text" name="name" id="name" value="{{ $service->name }}" class="form-control"
                                   placeholder="اسم الخدمة">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" name="image" id="image" class="form-control-file"
                                   placeholder="صورة الخدمة">
                            <img src="{{ asset('storage/'.$service->logo) }}" class="img-fluid my-3" width="250" alt="">
                        </div>
                        <div class="form-group">
                            <label for="short_description">الوصف القصير</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3"
                                      placeholder="الوصف القصير">{{ $service->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">الكلمات الدلالية</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="3"
                                      placeholder="الكلمات الدلالية">{{ $service->keywords }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <div class="card-body pad">
                                <div class="mb-3">
                                  <textarea class="textarea" placeholder="Place some text here"
                                            name="description">{{ $service->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    {{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">--}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            var options = {
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                ]
            }
            $('.textarea').summernote(options)
        })
    </script>
@endsection
