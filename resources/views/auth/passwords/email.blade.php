@extends('layouts.app') @section('content')
    <style>
        .mt-100 {
            margin-top: 100px;
        }
    </style>
    <div class="container-fluid mt-100">
        <div class="row row-cols-1 row-cols-lg-2 sign-in  ">
            <div class="col px-0 ">
                <div class="banner h-100"></div>
            </div>
            <div class="col  align-self-center">
                <div class="p-x-70 p-y-20">
                    <div class="mb-5">
                        <a href="{{ route('index') }}"> <img class="img-fluid"
                                src="{{ asset('images/logo.png') }}"alt=""></a>
                    </div>
                    <h1 class="text-theme-primary text-uppercase mb-0 fs-18 fw-bold mb-4">{{ __('Reset Password') }}</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}
                    <form method="POST" action="{{ route('password.email') }}" class="rig register__form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email"
                                    class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
