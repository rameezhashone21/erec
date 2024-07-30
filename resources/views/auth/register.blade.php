@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row row-cols-1 row-cols-lg-2 sign-up">
      <div class="col px-0 ">
        <div class="banner"></div>
      </div>
      <div class="col d-flex justify-content-center align-items-center">
        <div class="p-x-70 p-y-20">
          @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
          <div class="text-center mb-4">
            <a href="{{ route('index') }}"> <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt=""></a>
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
              <a href="{{ route('facebook.login') }}" target="_blank"><img src="{{ asset('images/facebook.png') }}"
                  alt="twitter" class="img-fluid" style="width: 30px; height: 30px;"></a>
            </li>
          </ul>
          <p class="text-grey fs-14 mb-0 text-center or"> Or</p>
          <form method="POST" id="contactFrom" action="{{ route('register') }}" class="row g-3 register__form">
            @csrf

            <div class="col-md-6">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">First Name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fs-14 text-theme-primary fw-bold">Last Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="lname"
                value="{{ old('lname') }}" id="lname">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12">
              <label for="email"
                class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror
                name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12">
              <label for="password" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Password') }}</label>
              <div class="position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">
                <i class="far fa-eye position-absolute password-icon" id="togglePassword"></i>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <label for="password-confirm"
                class="form-label fs-14 text-theme-primary fw-bold">{{ __('Confirm Password') }}</label>
              <div class="position-relative">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
                <i class="far fa-eye position-absolute password-icon" id="togglePasswordConfirm"></i>
              </div>
            </div>

            <div class="col-12">
              <label for="role" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Sign up As') }}</label>
              <select id="role" name="role" class="form-control " required>
                <option value="">Select Role</option>
                {{-- <option value="admin">Admin</option> --}}
                <option value="company">Employer</option>
                <option value="rec">Recruiter</option>
                <option value="user">Candidate</option>
              </select>
              @error('role')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div>
              {!! htmlFormSnippet() !!}
              @if ($errors->has('g-recaptcha-response'))
                <div>
                  <small class="text-danger">
                    {{ $errors->first('g-recaptcha-response') }}
                  </small>
                </div>
              @endif
            </div>
            <div class="col-12">
              <div class="form-check py-2 ">
                <input class="form-check-input rounded-0" type="checkbox" required id="gridCheck">
                <label class="form-check-label text-grey fs-14" for="gridCheck">
                  I agree with the <a href="{{ route('policy') }}" target="_blank"
                    class="text-theme-primary text-decoration-underline">
                    Privacy & Policy</a>
                </label>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">Create
                Account</button>
            </div>
            <div class="col-12 text-center">
              <label class="form-check-label text-grey text-center  fs-14" for="gridCheck">
                Already a member? <a href="{{ route('login') }}" class="text-theme-primary text-decoration-underline">
                  Sign in</a>
              </label>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('bottom_script')
  <script>
    // function Propertylist() {
    //     var name = document.forms["contactFrom"]["name"].value;
    //     var lname = document.forms["contactFrom"]["lname"].value;
    //     var email = document.forms["contactFrom"]["email"].value;
    //     // var phone = document.forms["contactFrom"]["phone"].value;
    //     // var terms = document.forms["contactFrom"]["terms"];
    //     if (name == "" || lname == "" || email == "") {
    //         if (name == "") {
    //             document.getElementById("propertyfname").style.display = "block";
    //         } else {
    //             document.getElementById("propertyfname").style.display = "none";

    //         }
    //         if (lname == "") {
    //             document.getElementById("lname").style.display = "block";
    //         } else {
    //             document.getElementById("lname").style.display = "block";
    //         }
    //         if (email == "") {
    //             document.getElementById("propertyemail").style.display = "block";
    //         } else {
    //             document.getElementById("propertyemail").style.display = "none";
    //         }

    //     }
    //     else {
    //         form = document.getElementById("contactFrom");
    //         var formData = new FormData(form);
    //         console.log(formData);
    //         $.ajax({
    //             type: 'POST',
    //             url: "{{ url('https://api.e-rec.com.au/api/create/user') }}",
    //             data: formData,
    //             dataType: 'json',
    //             processData: false,
    //             contentType: false,
    //             success: function(data) {
    //                 console.log(data);
    //             },
    //             error: function(request, status, error) {
    //                 console.log(error);
    //             }
    //         });
    //     }
    // }

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
