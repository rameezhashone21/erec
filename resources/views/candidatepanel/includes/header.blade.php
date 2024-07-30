<header class="py-3 py-lg-0 header-dashboard" id="headerDashboard">
  <img src="{{ asset('dashboard/images/bg_shape_header.svg') }}" alt=""
    class="position-absolute z-index--1 d-none d-lg-inline">
  <div class="container">
    <div class="d-flex d-lg-none align-items-center">
      <div>
        <a class="navbar-brand" href="#"><img src="{{ asset('dashboard/images/logo.png') }}" alt=""
            class="img-fluid d-block"></a>
      </div>
      <div class="ml-auto d-flex w-100 justify-content-end">
        <div class="dropdown">
          <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#" role="button"
            id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if (isset(auth()->user()->avatar))

              @if (auth()->user()->avatar != null)
                <img class="profile_thumb me-2 rounded-50" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                  alt="">
              @else
                <img class="profile_thumb me-2 rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                  alt="">
              @endif
            @else
              <img class="profile_thumb me-2 rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                alt="">
            @endif
            <span class="fs-14 text_dark_292929 fw-500 ">Menu</span>
            {{-- <span class="fs-14 text_dark_292929 fw-500 ">
                            {{ auth()->user()->candidate->first_name }}
                            {{ auth()->user()->candidate->last_name }}</span> --}}
          </a>
          <ul class="dropdown-menu " aria-labelledby="messageDropdown">
            {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li> --}}
            <li class="d-flex justify-content-between align-items-center p-2 mx-3">
              <a class="dropdown-item fs-14 p-0" href="{{ route('candidate.dashboard') }}">Dashboard
              </a>
            </li>
            <li class="d-flex justify-content-between align-items-center p-2 mx-3">
              <a class="dropdown-item fs-14 p-0" href="{{ route('candidates.job.index') }}">My Job
                Applications
              </a>
            </li>
            <li class="d-flex justify-content-between align-items-center p-2 mx-3">
              <a class="dropdown-item fs-14 p-0" href="{{ route('candidates.details.view') }}">My Profile
              </a>
            </li>
            <li class="d-flex justify-content-between align-items-center p-2 mx-3">
              <a class="dropdown-item fs-14 p-0" href="{{ route('candidates.cvList') }}">My Resumes
              </a>
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
            {{-- <hr class="my-0">
                        <li class="d-flex justify-content-between align-items-center p-2 mx-3">
                            <a class="dropdown-item fs-14 p-0" href="{{ route('job.browse') }}">Browse
                        Jobs</a>
                        </li> --}}
          </ul>
        </div>
        <div class="text-end align-self-center">
          <button data-trigger="navbar_main" class="d-lg-none btn" type="button">
            <i class="fa-solid fa-bars-staggered fs-3rem"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <nav id="navbar_main" class="mobile-offcanvas navbar-expand-lg">
    <div class="offcanvas-header">
      <button class="btn-close float-end color-dark">x</button>
    </div>
    <div class="main_menu_top py-3">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-2">
            <a class="navbar-brand d-none d-lg-inline" href="{{ route('index') }}">
              <img src="{{ asset('dashboard/images/logo.png') }}" alt="" class="img-fluid logo-img d-block">
            </a>
          </div>
          <div class="col-md-10 row align-items-center justify-content-end">
            <form action="{{ route('search.Keyword.view') }}" class="col-md-7" method="get">
              {{-- @csrf --}}
              <div
                class="header_search_bar mx-auto d-sm-flex  position-relative justify-content-center position-relative"
                id="showDiv">
                <input type="search" class="form-control input_dash_theme mb-3 mb-sm-0" id="search-title"
                  placeholder="Search keyword" autocomplete="off" name="searchKeyword">
                <div id="search-title-search" class="search-suggestion-bar position-absolute shadow-lg d-none">
                </div>
                <select class="form-select input_dash_theme border-left-0" name="for" id="for">
                  <option value="post">Jobs</option>
                  <option value="users">Users</option>
                </select>
                <button class="w-sm-100 btn_theme  border-0 fs-14 py-2 d-inline-block" type="submit">Search</button>
                <i class="fa-solid fa-magnifying-glass position-absolute text_grey_999"></i>
              </div>
            </form>
            <div class="d-flex align-items-center col-md-5 justify-content-md-end mt-3 mt-md-0" style="gap: 1.3rem">
              <a class="d-flex fs-14 btn-subcription bronze px-3" href="{{ route('job.browse') }}">
                Browse Jobs
              </a>
              <ul class="d-none d-md-flex align-items-center justify-content-lg-end">
                <li>
                  <div class="dropdown">
                    <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#" role="button"
                      id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      @if (isset(auth()->user()->avatar))

                        @if (auth()->user()->avatar != null)
                          <img class="profile_thumb me-2 rounded-50"
                            src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="">
                        @else
                          <img class="profile_thumb me-2 rounded-50"
                            src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                        @endif
                      @else
                        <img class="profile_thumb me-2 rounded-50"
                          src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                      @endif
                      <span class="fs-14 text_dark_292929 fw-500">
                        Menu
                    </a>
                    <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                      <li class="p-2 mx-3">
                        <a class="d-flex justify-content-between dropdown-item fs-14 p-0"
                          href="{{ route('candidate.dashboard') }}">
                          <span>
                            Dashboard
                          </span>
                          <span>
                            <img src="{{ asset('/dashboard/images/dashboard.png') }}" alt="dashboard icon"
                              style="width: 21px; height: 21px;">
                          </span>
                        </a>
                      </li>
                      <li class="p-2 mx-3">
                        <a class="d-flex justify-content-between dropdown-item fs-14 p-0"
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
                      <li class="p-2 mx-3">
                        <a class="d-flex justify-content-between dropdown-item fs-14 p-0"
                          href="{{ route('candidates.details.view') }}">
                          <span>
                            My Profile
                          </span>
                          <span>
                            <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"
                              style="width: 21px; height: 21px;">
                          </span>
                        </a>
                      </li>
                      <li class="p-2 mx-3">
                        <a class="d-flex justify-content-between align-items-center dropdown-item fs-14 p-0"
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

                      <li class="p-2 mx-3">
                        <a class="d-flex justify-content-between align-items-center dropdown-item fs-14 p-0"
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
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main_menu bg_primary py-3 d-none">

      <div class="container">
        <div class="row">
          <div class="col-12">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}"
                  @if (Route::is('index')) class="nav-link active" @else class="nav-link" @endif>Home</a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('services') }}"
                  @if (Route::is('services')) class="nav-link active" @else class="nav-link" @endif>Services</a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('about') }}"
                  @if (Route::is('about')) class="nav-link active" @else class="nav-link" @endif>About
                  Us</a> </li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('job.browse') }}"
                  @if (Route::is('job.browse')) class="nav-link active" @else class="nav-link" @endif>Browse
                  Jobs</a> </li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('platform') }}"
                  @if (Route::is('platform')) class="nav-link active" @else class="nav-link" @endif>Technology</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
<div style="height: 74.4px"></div>
