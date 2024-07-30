@extends('layouts.app')

@section('content')
    <main>
        <section>
            <form action="{{ route('candidates.list') }}" method="get">
                <div class="container pt-5 mt-4">
                    <h1 class="fs-48 text-center fw-bold text-uppercase my-md-5 pb-4 pb-md-0">Candidates</h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-4">
                            @if (Auth::check())
                                @if (auth()->user()->role != 'admin')
                                    <p class="fs-14">
                                        <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    </p>
                                @endif
                            @endif
                            <div class="row row-cols-1 form__search__box search-area mb-3 py-4 px-3 d-block">
                                {{-- <div class="col">
                                    <div class="position-relative">
                                        <input type="text" class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                            placeholder="Search by Name" name="name" value="{{ $search_word }}">
                                        <img src="{{ asset('images/icon-search.svg') }}" alt="icon-search"
                                            class="img-fluid position-absolute">
                                    </div>
                                </div> --}}
                                <div class="col ">
                                    <div class="position-relative">
                                        <input type="text" name="name" id="search-title" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                            {{-- onchange="form.submit()" --}} placeholder="Enter Job Title Here"
                                            value="{{ $search_word }}">
                                        <img src="{{ asset('images/icon-search.svg') }}" alt=""
                                            class="img-fluid position-absolute">
                                        <div id="search-title-search"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col position-relative">
                                    <input type="text" class="w-100 fs-14 bg-theme-secondary px-5 text-dark h-50px mb-3"
                                        placeholder="Enter Locations Here">
                                    <img src="{{ asset('images/icon-location.svg') }}" alt="icon-location"
                                        class="img-fluid position-absolute">
                                </div> --}}

                                {{-- <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18 text-theme-primary fw-bold">
                                            Job Title
                                        </h2>
                                        <a data-bs-toggle="collapse" href="#Designation" role="button" aria-expanded="false"
                                            aria-controls="Designation" id="collapseButtonOne" class="collapsed">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse" id="Designation">
                                        <div class="mt-3">
                                            <ul class="border-top">
                                                @foreach ($title as $key => $row)
                                                    <li
                                                        class="d-flex justify-content-between align-items-center  border-bottom-dash py-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input rounded-pill" type="checkbox"
                                                                @foreach ($designation as $item) @if ($item == $key) checked @endif @endforeach
                                                                value="{{ $key }}" name="designation[]"
                                                                id="{{ $key }}">
                                                            <label class="form-check-label" for="{{ $key }}">
                                                                {{ $key }}
                                                            </label>
                                                        </div>

                                                        <span>
                                                            {{ count($row) }}
                                                        </span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Experience</h2>
                                        {{-- <a href="javascript:void(0)"> --}}
                                        <a data-bs-toggle="collapse" href="#Experience" role="button"
                                            aria-expanded="@if ($exp != null) true @else false @endif"
                                            aria-controls="Experience" id="collapseButtonOne"
                                            class="@if ($exp != null) collapsed @endif">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="collapse show @if ($exp != null) show @endif"
                                        id="Experience">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="6 Months"
                                                            type="radio" name="experience" id="jt1"
                                                            @if ($exp == '6 Months') checked=checked @endif>
                                                        <label class="form-check-label" for="jt1">
                                                            6 Months
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="1+ Year"
                                                            type="radio" name="experience" id="jt2"
                                                            @if ($exp == '1+ Year') checked=checked @endif>
                                                        <label class="form-check-label" for="jt2">
                                                            1+ Year
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="2+ Years"
                                                            type="radio" name="experience" id="jt3"
                                                            @if ($exp == '2+ Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt3">
                                                            2+ Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="3+ Years"
                                                            type="radio" name="experience" id="jt4"
                                                            @if ($exp == '3+ Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt4">
                                                            3+ Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="4+ Years"
                                                            type="radio" name="experience" id="jt5"
                                                            @if ($exp == '4+ Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt5">
                                                            4+ Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="5+ Years"
                                                            type="radio" name="experience" id="jt6"
                                                            @if ($exp == '5+ Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt6">
                                                            5+ Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" value="6+ Years"
                                                            type="radio" name="experience" id="jt7"
                                                            @if ($exp == '6+ Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt7">
                                                            6+ Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill"
                                                            value="More than 10 Years" type="radio" name="experience"
                                                            id="jt8"
                                                            @if ($exp == 'More than 10 Years') checked=checked @endif>
                                                        <label class="form-check-label" for="jt8">
                                                            More than 10 Years
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Skills</h2>
                                        <a href="javascript:void(0)">
                                            <a data-bs-toggle="collapse" href="#Skills" role="button"
                                                aria-expanded="@if (count($related) > 0) true @else false @endif"
                                                aria-controls="Skills" id="collapseButtonOne"
                                                class="@if (count($related) <= 0) collapsed @endif">
                                                <i class="fas fa-plus" aria-hidden="true"></i>
                                            </a>
                                    </div>
                                    <div class="collapse @if (count($related) > 0) show @endif" id="Skills">
                                        <div class="mt-3">
                                            <ul>
                                                @foreach ($skill as $key => $row)
                                                    <li class="d-flex justify-content-between align-items-center  py-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input rounded-pill"
                                                                value="{{ $row->id }}" type="checkbox"
                                                                name="skill[]" id="jtk{{ $row->id }}"
                                                                @foreach ($related as $col)
                                                                @if ($row->id == $col)
                                                                    checked=checked
                                                                @endif @endforeach>
                                                            <label class="form-check-label" for="jtk{{ $row->id }}">
                                                                {{ $row->name }}
                                                            </label>
                                                        </div>

                                                        <span>
                                                            {{-- 124 --}}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <h2 class="fs-18 text-theme-primary fw-bold">Job Type</h2>
                                        <a href="javascript:void(0)">
                                            <a data-bs-toggle="collapse" href="#JobType" role="button" aria-expanded="false"
                                            aria-controls="JobType" id="collapseButtonOne" class="collapsed">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="collapse" id="JobType">
                                        <div class="mt-3">
                                            <ul>
                                                <li
                                                    class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="jt1">
                                                        <label class="form-check-label" for="jt1">
                                                            Option 1
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-between align-items-center border-bottom-dash py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="jt2">
                                                        <label class="form-check-label" for="jt2">
                                                            Option 2
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="jt3">
                                                        <label class="form-check-label" for="jt3">
                                                            Option 3
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18 text-theme-primary fw-bold">Experience Level</h2>

                                        <a href="javascript:void(0)">
                                            <a data-bs-toggle="collapse" href="#Experience" role="button" aria-expanded="false"
                                            aria-controls="Experience" id="collapseButtonOne" class="collapsed">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="collapse" id="Experience">
                                        <div class="mt-3">
                                            <ul>
                                                <li
                                                    class="d-flex justify-content-between align-items-center  py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="e1">
                                                        <label class="form-check-label" for="e1">
                                                            Option 1
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-between align-items-center border-bottom-dash py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="e2">
                                                        <label class="form-check-label" for="e2">
                                                            Option 2
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            name="flexRadioDefault" id="e3">
                                                        <label class="form-check-label" for="e3">
                                                            Option 3
                                                        </label>
                                                    </div>

                                                    <span>
                                                        124
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}

                                <button class="login-btn default-btn btn w-100">
                                    <i class="fas fa-filter" aria-hidden="true"></i>
                                    Click here-Filter Search
                                </button>
                                <div class="mt-2 text-end">
                                    <a href="javascript:void(0)" class="fs-14" id="resetCand">
                                        Reset<i class="fas fa-sync ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="row align-items-center justify-content-between gy-3 mb-4">
                                <div class="col-lg-4">
                                    <h3 class="view_profile_description fs-16 mb-0">Showing
                                        @if (count($cand) > 0)
                                            1-
                                        @endif
                                        {{ count($cand) }} Of {{ $cand->total() }} Candidates
                                    </h3>
                                </div>
                                <div class="col-lg-7">
                                    <form action="{{ route('candidates.list') }}" method="get">
                                        <div class="d-flex justify-content-end">
                                            <div class="me-3">
                                                <select id="role" onchange="this.form.submit()" name="sort_by"
                                                    class="sort_input form-select">
                                                    <option selected value="">All</option>
                                                    <option value="1"
                                                        @if ($sort == 1) selected @endif>
                                                        Last 24 hours</option>
                                                    <option value="3"
                                                        @if ($sort == 3) selected @endif>
                                                        Last 3 Days</option>
                                                    <option value="7"
                                                        @if ($sort == 7) selected @endif>
                                                        Last 7 Days</option>
                                                    <option value="14"
                                                        @if ($sort == 14) selected @endif>
                                                        Last 14 Days</option>
                                                    <option value="30"
                                                        @if ($sort == 30) selected @endif>
                                                        Last 30 Days</option>
                                                </select>
                                            </div>
                                            <div>
                                                <select id="role" onchange="this.form.submit()" name="per_page"
                                                    class="sort_input form-select">
                                                    <option value="">-Select-</option>
                                                    <option value="10"
                                                        @if ($pg == 10) selected @endif>10
                                                        Per Page</option>
                                                    <option value="25"
                                                        @if ($pg == 25) selected @endif>25
                                                        Per Page</option>
                                                    <option value="50"
                                                        @if ($pg == 50) selected @endif>
                                                        50
                                                        Per Page</option>
                                                    <option value="100"
                                                        @if ($pg == 100) selected @endif>
                                                        100
                                                        Per Page</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-lg-5 gy-4" id="msg-btn">
                                @if (count($cand) > 0)
                                    @foreach ($cand as $row)
                                        <div class="col">
                                            <div class="new_candidate_box">
                                                <a href="{{ route('candidate.detail', $row->slug) }}" class="">
                                                    @if ($row->user->avatar != null)
                                                        <img src="{{ asset('public/storage/' . $row->user->avatar) }}"
                                                            alt="profile-img" class="profile img-fluid">
                                                        {{-- <img src="{{ asset('images/profile-img.png') }}" alt="profile-img" class="profile img-fluid"> --}}
                                                    @else
                                                        <img src="{{ asset('images/profile-img.png') }}"
                                                            alt="profile-img" class="profile img-fluid">
                                                    @endif
                                                </a>
                                                {{-- <img src="https://check.hostingladz.com/webapp/Erec/storage/jobPosts/img/2022-11-23_.45.571428571429_.jpg" alt="candidate profile" class="profile img-fluid"> --}}
                                                <div class="content">
                                                    <div class="user__info">
                                                        <h3 class="title shortName">
                                                            <a href="{{ route('candidate.detail', $row->slug) }}"
                                                                class="">{{ $row->first_name }}
                                                                {{ $row->last_name }}</a>
                                                        </h3>
                                                        <p class="designation">
                                                            @if (isset($row->user->candidatePro) && count($row->user->candidatePro) > 0)
                                                                {{-- {{ $row->user->candidatePro[0]->designation }} --}}
                                                                {{ \Illuminate\Support\Str::limit($row->user->candidatePro[0]->designation, 20, $end = '...') }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <a href="{{ route('candidate.detail', $row->slug) }}"
                                                            class="d-flex aling-items-center button">
                                                            <span>
                                                                View Profile
                                                            </span>
                                                            <span>
                                                                <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg"
                                                                    width="16.997" height="9.916"
                                                                    viewBox="0 0 16.997 9.916">
                                                                    <path id="Path_3242" data-name="Path 3242"
                                                                        d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                                        transform="translate(6.831 -10.123)"
                                                                        fill="#007ba7" fill-rule="evenodd" />
                                                                    <path id="Path_3243" data-name="Path 3243"
                                                                        d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                                        transform="translate(-5.625 -12.625)"
                                                                        fill="#007ba7" fill-rule="evenodd" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        @if (auth()->check())
                                                            @if (auth()->user()->role == 'company' || auth()->user()->role == 'rec')
                                                                <open-box :openBoxFunction="openBox"
                                                                    :id="{{ $row->user->id }}"></open-box>
                                                                {{-- <a href="{{ route('candidate.company.chat', $row->slug) }}"
                                  class="d-flex aling-items-center button">
                                  <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95"
                                      viewBox="0 0 14.95 14.95">
                                      <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                                        d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                                        transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" />
                                    </svg>
                                  </span>
                                  <span>
                                    Message
                                  </span>
                                </a> --}}
                                                                {{-- @elseif (auth()->user()->role == 'rec')
                                <a href="{{ route('candidate.recruiter.chat', $row->slug) }}"
                                  class="d-flex aling-items-center button">
                                  <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95"
                                      viewBox="0 0 14.95 14.95">
                                      <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                                        d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                                        transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" />
                                    </svg>
                                  </span>
                                  <span>
                                    Message
                                  </span>
                                </a> --}}
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Candidate not found</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center pt-5">
                                {{ $cand->appends(request()->except(['page', '_token']))->links() }}
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
                url: "{{ route('searchCandidate') }}",
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
                if (data['can'].length == 0) {
                    $("#search-title-search").html("No Record Found");
                } else {
                    $.each(data['can'], function(index, value) {
                        html +=
                            "<a class='d-block border-bottom py-2 fs-14' href='{{ route('candidate.detail', '') }}/" +
                            value['slug'] +
                            "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")'>" +
                            value['first_name'] + ' ' + value['last_name'] + "</a>";
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
