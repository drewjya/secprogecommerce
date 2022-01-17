<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('asset/css/dashboard/style.css') }}" rel="stylesheet">

</head>

<body>
    @if (Auth::user()->role_as === 1)
        @include('layouts.inc.sidebar')

        <section class="home-section">
            @include('layouts.inc.navbar')

            <div class="home-content">
                @yield('content')
            </div>
        </section>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
            <script>
                swal("{{ session('status') }}")
            </script>
        @endif
        @yield('scripts')
    @else
    
    @endif
</body>

</html>
