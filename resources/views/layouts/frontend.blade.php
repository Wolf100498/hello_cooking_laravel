<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href="{{ asset('imgs/logo/favicon.png') }}" rel="icon">

    {{-- FONT AWESOME CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- BOOTSTRAP CSS --}}
    <link rel="stylesheet" href={{ asset('/css/bootstrap.css') }}>


    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <script
        src="https://www.paypal.com/sdk/js?client-id=AcoAHSB5sZHU2xCtWZwcoX6UeJ20FD8rgehhDwKvdZsuIQOZiqeVaHC77KoDcU0Ty91bzlJWgHMbVTds">
    </script>
    {{-- @livewireStyles --}}
</head>

<body id="body">
    @include('layouts.inc.home.navbar')

    {{-- {{ $slot }} --}}
    @yield('content')

    @include('layouts.inc.home.footer')


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    {{-- BOOTSTRAP --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    @yield('scripts')




    @stack('scripts')

    <script src="{{ asset('js/index.js') }}"></script>

</body>

</html>
