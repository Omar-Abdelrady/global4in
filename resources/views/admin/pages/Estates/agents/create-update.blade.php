@extends('admin.layouts.app')

@section('title', isset($agent)? $agent->name: 'اضافة' )

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="" class="my-2 btn btn-success">اضافى</a>
                </div>
                <div class="col-12">
                    <form action="{{ isset($agent) ? route('admin.estates.agents.update', $agent->id) : route('admin.estates.agents.store') }}" method="post">
                        @csrf
                        @if(isset($agent))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input value="{{ isset($agent) ? $agent->name : old('name') }}" type="text" name="name" id="" class="form-control" placeholder="اسم الوكيل"
                                   aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">البريد الالكتروني</label>
                            <input value="{{ isset($agent) ? $agent->email : old('email') }}" type="text" name="email" id="" class="form-control" placeholder="البريد الالكتروني"
                                   aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهاتف</label>
                            <input value="{{ isset($agent) ? $agent->phone : old('phone') }}" type="text" name="phone" id="" class="form-control" placeholder="رقم الهاتف"
                                   aria-describedby="helpId" required>
                        </div>
                        <button class="btn btn-success">{{ isset($agent) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
