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
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="card-header">Danh Sách Thành Viên</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped  ">
                            <form method="get" action="{{ route('user.search') }}">
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">PhoneNumber </th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td class="text-center"><a href="{{route('user.edit', ['id' => $user->id])}}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ \App\Enum\UserRoles::translate($user->roles) }}</td>
                                        @if ($user->avatar == null)
                                            <td class="text-center"><img class="text-center"
                                                    src="{{ asset('img/loading.svg') }}" height="30px"></td>
                                        @else
                                            <td class="text-center"><img src="{{ asset('/storage/' . $user->avatar) }}"
                                                    height="50px"></td>
                                        @endif
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <button class="btn btn-danger delete-button "
                                                data-url="{{ route('user.delete', ['id' => $user->id]) }}">
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

    </div>
@endsection
