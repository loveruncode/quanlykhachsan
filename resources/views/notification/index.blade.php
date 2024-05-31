@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Notification</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped  ">
                        <form method="get" action="{{route('notify.search')}}">
                            @csrf
                        <div class="input-group mb-3">
                            <input name="searchData" id="searchNotify" type="text" class="form-control" placeholder="Search..."
                                 aria-describedby="basic-addon2">
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
                                <tr scope="row">
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $notification->title }}</td>
                                    <td>{{ $notification->desc }}</td>
                                    <td>{{ $notification->status }}</td>
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
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
