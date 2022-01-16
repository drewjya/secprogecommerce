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

    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/signup.css') }}" rel="stylesheet">


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
                <a href="#"><img src="{{ asset('asset/image/search.png') }}" alt=""></a>
                <div class="dropdown">
                    <button class="dropbtn">Categories</button>
                    <div class="dropdown-content">
                        <a href="./Categorie_Shirt.html">Shirt</a>
                        <a href="./Categorie_Others.html">Others</a>
                    </div>
                </div>
            </div>
            <div id="socialmedia">
                @guest
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
                @else
                    <div id="ig" class="sosmed">
                        <a href="/cart"><img src="{{ asset('asset/image/shhopping-cart.png') }}" alt=""></a>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn-ac">My Account </button>
                        <div class="dropdown-content">
                            <a href="./Categorie_Shirt.html"> {{ Auth::user()->name }}</a>
                            <div class="menu">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        <main>
            
            @yield('content')
        </main>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
            <script>
                swal("{{ session('status') }}")
            </script>
        @endif
        @yield('scripts')
    </div>
</body>

</html>
