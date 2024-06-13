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
                            <li class="breadcrumb-item"><a href="{{ route('route.index') }}"
                                    class="text-muted">{{ __('Danh Sách Api') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="card-header">Danh Sách Api</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
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
                                    <th scope="col">Method</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Copy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apiRoutes as $route)
                                    <tr>
                                        @php
                                            $badgeClass = 'badge badge-secondary h-100 w-100 m-0.5';
                                            switch ($route->methods()[0]) {
                                                case 'GET':
                                                    $badgeClass = 'badge badge-success h-100 w-100 m-0.5';
                                                    break;
                                                case 'POST':
                                                    $badgeClass = 'badge badge-warning h-100 w-100 m-0.5';
                                                    break;
                                                case 'PUT':
                                                    $badgeClass = 'badge badge-primary h-100 w-100 m-0.5';
                                                    break;
                                                case 'DELETE':
                                                    $badgeClass = 'badge badge-danger h-100 w-100 m-0.5';
                                                    break;
                                            }
                                        @endphp
                                        <td class="{{ $badgeClass }}">{{ implode(', ', $route->methods()) }}</td>
                                        <td id="api-{{ $loop->iteration }}" class="m-1">
                                            {{ $homeUrl }}/{{ $route->uri() }}</td>
                                        <td>{{ $route->getActionName() }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary copy-api-url"
                                                data-target="{{ $loop->iteration }}">
                                                <i class="fas fa-clone">
                                                </i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-api-url');

            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const apiUrlElement = document.getElementById(`api-${targetId}`);
                    const apiUrl = apiUrlElement.textContent.trim();

                    navigator.clipboard.writeText(apiUrl)
                        .then(() => {
                            alert(`Đã copy ${apiUrl}`);
                        })
                        .catch(err => {
                            console.error('Failed to copy: ', err);
                            alert('Failed to copy API URL. Please try again.');
                        });
                });
            });
        });
    </script>
@endsection
