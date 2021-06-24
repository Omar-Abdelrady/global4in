@extends('admin.layouts.app')

@section('title', $service->name)

@section('content')
    <div class="conetnt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{ $service }}
                </div>
            </div>
        </div>
    </div>
@endsection
