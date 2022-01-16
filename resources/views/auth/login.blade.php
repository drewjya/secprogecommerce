@extends('layouts.app')

@section('content')
    <div id="isi">
        <div id="content">
            <div class="boxsignin">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Masuk Sekarang</h1>
                    <label for="email">E-mail: </label><br>
                    <input type="email" id="email" name="email" @error('email') is-invalid @enderror value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br><br>
                    <label for="username">Password: </label><br>
                    <input type="password" id="password" name="password" @error('password') is-invalid @enderror required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    <br>
                    <br>
                    <button type="submit"> {{ __('Login') }}</button>
                    <br>

                    <br>
                    @if (Route::has('password.request'))

                            <p><a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a></p>


                    @endif
                   
                </form>

            </div>
            <div id="illustration">
                <img src="{{ asset('asset/image/signin.png') }}" alt="">
                <h1>Jual Beli Mudah Hanya di E-commerce</h1>
                <h2>Gabung dan rasakan kemudahan bertransaksi di E-commerce</h2>
            </div>
        </div>
    </div>

@endsection
