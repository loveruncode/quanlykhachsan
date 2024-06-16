<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-home" content="{{ url('/') }}">
    <title>Quan Ly</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}" type="image/ico">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.1.0/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">
    <style>
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;

        }

        #loading-overlay img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;

        }

     
    </style>
    @stack('scripts')
</head>
