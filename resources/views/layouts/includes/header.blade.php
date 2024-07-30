<header class="custom-header header_bg_new">
  <img src="{{ asset('imgs/bg_shape_header.svg') }}" alt="" class="bg-shape-header">

  <div class="container">
    <nav class="navbar navbar-expand-xl navbar-light">
      <a class="navbar-brand" href="{{ route('index') }}"><img class="img-fluid logo-img"
          src="{{ asset('images/logo.png') }}"alt=""></a>

      <div class="d-lg-none">
        @if (Auth::check())
          {{-- <a class="notification position-relative" href="#"> <img src="{{ asset('images/bell.svg') }}"
                        alt="bell" class="img-fluid"> <span class="position-absolute"></span></a> --}}
          <div class="dropdown">
            @if (isset(auth()->user()->candidate))
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if (auth()->user()->avatar != null)
                  <img class="profile_thumb me-2 rounded-50" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                    alt="">
                @else
                  <img class="profile_thumb me-2 rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                    alt="">
                @endif
                {{ auth()->user()->candidate->first_name }}
                {{ auth()->user()->candidate->last_name }}
              </a>
            @elseif (isset(auth()->user()->company))
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if (auth()->user()->company->logo != null)
                  <img class="profile_thumb me-2 rounded-50"
                    src="{{ asset('storage/' . auth()->user()->company->logo) }}" alt="">
                @else
                  <img class="profile_thumb me-2 rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                    alt="">
                @endif
                {{ auth()->user()->company->name }}
              </a>
            @elseif (isset(auth()->user()->recruiter))
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if (auth()->user()->recruiter->avatar != null)
                  <img class="profile_thumb me-2 rounded-50"
                    src="{{ asset('storage/' . auth()->user()->recruiter->avatar) }}" alt="">
                @else
                  <img class="profile_thumb me-2 rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                    alt="">
                @endif
                {{ auth()->user()->recruiter->name }}
              </a>
            @else
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false"><img src="{{ asset('images/profile-img.svg') }}" width="30" height="30"
                  alt=""> {{ auth()->user()->name }}</a>
            @endif
            <ul class="dropdown-menu user-setting dropdown-menu-end" aria-labelledby="user-setting">
              <li class="d-flex justify-content-between border-bottom align-items-center p-2 mx-3">
                <a class="dropdown-item fs-14 p-0"
                  @if (auth()->user()->role == 'admin') href="{{ route('admin.dashboard') }}" @endif
                  @if (auth()->user()->role == 'user') href="{{ route('candidate.dashboard') }}" @endif
                  @if (auth()->user()->role == 'company') href="{{ route('company.dashboard') }}" @endif
                  @if (auth()->user()->role == 'rec') href="{{ route('dashboard') }}" @endif>My
                  Profile</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="20.531" height="20.53" viewBox="0 0 20.531 20.53">
                  <g id="profile-user" transform="translate(0 -0.001)" opacity="0.72">
                    <path id="Path_3227" data-name="Path 3227"
                      d="M10.265,0A10.265,10.265,0,1,0,20.531,10.266,10.266,10.266,0,0,0,10.265,0Zm0,3.069a3.4,3.4,0,1,1-3.395,3.4A3.4,3.4,0,0,1,10.265,3.07Zm0,14.777a7.534,7.534,0,0,1-4.906-1.809,1.447,1.447,0,0,1-.508-1.1A3.424,3.424,0,0,1,8.29,11.515h3.951a3.419,3.419,0,0,1,3.436,3.423,1.443,1.443,0,0,1-.507,1.1A7.531,7.531,0,0,1,10.263,17.847Z"
                      fill="#888" />
                  </g>
                </svg>
              </li>
              <li class="d-flex justify-content-between align-items-center p-2 mx-3">
                <a class="dropdown-item fs-14 p-0" href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="21.088" height="21.242" viewBox="0 0 21.088 21.242">
                  <g id="on-off-button" transform="translate(-0.089)" opacity="0.72">
                    <path id="Path_3228" data-name="Path 3228"
                      d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                      transform="translate(0)" fill="#888" />
                  </g>
                </svg>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        @else
          <a class="login-btn default-btn btn" href="{{ route('register') }}"> REGISTER</a>
          <a class="login-btn default-btn btn" href="{{ route('login') }}"> LOGIN</a>
        @endif
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse my-auto" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
          @if (
              !Route::is('subscription') &&
                  !Route::is('subscriptionPayment') &&
                  !Route::is('successPayment') &&
                  !Route::is('company.details') &&
                  !Route::is('candidates.details') &&
                  !Route::is('candidates.details.next') &&
                  !Route::is('candidates.details.profile') &&
                  !Route::is('candidateEducationView') &&
                  !Route::is('recruiter.details'))
            <li class="nav-item active mb-2 mb-md-0">
              <a href="{{ route('index') }}"
                @if (Route::is('index')) class="nav-link active" @else class="nav-link" @endif>Home</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="{{ route('services') }}"
                @if (Route::is('services')) class="nav-link active" @else class="nav-link" @endif>Services</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="{{ route('about') }}"
                @if (Route::is('about')) class="nav-link active" @else class="nav-link" @endif>About
                Us</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="{{ route('job.browse') }}"
                @if (Route::is('job.browse')) class="nav-link active" @else class="nav-link" @endif>Browse
                Jobs</a>
            </li>
            <li class="nav-item mb-2 mb-md-0"> <a class="nav-link" href="{{ route('platform') }}"
                @if (Route::is('platform')) class="nav-link active" @else class="nav-link" @endif>Technology</a>
            </li>
            {{-- <li class="dropdown nav-item header-dropdown">
                        <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Technologies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('platform') }}">Platform Technology</a>
                            </li>
                            <li class="dropdown nav-item header-dropdown inner-drop">
                                <a class="nav-link dropdown-toggle" role="button" id="intelligenceDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">Intelligence</a>
                                <ul class="dropdown-menu " aria-labelledby="intelligenceDropdown">
                                    <li><a class="nav-item" href="#">AI</a></li>
                                    <li><a class="nav-item" href="#">Platform ML</a></li>
                                    <li><a class="nav-item" href="#">Talent Sourcing</a></li>
                                    <li><a class="nav-item" href="#">Pre Employment Assessments</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
          @endif
        </ul>
        @if (Auth::check())
          @if (auth()->user()->role != 'user')
            @if (isset(auth()->user()->package))
              @if (auth()->user()->package->name == 'Standard')
                <a href="{{ route('subscription') }}"
                  class="d-flex fs-14 align-items-center btn-subcription bronze_web">
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Standard</span>
                </a>
              @elseif (auth()->user()->package->name == 'Business')
                <a href="{{ route('subscription') }}"
                  class="d-flex fs-14 align-items-center btn-subcription silver_web">
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Business</span>
                </a>
              @elseif (auth()->user()->package->name == 'Enterprise')
                <a href="{{ route('subscription') }}"
                  class="d-flex fs-14 align-items-center btn-subcription gold_web">
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Enterprise</span>
                </a>
              @elseif (auth()->user()->package->id == 21)
                <a href="{{ route('subscription') }}"
                  class="d-flex fs-14 align-items-center btn-subcription silver_web">
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Free To Try</span>
                </a>
              @endif
            @endif

          @endif
        @endif
        <div class="d-none d-lg-block">
          @if (Auth::check())
            {{-- <a class="notification position-relative" href="#"> <img src="{{ asset('images/bell.svg') }}"
                            alt="bell" class="img-fluid"> <span class="position-absolute"></span></a> --}}
            <div class="ps-3 dropdown ">
              @if (isset(auth()->user()->candidate))
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  @if (auth()->user()->avatar != null)
                    <img class="profile_thumb me-2 rounded-50" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                      alt="">
                  @else
                    <img class="profile_thumb me-2 rounded-50"
                      src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                  @endif
                  Menu
                </a>
              @elseif (isset(auth()->user()->company))
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  @if (auth()->user()->company->logo != null)
                    <img class="profile_thumb me-2 rounded-50"
                      src="{{ asset('storage/' . auth()->user()->company->logo) }}" alt="">
                  @else
                    <img class="profile_thumb me-2 rounded-50"
                      src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                  @endif
                  Menu
                </a>
              @elseif (isset(auth()->user()->recruiter))
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  @if (auth()->user()->recruiter->avatar != null)
                    <img class="profile_thumb me-2 rounded-50"
                      src="{{ asset('storage/' . auth()->user()->recruiter->avatar) }}" alt="">
                  @else
                    <img class="profile_thumb me-2 rounded-50"
                      src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                  @endif
                  Menu
                </a>
              @else
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('imgs/fav-icon.png') }}"
                    width="30" height="30" alt=""> Menu</a>
              @endif
              <ul class="dropdown-menu user-setting dropdown-menu-end" aria-labelledby="user-setting">
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                    @if (auth()->user()->role == 'admin') href="{{ route('admin.dashboard') }}" @endif
                    @if (auth()->user()->role == 'user') href="{{ route('candidate.dashboard') }}" @endif
                    @if (auth()->user()->role == 'company') href="{{ route('company.dashboard') }}" @endif
                    @if (auth()->user()->role == 'rec') href="{{ route('dashboard') }}" @endif>
                    <span>
                      Dashboard
                    </span>
                    <span>
                      <img src="{{ asset('/dashboard/images/dashboard.png') }}" alt="dashboard icon"
                        style="width: 21px; height: 21px;">
                    </span>
                  </a>
                </li>


                @if (auth()->user()->role == 'user')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('candidates.job.index') }}">
                      <span>
                        My Job Applications
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->role == 'company')
                  <li class="p-2 mx-3">
                    <a class="d-flex justify-content-between align-items-center dropdown-item fs-14 p-0"
                      href="{{ route('company.jobs') }}">
                      <span>
                        My Job Posts
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->role == 'rec')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item d-flex justify-content-between align-items-center fs-14 p-0"
                      href="{{ route('recruiter.jobs') }}">
                      <span>
                        My Job Posts
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                    @if (auth()->user()->role == 'admin') href="{{ route('admin.dashboard') }}" @endif
                    @if (auth()->user()->role == 'user') href="{{ route('candidates.details.view') }}" @endif
                    @if (auth()->user()->role == 'company') href="{{ route('company.profile') }}" @endif
                    @if (auth()->user()->role == 'rec') href="{{ route('recruiter.profile') }}" @endif>
                    <span>
                      My Profile
                    </span>
                    <span>
                      <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"
                        style="width: 21px; height: 21px;">
                    </span>
                  </a>
                </li>

                @if (auth()->user()->role == 'rec')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('recruiter.companyIndex') }}">
                      <span>Employeres</span>
                      <span>
                        <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif

                @if (auth()->user()->role == 'rec')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('recruiter.candidateIndex') }}">
                      <span>
                        Candidates
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/Profile.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif

                @if (auth()->user()->role == 'user')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('candidates.cvList') }}">
                      <span>
                        My Resumes
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/CV.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif

                @if (auth()->user()->role == 'company')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('company.recruiters') }}">
                      <span>Recruiters</span>
                      <span>
                        <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->role == 'company')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('company.candidateIndex') }}">
                      <span>Candidates</span>
                      <span>
                        <img src="{{ asset('/dashboard/images/Profile.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->role == 'rec')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('recruiter.map') }}">
                      <span>
                        Map View
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->role == 'company')
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="{{ route('company.map') }}">
                      <span>
                        Map View
                      </span>
                      <span>
                        <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                @endif
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span>
                      Logout
                    </span>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="21.088" height="21.242"
                        viewBox="0 0 21.088 21.242">
                        <g id="on-off-button" transform="translate(-0.089)" opacity="0.72">
                          <path id="Path_3228" data-name="Path 3228"
                            d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                            transform="translate(0)" fill="#888" />
                        </g>
                      </svg>
                    </span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a class="login-btn default-btn btn" href="{{ route('register') }}"> REGISTER</a>
            <a class="login-btn default-btn btn" href="{{ route('login') }}"> LOGIN</a>
          @endif
        </div>
      </div>
    </nav>
  </div>
</header>
