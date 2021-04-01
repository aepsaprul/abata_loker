@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mt-4 mb-4">
                        <div class="col-md-4 mx-auto text-center">
                            <img src="{{ asset('assets/img/logo-biru.png') }}" alt="logo" style="max-width: 150px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group">
                                <label for="password-confirm" class="font-weight-bold">{{ __('Konfirmasi Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <p>sudah punya akun? <a href="{{ url('login') }}" class="font-weight-bold text-decoration-none">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection