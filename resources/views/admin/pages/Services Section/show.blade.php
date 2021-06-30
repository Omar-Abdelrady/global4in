@extends('admin.layouts.app')

@section('title', $service->name)

@section('content')
    <div class="conetnt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2 ">
                                <h4>الاسم</h4>
                                <p class="text-gray">
                                    {{ $service->name }}
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الصورة الخاصة بالخدمة</h4>
                                <p class="text-gray">
                                    <img src="{{ asset('storage/'.$service->logo) }}" alt="" class="img-fluid">
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الوصف القصير</h4>
                                <p class="text-gray">
                                    {{ $service->short_description }}
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الكلمات الدلالية</h4>
                                <p class="text-gray">
                                    {{ $service->keywords }}
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>وصف الخدمة</h4>
                                <p class="text-gray">
                                    {!! $service->description !!}
                                </p>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-dark my-3">رجوع</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
