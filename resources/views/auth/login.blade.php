@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row row-cols-1 row-cols-lg-2 sign-in  ">
      <div class="col px-0 ">
        <div class="banner"></div>
      </div>
      <div class="col d-flex justify-content-center align-items-center">

        <div class="p-x-70 p-y-20 ">
          @if (session($key ?? 'error'))
            <div class="alert alert-danger" role="alert">
              {!! session($key ?? 'error') !!}
            </div>
          @endif
          @if (session('message'))
            <!-- <div class="account-title">{{ session('message') }}</div> -->
            <div class="account-title">

              <p class="alert alert-danger">{{ session('message') }}</p>

            </div>
          @endif
          <div class="text-center mb-4">
            <a href="{{ route('index') }}"> <img class="img-fluid" src="{{ asset('images/logo.png') }}"
                alt=""></a>
          </div>
          <h1 class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">
            {{-- Sign in FOR Solution for --}}
            Welcome to the Employment - Realtime Engagement Centre (E-REC). Bridging the digital experience in Real Time
          </h1>
          <p class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">
            {{-- Sign in FOR Solution for --}}
            Please Sign in or Register a new account to access the E-REC Portal.
          </p>
          <ul class="d-flex justify-content-center align-items-center list-unstyled py-3">
            <li>
              <a href="{{ route('google.login') }}"><img src="{{ asset('images/google.svg') }}" alt="google"
                  class="img-fluid"></a>
            </li>
            <li>
              <a href="{{ route('linkedin.login') }}"><img src="{{ asset('images/linkedin.svg') }}" alt="linkedin"
                  class="img-fluid"></a>
            </li>
            <li>
              <a href="{{ route('facebook.login') }}"><img src="{{ asset('images/facebook.png') }}" alt="facebook"
                  class="img-fluid" style="width: 30px; height: 30px;"></a>
            </li>
          </ul>
          <div id="captcha-error"></div>
          <p class="text-grey fs-14 mb-0 text-center or"> Or</p>
          <form method="POST" action="{{ route('login') }}" class="row g-3 register__form">
            @csrf
            <input type="hidden" id="latitude" value="" name="latitude" />
            <input type="hidden" id="longitude" value="" name="longitude" />
            <div class="col-12">
              <label for="email"
                class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
              @enderror
            </div>

            <div class="col-12">
              <label for="password" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Password') }}</label>
              <div class="position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                <i class="far fa-eye position-absolute password-icon" id="togglePassword"></i>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div>

              <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>

            </div>
            <div class="col-12">
              <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">Sign
                In</button>
            </div>
            <div class="col-12 text-center">
              <div>
                <label class="form-check-label text-grey text-center  fs-14" for="gridCheck">
                  Don't have an account? <a href="{{ route('register') }}"
                    class="text-theme-primary text-decoration-underline"> Sign Up</a>
                </label>

              </div>
              <div>
                @if (Route::has('password.request'))
                  <a class="btn btn-link" style="font-size: 14px;" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('bottom_script')
  <script>
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
  

<script>
function onSubmit(e) {
    e.preventDefault(); // Prevent form from submitting immediately

    // Check if reCAPTCHA is completed
    var recaptchaResponse = grecaptcha.getResponse();
    if (recaptchaResponse.length === 0) {
        $('#captcha-error').html('<div class="alert alert-danger"> reCAPTCHA verification failed. </div>')
        return false; // Prevent form submission
    }

    // If reCAPTCHA is completed, submit the form
    e.target.submit();
}

document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', onSubmit);
});
</script>
@endsection
