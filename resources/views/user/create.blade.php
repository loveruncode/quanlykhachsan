@extends('layout.master')


@section('content')

    them thanh vien

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
        });
    @endif
</script>

<script>
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Thất Bại!',
            text: '{{ session('error') }}',
        });
    @endif
</script>


@endsection
