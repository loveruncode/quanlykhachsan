@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Notification</div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped ">
                        <div class="input-group mb-3">
                            <input id="searchNotify" type="text" class="form-control" placeholder="Search..."
                                 aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="input-group-text btn btn-primary" id="basic-addon2">Search</button>
                            </div>
                         
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $notification)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $notification->title }}</td>
                                    <td>{{ $notification->desc }}</td>
                                    <td>{{ $notification->status }}</td>
                                    <td>{{ $notification->created_at }}</td>
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
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
