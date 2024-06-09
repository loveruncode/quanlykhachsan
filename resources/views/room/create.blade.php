@extends('layout.master')


@section('content')
<!-- breadcrumb -->
<div class="page-header d-print-none">
    <div class="container-fluid-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                class="text-muted">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('room.index')}}"
                                class="text-muted">{{ __('Danh Sách Phòng') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm Phòng') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="{{route('room.store')}}" method="post">
            @csrf
            <div class="row justify-content-center">
                @include('room.form.create-left')
                @include('room.form.create-right')
            </div>
        </form>
    </div>
</div>


<script>
@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Thành công!',
    text: '{{ session('
    success ') }}',
});
@endif
</script>

<script>
@if(session('error'))
Swal.fire({
    icon: 'error',
    title: 'Thất Bại!',
    text: '{{ session('
    error ') }}',
});
@endif
</script>
@endsection
