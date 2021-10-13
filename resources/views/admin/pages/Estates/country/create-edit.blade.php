@extends('admin.layouts.app')

@section('title', isset($country))

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="" class="my-2 btn btn-success">اضافى</a>
                </div>
                <div class="col-12">
                    <form action="{{ isset($country) ? route('admin.estates.countries.update', $country->id) : route('admin.estates.countries.store') }}" method="post">
                        @csrf
                        @if(isset($country))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="">اسم الدولة</label>
                            <input value="{{ isset($country) ? $country->name : old('name') }}" type="text" name="name" id="" class="form-control" placeholder="أسم الدولة"
                                   aria-describedby="helpId" required>
                        </div>
                        <button class="btn btn-success">{{ isset($country) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
