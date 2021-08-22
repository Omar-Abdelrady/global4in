@extends('admin.layouts.app')

@section('title', 'اضافة كوبون')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.store.coupons.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">اسم الكوبون</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                   placeholder="اسم الكوبون">
                        </div>
                        <div class="form-group">
                            <label for=""> الكوبون</label>
                            <input value="{{ old('coupon') }}" type="text" name="coupon" class="form-control"
                                   placeholder=" الكوبون">
                        </div>
                        <div class="form-group">
                            <label for="">تاريخ صلاحيت الكوبون</label>
                            <input value="{{ old('exp_date') }}" type="date" name="exp_date" class="form-control"
                                   placeholder=" تاريخ صلاحيت الكوبون">
                        </div>
                        <div class="form-group">
                            <label for="">وصف</label>
                            <textarea class="form-control" name="description" placeholder="وصف الكوبون">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">الخصم</label>
                            <input value="{{ old('discount') }}" type="number" name="discount" class="form-control"
                                   placeholder="الخصم">
                        </div>
                        <button class="btn btn-success">اضف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
