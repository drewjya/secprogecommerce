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

    <!-- Styles -->
    <link href="{{ asset('asset/css/dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/signup.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">



</head>

<body>
    <div id="app">
        <div class="header">
            <div id="navbar">
                <div id="src">
                    <a href="/"><img src="{{ asset('asset/image/head.png') }}" alt=""></a>
                </div>
            </div>
            <div id="logo">
                <input type="text" placeholder="Search..">
                <a href="#" class="item-link"><img src="{{ asset('asset/image/search.png') }}" alt=""></a>
            </div>

            <div class="dropdown">
                <button class="dropbtn"><a href="{{ url('category') }}">Categories</a></button>


            </div>

            @guest
                <div id="socialmedia">
                    @if (Route::has('login'))

                        <div class="namaakun">
                            <a class="namamenu" href="{{ route('login') }}">
                                <p>{{ __('Login') }}</p>
                            </a>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="namaakun">
                            <a class="namaakun" href="{{ route('register') }}">
                                <p>{{ __('Register') }}</p>
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div id="ig" class="sosmed">
                    <a href="{{ url('cart') }}"><img src="{{ asset('asset/image/shhopping-cart.png') }}" alt=""></a>
                </div>
                <div class="dropdown">
                    <button class="dropbtn-ac">My Account </button>
                    <div class="dropdown-content">
                        @if (Auth::user()->role_as === 1)
                            <a href="{{ url('dashboard') }}"> {{ Auth::user()->name }}</a>
                            @else
                            <a href="{{ url('usr-dashboard') }}"> {{ Auth::user()->name }}</a>
                        @endif
                        <div class="menu">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endguest

        </div>

        <main>
            @yield('slideshow')
            <div class="title-content">
                <p>
                    @yield('title')

                </p>
            </div>
            @yield('content')
        </main>

    </div>
    <footer>
        <div class="footer">
            <div id="logofooter">
                <img src="{{ asset('asset/image/head.png') }}" alt="">
            </div>
            <div id="copyright">
                &copy; 2021 E-commerce
            </div>
            <div class="menufooter">
                <div class="menufoot">
                    <a href="#">ABOUT</a>
                </div>
                <div class="menufoot">
                    <a href="#">Terms & Condition</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}")
        </script>
    @endif
    @yield('scripts')

</body>

</html>
