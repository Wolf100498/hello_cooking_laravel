<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('imgs/logo/favicon.png') }}" rel="icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href={{ asset('../admin/assets/css/bootstrap.min.css') }} rel="stylesheet">

    <link href="{{ asset('admin/assets/css/simple-datatables.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

</head>

<body>
    @include('layouts.inc.admin.header')
    @include('layouts.inc.admin.sidebar')

    <main id="main" class="main">
        @yield('content')


    </main>









    <script src="//unpkg.com/alpinejs"></script>

    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/validate.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


    @stack('scripts')

</body>

</html>
