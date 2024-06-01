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
                            <li class="breadcrumb-item"><a href="{{ route('notify.index') }}"
                                    class="text-muted">{{ __('Danh Sách Thông Báo') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="card-header">Manage Notification</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped  ">
                            <form method="get" action="{{ route('notify.search') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="searchData" id="searchNotify" type="text" class="form-control"
                                        placeholder="Search..." aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="input-group-text btn btn-primary" id="basic-addon2">Search</button>
                                    </div>

                                </div>
                            </form>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $notification)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td> <a href="{{route('notify.edit', ['id' => $notification->id])}}">{{ $notification->title }}</a></td>
                                        <td>{{ $notification->desc }}</td>
                                        <td>{{ \App\Enum\NotifyStatus::translate($notification->status) }}</td>
                                        <td>{{ $notification->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-danger delete-button"
                                                data-url="{{ route('notify.delete', ['id' => $notification->id]) }}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{$data->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
