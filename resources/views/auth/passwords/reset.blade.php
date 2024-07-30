@extends('layouts.app')

@section('content')
    <div style='padding-top: 130px;'></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold fs-4">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="email"
                                        class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
                                    <div>
                                        <input id="email" readonly type="email"
                                            class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required
                                            autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="form-label fs-14 text-theme-primary fw-bold">New
                                    {{ __('Password') }}</label>
                                <div class='position-relative'>
                                    <input id="password" type="password"
                                        class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <i class="far fa-eye position-absolute password-icon reset_password_icon"
                                        id="togglePassword" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="form-label fs-14 text-theme-primary fw-bold">{{ __('Confirm Password') }}</label>
                                <div class='position-relative'>
                                    <input id="password-confirm" type="password"
                                        class="form-control fs-14 bg-theme-secondary border-0 h-50px"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <i class="far fa-eye position-absolute password-icon reset_password_icon"
                                        id="togglePasswordConfirm" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom_script')
    <script>
        const ctogglePassword = document.querySelector('#togglePasswordConfirm');
        const cpassword = document.querySelector('#password-confirm');

        ctogglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });


        // show/hide pass
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
