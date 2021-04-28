@extends('admin.layouts.app')
@section('title', isset($category) ? 'تعديل علي القسم' : 'اضافة')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ isset($category) ? route('admin.store.category.update', $category->id) : route('admin.store.category.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : null }}" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="sub_description">الوصف القصير</label>
                            <textarea name="sub_description" class="form-control" >{{ isset($category) ? $category->sub_description : null }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">الكلمات الدلالية</label>
                            <textarea name="keywords" class="form-control" >{{ isset($category) ? $category->keywords : null }}</textarea>
                        </div>
                        <button class="btn btn-success">{{ isset($category) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
