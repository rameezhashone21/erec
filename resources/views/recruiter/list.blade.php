@extends('layouts.app')

@section('content')
  <main>
    <section>
      <form action="{{ route('recruiter.list') }}">
        <div class="container pt-5 mt-4">
          <h1 class="fs-48 text-center fw-bold text-uppercase my-md-5 pb-4 pb-md-0">All recruiters</h1>
          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">
              @if (Auth::check())
                @if (auth()->user()->role != 'admin')
                  <p class="fs-14">
                    <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
                    <span>> Recruiters </span>
                  </p>
                @endif
              @endif
              <div class="row row-cols-1 form__search__box search-area mb-3 py-4 px-3 d-block" id="search_rec">
                {{-- <div class="col">
                                    <div class="position-relative">
                                        <input type="text" name="search_rec"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                            placeholder="Search any recruiter" value="{{ $search_word }}" />
                                                    <img src="{{ asset('images/icon-search.svg') }}" alt="" class="img-fluid position-absolute" />
                                                </div>
                                            </div> --}}

                <div class="col ">
                  <div class="position-relative">
                    <input type="text" name="search_rec" id="search-title" autocomplete="off"
                      class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3" {{-- onchange="form.submit()" --}}
                      placeholder="Enter recruiter name here" value="{{ $search_word }}">
                    <img src="{{ asset('images/icon-search.svg') }}" alt="" class="img-fluid position-absolute">
                    <div id="search-title-search"
                      class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                    </div>
                  </div>
                </div>
                <div class="search-area mb-3 py-3 px-3 mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="fs-18 mb-0">
                      Features
                    </h2>
                    <a data-bs-toggle="collapse" href="#Designation" role="button"
                      aria-expanded="@if (count($value) > 0) true @else false @endif"
                      aria-controls="Designation" id="collapseButtonOne" {{-- class="@if (count($value) <= 0) collapsed @endif"> --}} class="">
                      <i class="fas fa-plus" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div class="show" id="Designation">
                    <div class="mt-3">
                      <ul>
                        @foreach ($comp_fea as $row)
                          <li class="d-flex justify-content-between align-items-center py-2">
                            <div class="form-check">
                              <input class="form-check-input rounded-pill" type="checkbox" value="{{ $row->id }}"
                                name="search_skills[]" id="Laravel PHP Developer-{{ $row->id }}"
                                @foreach ($value as $col) @if ($row->id == $col)
                                            checked=checked
                                            @endif @endforeach>
                              <label class="form-check-label" for="Laravel PHP Developer-{{ $row->id }}">
                                {{ $row->name }}
                              </label>
                            </div>

                            {{-- <span> 1 </span> --}}
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>

                <button class="login-btn default-btn btn w-100">
                  <i class="fas fa-filter" aria-hidden="true"></i>
                  Click here-Filter Search
                </button>
                <div class="mt-2 text-end">
                  <a href="javascript:void(0)" class="fs-14" id="recruiterReset">
                    Reset<i class="fas fa-sync ms-2" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-8">
              <div class="row align-items-center justify-content-between gy-3 mb-4">
                <div class="col-lg-4">
                  <h3 class="view_profile_description fs-16 mb-0">Showing
                    {{-- Showing 1-{{ count($rec) }} Of {{ $rec->total() }} Recruiters --}}
                    @if (count($rec) > 0)
                      1-
                    @endif
                    {{ count($rec) }} Of {{ $rec->total() }} Recruiters
                  </h3>
                </div>
                <div class="col-lg-7">
                  <form action="{{ route('recruiter.list') }}" method="get">
                    <div class="d-flex justify-content-end">
                      <div class="me-3">
                        <select id="role" onchange="this.form.submit()" name="sort_by"
                          class="sort_input form-select">
                          <option selected value="">All</option>
                          <option value="1" @if ($sort == 1) selected @endif>
                            Last 24 hours</option>
                          <option value="3" @if ($sort == 3) selected @endif>
                            Last 3 Days</option>
                          <option value="7" @if ($sort == 7) selected @endif>
                            Last 7 Days</option>
                          <option value="14" @if ($sort == 14) selected @endif>
                            Last 14 Days</option>
                          <option value="30" @if ($sort == 30) selected @endif>
                            Last 30 Days</option>
                        </select>
                      </div>
                      <div>
                        <select id="role" onchange="this.form.submit()" name="per_page"
                          class="sort_input form-select">
                          <option value="">-Select-</option>
                          <option value="10" @if ($pg == 10) selected @endif>10
                            Per Page</option>
                          <option value="25" @if ($pg == 25) selected @endif>25
                            Per Page</option>
                          <option value="50" @if ($pg == 50) selected @endif>50
                            Per Page</option>
                          <option value="100" @if ($pg == 100) selected @endif>
                            100
                            Per Page</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-1 gy-lg-5 gy-4">
                @if (count($rec) > 0)
                  @foreach ($rec as $row)
                    <div class="col">
                      <div class="new-recruter-box">
                        @if ($row->user->banner != null)
                          <img src="{{ asset('public/storage/' . $row->user->banner) }}" alt="profile-img"
                            class="user_banner img-fluid">
                        @else
                          <img src="{{ asset('dashboard/images/RecruiterSM.png') }}" alt=""
                            class="user_banner img-fluid">
                        @endif
                        <div class="text-center px-3 pb-4">
                          @if ($row->avatar != null)
                            <img src="{{ asset('public/storage/' . $row->avatar) }}" alt="profile-img" class="user_logo">
                          @else
                            <img src="{{ asset('images/profile-img.png') }}" alt="profile-img" class="user_logo">
                          @endif
                          {{-- <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-11_.123.14285714286_.jpg"
                                                alt="" class="user_logo"> --}}
                          <h2 class="title">{{ $row->name . ' ' . $row->lastName }}</h2>
                          @if (isset($row->location))
                            <p class="location d-flex align-items-center justify-content-center">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.858" height="14.605"
                                  viewBox="0 0 10.858 14.605">
                                  <g id="location-pin" transform="translate(-5.627 -1.238)">
                                    <path id="Path_3244" data-name="Path 3244"
                                      d="M15.352,8.971a2,2,0,1,0,2,2A2,2,0,0,0,15.352,8.971Zm0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1Z"
                                      transform="translate(-4.297 -4.3)" fill="#c4c4c4" />
                                    <path id="Path_3245" data-name="Path 3245"
                                      d="M14.894,2.827a5.429,5.429,0,0,0-8.388,6.8l3.774,5.794a.925.925,0,0,0,1.549,0L15.6,9.629a5.429,5.429,0,0,0-.71-6.8Zm-.127,6.257-3.712,5.7-3.712-5.7a4.43,4.43,0,1,1,7.424,0Z"
                                      transform="translate(0 0)" fill="#c4c4c4" />
                                  </g>
                                </svg>
                              </span>
                              <span>{{ $row->location }}</span>
                            </p>
                          @endif
                          @if (isset($row->openPosts) and count($row->openPosts) > 0)
                            <p class="job_type">
                              Open Jobs - ({{ count($row->openPosts) }})
                            </p>
                          @else
                            {{-- <p class="job_type" style="height: 26px;"></p> --}}
                            <p class="job_type">No Open Jobs</p>
                          @endif
                          <div class="d-flex justify-content-center button">
                            <a  href="{{ route('recruiter.detail', $row->slug) }}"
                              class="view_profile_button d-block w-100 text-center">View
                              Profile</a>
                            {{-- @if (auth()->user()->role != 'user' and auth()->user()->role != 'rec')
                                                        <a href="{{ route('login') }}"
                                    class="default-btn w-100 text-center">Connect</a>
                                    @endif --}}

                            @if (Auth::check())
                              @if (auth()->user()->role == 'company')
                                @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                                  @if ($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1)
                                    <a type="button" class="default-btn w-100 text-center btn-disabled"
                                      disabled>Connected</a>
                                  @else
                                    <a type="button" class="default-btn w-100 text-center btn-disabled"
                                      disabled>Request Sent </a>
                                  @endif
                                @else
                                  <a href="{{ route('company.recruiters.send', $row->id) }}"
                                    class="default-btn w-100 text-center">Connect</a>
                                @endif
                              @else
                                <a href="{{ route('login') }}" class="default-btn w-100 text-center">Connect</a>
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @else
                  <p>Recruiter not found</p>
                @endif

              </div>

              <div class="d-flex justify-content-center pt-5">
                {{ $rec->appends(request()->except(['page', '_token']))->links() }}
              </div>

            </div>
          </div>
        </div>
      </form>
    </section>

  </main>
@endsection
@section('bottom_script')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  <script>
    function fitTextTitle(id) {
      var value = $("#para-" + id).html();
      console.log(value);
      $("#search-title").val(value);
    }

    const searchLogic = function() {

      $("#search-title-search").append("");

      formData = {
        value: $(this).val(),
      }
      // console.log(formData);
      $("#search-title-select").addClass('d-none');
      $("#search-title-location").addClass('d-none');
      $.ajax({
        type: "GET",
        url: "{{ route('searchRecruiterSmart') }}",
        data: {
          value: $('#search-title').val(),
        },
        dataType: "json",
        encode: true,
      }).done(function(data) {
        console.log(data);
        $("#search-title-search").removeClass('d-none');
        $("#search-title-search").html('');
        html = '';
        if (data['rec'].length == 0) {
          $("#search-title-search").html("No Record Found");
        } else {
          $.each(data['rec'], function(index, value) {
            html +=
              "<a class='d-block border-bottom py-2 fs-14' href='{{ route('recruiter.detail', '') }}/" +
              value['slug'] +
              "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
              ")'>" +
              value['name'] + "</a>";
          });
        }
        if ($("#search-title").val().length == 0) {
          $("#search-title-search").addClass('d-none');
        }
        $("#search-title-search").append(html);
        this.value = "";
      });
    }
    const getInterval = setInterval(() => {
      if ($('#search-title').length) {
        $('#search-title').unbind("keydown", searchLogic);
        $('#search-title').on("keydown", searchLogic);
      }
    }, 1000);


    $(function() {
      $("#search-title-hide").on("click", function(a) {
        // $("#search-title-search").addClass("d-none");
        a.stopPropagation()
      });
      $(document).on("click", function(a) {
        if ($(a.target).is("#search-title-search") === false) {
          $("#search-title-search").addClass("d-none");
        }
      });
    });
  </script>
@endsection
