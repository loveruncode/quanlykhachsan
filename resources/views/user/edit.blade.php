@extends('layout.master')


@section('content')

<div class="page-header d-print-none">
    <div class="container-fluid-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}" class="text-muted">{{ __('Danh Sách Thành Viên') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Cập Nhật Thành Viên') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <form action="{{route('user.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @method('PUT')
            <div class="row justify-content-center">
                @include('user.form.edit-left')
                @include('user.form.edit-right')
            </div>
        </form>
    </div>
</div>

{{--<!-- da la data du lieu gui len em hay diem vao form nhe {{$data}} -->--}}
@endsection
