@extends('layout.master')


@section('content')
    <div class="page-header d-print-none">
        <div class="container-fluid-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}"
                                    class="text-muted">{{ __('Danh Sách Thành Viên') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm Thành Viên') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <div class="row justify-content-center">
                    @include('user.form.create-left')
                    @include('user.form.create-right')
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
