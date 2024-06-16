<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        @include('components.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('components.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div id="loading-overlay">
                        <img src="{{ asset('img/loading.svg') }}" alt="Loading...">
                    </div>
                    @yield('content')
                   
                </div>
            </div>
        </div>
    </div>
    @include('layout.script')
</body>
@include('layout.footer')
@include('components.modal')

</html>
