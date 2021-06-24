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
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="الوصف"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
