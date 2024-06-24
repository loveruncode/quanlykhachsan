@extends('layout.master')

@section('content')
    <!-- breadcrumb -->
    <div class="page-header d-print-none">
        <div class="container-fluid-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('food.index') }}"
                                    class="text-muted">{{ __('Danh Sách Món Ăn') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa Món Ăn') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- page body -->
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('food.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
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
                    @include('food.form.edit-left')
                    @include('food.form.edit-right')
                </div>
            </form>
        </div>
    </div>


    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('
                    success ') }}',
            });
        @endif
    </script>

    <script>
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Thất Bại!',
                text: '{{ session('
                    error ') }}',
            });
        @endif
    </script>
@endsection
