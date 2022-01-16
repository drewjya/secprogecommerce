@extends('layouts.app')

@section('content')
    <div id="isi-su">
        <div id="content-su">
            <div id="illustration-su">
                <img src="{{ asset('asset/image/signup.png') }}" alt="">
                <h1>Jual Beli Mudah Hanya di E-commerce</h1>
                <h2>Gabung dan rasakan kemudahan bertransaksi di E-commerce</h2>
            </div>
            <div class="boxsignup">
                <form id="form-su" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>{{ __('Register') }}</h1>
                    <label for="name">{{ __('Name') }}</label><br>
                    <input type="text" id="name" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br><br>
                    <label for="email">E-mail: </label><br>
                    <input type="email" id="email" @error('email') is-invalid @enderror name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror<br><br>
                    <label for="password">Password: </label><br>
                    <input type="password" id="password" @error('password') is-invalid @enderror name="password" required
                        autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror<br> <br>
                    <label for="password_confirmation-pass">Confirm Password: </label><br>
                    <input type="password" id="confirm-password" name="password_confirmation" required
                        autocomplete="new-password"><br> <br>

                    <button type="submit">
                        {{ __('Register') }}
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
