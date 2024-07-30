@extends('layouts.app')

@section('content')
    <main>
        <section>
            <form action="{{ route('job.browse') }}">
                <div class="container pt-5 mt-4">
                    <h1 class="fs-48 text-center fw-bold text-uppercase my-md-5 pb-3 pb-md-0"> Browse Jobs </h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-5">
                            @if (Auth::check())
                                @if (auth()->user()->role != 'admin')
                                    @if (auth()->user()->role === 'company')
                                        <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    @elseif(auth()->user()->role === 'rec')
                                        <a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    @elseif(auth()->user()->role === 'user')
                                        <a href="{{ route('candidate.dashboard') }}" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    @endif
                                @endif
                            @endif
                            <div class="row row-cols-1 d-block form__search__box search-area mb-3 py-4" id="search_job">
                                <div class="col ">
                                    <div class="position-relative">
                                        <input type="text" name="search" id="search-title" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                            {{-- onchange="form.submit()" --}} placeholder="Enter Job Title Here"
                                            value="{{ $search }}">
                                        <img src="{{ asset('images/icon-search.svg') }}" alt=""
                                            class="img-fluid position-absolute">
                                        <div id="search-title-search"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="position-relative">
                                        <input type="text" name="search_location" id="search-location" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px" {{-- onchange="form.submit()" --}}
                                            placeholder="Enter Location Here" value="{{ $search_location }}">
                                        <img src="{{ asset('images/icon-location.svg') }}" alt="icon-location"
                                            class="img-fluid position-absolute">
                                        <div id="search-title-location"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-location-hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" name="company" id="search-company" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                            {{-- onchange="form.submit()" --}} placeholder="Enter Employer Here"
                                            value="{{ $comp }}">
                                        <img src="{{ asset('images/icon-search.svg') }}" alt=""
                                            class="img-fluid position-absolute">

                                        <div id="search-title-select"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-select-hide">
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <h2 class="fs-18  mb-0">Job Type</h2>
                                        <a data-bs-toggle="collapse" href="#JobType" role="button"
                                            aria-expanded=" @if (count($job_type) > 0) true @else false @endif"
                                            aria-controls="JobType" id="collapseButtonOne" class="">
                                            {{-- class=" @if (count($job_type) <= 0) collapsed @endif "> --}}
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse show @if (count($job_type) > 0) show @endif" id="JobType">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Full Time" name="job_type[]" id="job_type"
                                                            @foreach ($job_type as $row) @if ($row == 'Full Time') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type">
                                                            Full Time
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Part Time" name="job_type[]" id="job_type1"
                                                            @foreach ($job_type as $row) @if ($row == 'Part Time') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type1">
                                                            Part Time
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Contract" name="job_type[]" id="job_type2"
                                                            @foreach ($job_type as $row) @if ($row == 'Contract') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type2">
                                                            Contract
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Casual" name="job_type[]" id="job_type3"
                                                            @foreach ($job_type as $row) @if ($row == 'Casual') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type3">
                                                            Casual
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Graduate" name="job_type[]" id="job_type4"
                                                            @foreach ($job_type as $row) @if ($row == 'Graduate') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type4">
                                                            Graduate
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Trainee" name="job_type[]" id="job_type5"
                                                            @foreach ($job_type as $row) @if ($row == 'Trainee') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type5">
                                                            Trainee
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Apprenticeship" name="job_type[]" id="job_type6"
                                                            @foreach ($job_type as $row) @if ($row == 'Apprenticeship') checked @endif @endforeach>
                                                        <label class="form-check-label" for="job_type6">
                                                            Apprenticeship
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Experience Level</h2>
                                        <a data-bs-toggle="collapse" href="#Experience" role="button"
                                            aria-expanded="@if (count($exp_level) > 0) true @else false @endif"
                                            aria-controls="Experience" id="collapseButtonOne"
                                            class="@if (count($exp_level) <= 0) collapsed @endif">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse @if (count($exp_level) > 0) show @endif" id="Experience">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="6 Months" name="exp_level[]" id="exp_level"
                                                            @foreach ($exp_level as $row) @if ($row == '6 Months') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level">
                                                            6 Months
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="1+ Year" name="exp_level[]" id="exp_level2"
                                                            @foreach ($exp_level as $row) @if ($row == '1+ Year') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level2">
                                                            1+ Year
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="2+ Years" name="exp_level[]" id="exp_level3"
                                                            @foreach ($exp_level as $row) @if ($row == '2+ Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level3">
                                                            2+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="3+ Years" name="exp_level[]" id="exp_level4"
                                                            @foreach ($exp_level as $row) @if ($row == '3+ Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level4">
                                                            3+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="4+ Years" name="exp_level[]" id="exp_level5"
                                                            @foreach ($exp_level as $row) @if ($row == '4+ Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level5">
                                                            4+ Years
                                                        </label>
                                                    </div>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="5+ Years" name="exp_level[]" id="exp_level6"
                                                            @foreach ($exp_level as $row) @if ($row == '5+ Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level6">
                                                            5+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="6+ Years" name="exp_level[]" id="exp_level7"
                                                            @foreach ($exp_level as $row) @if ($row == '6+ Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level7">
                                                            6+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="More than 10 Years" name="exp_level[]" id="exp_level8"
                                                            @foreach ($exp_level as $row) @if ($row == 'More than 10 Years') checked @endif @endforeach>
                                                        <label class="form-check-label" for="exp_level8">
                                                            More than 10 Years
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Job Categories</h2>
                                        <a data-bs-toggle="collapse" href="#job_category" role="button"
                                            aria-expanded="@if (count($jobCategory) > 0) true @else false @endif"
                                            aria-controls="job_category" id="collapseButtonOne"
                                            class="@if (count($jobCategory) <= 0) collapsed @endif">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse @if (count($jobCategory) > 0) show @endif"
                                        id="job_category">
                                        <div class="mt-3">
                                            <ul id="cat-list">
                                                @if ($data != null)
                                                    @foreach ($data as $row)
                                                        <li
                                                            class="d-flex justify-content-between align-items-center    py-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input rounded-pill"
                                                                    type="checkbox" value="{{ $row['class_id'] }}"
                                                                    name="job_cat[]" id="job_cat{{ $row['class_id'] }}"
                                                                    @foreach ($jobCategory as $item) @if ($row['class_id'] == $item) checked @endif @endforeach>

                                                                <label class="form-check-label"
                                                                    for="job_cat{{ $row['class_id'] }}">
                                                                    {{ $row['class_name'] }}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button class="login-btn default-btn btn w-100">
                                    <i class="fas fa-filter"></i> Click here - Filter Search
                                </button>
                                <div class="mt-2 text-end">
                                    <a href="javascript:void(0)" class="fs-14" id="resetButton">Reset<i
                                            class="fas fa-sync ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7">
                            <div class="row align-items-center justify-content-between gy-3 mb-4">
                                <div class="col-lg-4">
                                    <h3 class="view_profile_description fs-16 mb-0">Showing
                                        @if (count($app) > 0)
                                            1-
                                        @endif
                                        {{ count($app) }} Of {{ $app->total() }} Jobs
                                    </h3>
                                </div>
                                <div class="col-lg-7">
                                    <form action="{{ route('job.browse') }}">
                                        @csrf
                                        <div class="d-flex justify-content-lg-end">
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
                                                    <option value="10"
                                                        @if ($pg == 10) selected @endif>
                                                        10
                                                        Per Page</option>
                                                    <option value="25"
                                                        @if ($pg == 25) selected @endif>
                                                        25 Per Page</option>
                                                    <option value="50"
                                                        @if ($pg == 50) selected @endif>
                                                        50 Per Page</option>
                                                    <option value="100"
                                                        @if ($pg == 100) selected @endif>
                                                        100 Per Page</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    @if (count($app) != 0)
                                        @foreach ($app as $row)
                                            <div class="card horizontal-view py-3 mb-3 ps-3">
                                                <div class="card-body row align-items-center justify-content-between">
                                                    <div class="col-lg-7">
                                                        <div class="details">
                                                            <a href="{{ route('job.listing.details', $row->slug) }}">
                                                                <span
                                                                    class="title fw-bold text-theme-primary">{{ $row->post }}</span>
                                                            </a>
                                                            <h6 class="fw-bold text-theme-primary">
                                                                {{-- @if ($row->comp_id != 0) --}}
                                                                @if ($row->company != null)
                                                                    {{ $row->company->name }}
                                                                @endif
                                                            </h6>
                                                            <p class="fs-14">
                                                                {!! \Illuminate\Support\Str::limit($row->description, 150, $end = '...') !!}
                                                            </p>
                                                            <ul>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Job Type </div>
                                                                    <div class="fs-14">{{ $row->job_type }}</div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Experience </div>
                                                                    <div class="fs-14">{{ $row->experience }}</div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Location </div>
                                                                    <div class="fs-14">{{ $row->location }} </div>
                                                                </li>
                                                                @if (count($row->skills) > 0)
                                                                    <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                        <div class="fs-14">Skills </div>
                                                                        <div class="fs-14 d-flex flex-wrap mt-3 mt-sm-0"
                                                                            style="gap: 14px 10px">
                                                                            @foreach ($row->skills as $item)
                                                                                <span>
                                                                                    <span
                                                                                        id="pointer-alt">{{ $item->name }}</span>
                                                                                </span>
                                                                            @endforeach
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 align-self-start mt-3 mt-lg-0">
                                                        <div class="btns d-flex flex-column">
                                                            @if (auth()->check())
                                                                {{-- {{ dd('ok') }} --}}
                                                                @if (auth()->user()->candidate != null)
                                                                    @if (auth()->user()->role == 'user')
                                                                        @if ($row->jobApp == '[]')
                                                                            <a class="btn open-apply-modal default-btn mb-3"
                                                                                id="{{ $row->id }}"
                                                                                href="javascript:;">Apply
                                                                                Now</a>
                                                                        @else
                                                                            <button disabled="" style="opacity: 0.5;"
                                                                                class="btn open-apply-modal default-btn w-100 mb-3"
                                                                                id="18"
                                                                                href="javascript:;">Applied</button>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                                {{-- @elseif (auth()->check() && auth()->user()->role != 'company' && auth()->user()->role != 'rec') --}}
                                                            @else
                                                                <a class="btn default-btn mb-3"
                                                                    href="{{ route('job.session') }}">Apply
                                                                    Now</a>
                                                            @endif
                                                            <div
                                                                class="social-btn-sp d-flex justify-content-between align-items-center">
                                                                {!! Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin() !!}
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mt-3"
                                                                style="gap: 0 20px;">
                                                                {{-- @if ($row->comp_id != 0) --}}
                                                                @if ($row->company != null)
                                                                    <a href="mailto:{{ $row->company->user->email }}"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                @elseif($row->recruiter != null)
                                                                    <a href="mailto:{{ $row->recruiter->user->email }}"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                @endif
                                                                @if (Auth::check())
                                                                    @if (isset(auth()->user()->candidate))
                                                                        @if (isset(auth()->user()->wishlist($row->id)->post_id))
                                                                            <div class="wishlist_box-{{ $row->id }}">
                                                                                <a href=""
                                                                                    class="icons__box active"
                                                                                    onclick="wishlist_post({{ $row->id }})">
                                                                                    <i class="fas fa-heart "></i>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="wishlist_box-{{ $row->id }}">
                                                                                <a href="" class="icons__box"
                                                                                    onclick="wishlist_post({{ $row->id }})">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <a href="{{ route('login') }}" class="icons__box"><i
                                                                            class="fas fa-heart"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3>No Records Found</h3>
                                    @endif
                                    <div class="d-flex justify-content-center pt-5">
                                        {{ $app->appends(request()->except(['page', '_token']))->links() }}
                                    </div>
                                    {{-- {{ dd($appRecommend->toArray()) }} --}}
                                    @if (count($appRecommend) != 0)
                                        <h3>Recommended Jobs For You</h3>
                                        @foreach ($appRecommend as $row)
                                            <div class="card horizontal-view py-3 mb-3 ps-3">
                                                <div class="card-body row align-items-center justify-content-between">
                                                    <div class="col-lg-7">
                                                        <div class="details">
                                                            <a href="{{ route('job.listing.details', $row->slug) }}">
                                                                <span
                                                                    class="title fw-bold text-theme-primary">{{ $row->post }}</span>
                                                            </a>
                                                            <h6 class="fw-bold text-theme-primary">
                                                                {{-- {{ dd($row->company) }} --}}
                                                                @if ($row->company != null)
                                                                    {{ $row->company->name }}
                                                                @endif
                                                            </h6>
                                                            <p class="fs-14">
                                                                {!! \Illuminate\Support\Str::limit($row->description, 150, $end = '...') !!}
                                                            </p>
                                                            <ul>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Job Type </div>
                                                                    <div class="fs-14">{{ $row->job_type }}</div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Experience </div>
                                                                    <div class="fs-14">{{ $row->experience }}</div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Location </div>
                                                                    <div class="fs-14">{{ $row->location }} </div>
                                                                </li>
                                                                @if (count($row->skills) > 0)
                                                                    <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                        <div class="fs-14">Skills </div>
                                                                        <div class="fs-14 d-flex flex-wrap mt-3 mt-sm-0"
                                                                            style="gap: 14px 10px">
                                                                            @foreach ($row->skills as $item)
                                                                                <span>
                                                                                    <span
                                                                                        id="pointer-alt">{{ $item->name }}</span>
                                                                                </span>
                                                                            @endforeach
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 align-self-start mt-3 mt-lg-0">
                                                        <div class="btns d-flex flex-column">
                                                            @if (auth()->check())
                                                                {{-- {{ dd('ok') }} --}}
                                                                @if (auth()->user()->candidate != null)
                                                                    @if (auth()->user()->role == 'user')
                                                                        @if ($row->jobApp == '[]')
                                                                            <a class="btn open-apply-modal default-btn mb-3"
                                                                                id="{{ $row->id }}"
                                                                                href="javascript:;">Apply
                                                                                Now</a>
                                                                        @else
                                                                            <button disabled="" style="opacity: 0.5;"
                                                                                class="btn open-apply-modal default-btn w-100 mb-3"
                                                                                id="18"
                                                                                href="javascript:;">Applied</button>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                                {{-- @elseif (auth()->check() && auth()->user()->role != 'company' && auth()->user()->role != 'rec') --}}
                                                            @else
                                                                <a class="btn default-btn mb-3"
                                                                    href="{{ route('job.session') }}">Apply
                                                                    Now</a>
                                                            @endif
                                                            <div
                                                                class="social-btn-sp d-flex justify-content-between align-items-center">
                                                                {!! Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin() !!}
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mt-3"
                                                                style="gap: 0 20px;">
                                                                @if ($row->company != null)
                                                                    <a href="mailto:{{ $row->company->user->email }}"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                @elseif ($row->recruiter != null)
                                                                    <a href="mailto:{{ $row->recruiter->user->email }}"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                @endif
                                                                @if (Auth::check())
                                                                    @if (isset(auth()->user()->candidate))
                                                                        @if (isset(auth()->user()->wishlist($row->id)->post_id))
                                                                            <div class="wishlist_box-{{ $row->id }}">
                                                                                <a href=""
                                                                                    class="icons__box active"
                                                                                    onclick="wishlist_post({{ $row->id }})">
                                                                                    <i class="fas fa-heart "></i>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="wishlist_box-{{ $row->id }}">
                                                                                <a href="" class="icons__box"
                                                                                    onclick="wishlist_post({{ $row->id }})">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <a href="{{ route('login') }}" class="icons__box"><i
                                                                            class="fas fa-heart"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
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

        function fitTextLoc(id) {
            var value = $("#para-" + id).html();
            console.log(value);
            $("#search-location").val(value);
        }

        function fitText(id) {
            var value = $("#para-" + id).html();
            console.log(value);
            $("#search-company").val(value);
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
                url: "{{ route('search.title') }}",
                data: {
                    value: $('#search-title').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-search").removeClass('d-none');
                $("#search-title-search").html('');
                html = '';
                if (data['title'].length == 0) {
                    $("#search-title-search").html("No Record Found");
                } else {
                    $.each(data['title'], function(index, value) {
                        html +=
                            "<a class='d-block border-bottom py-2 fs-14' href='{{ route('job.listing.details', '') }}/" +
                            value['slug'] +
                            "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")'>" +
                            value['post'] + "</a>";
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

        const searchLogic2 = function() {

            $("#search-title-location").append("");

            formData = {
                value: $(this).val(),
            }
            // console.log(formData);
            $("#search-title-search").addClass('d-none');
            $("#search-title-select").addClass('d-none');
            $.ajax({
                type: "GET",
                url: "{{ route('search.location') }}",
                data: {
                    value: $('#search-location').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-location").removeClass('d-none');
                $("#search-title-location").html('');
                html = '';
                if (data['location'].length == 0) {
                    $("#search-title-location").html("Invalid Location");
                } else {
                    $.each(data['location'], function(index, value) {
                        html += "<p class='d-block border-bottom py-2 fs-14 mb-0' id='para-" + value[
                                'id'] +
                            "' onclick='fitTextLoc(" + value['id'] +
                            ")'>" +
                            value['location'] + "</p>";
                    });
                }
                if ($("#search-location").val().length == 0) {
                    $("#search-title-location").addClass('d-none');
                }
                $("#search-title-location").append(html);
                this.value = "";
            });
        }
        const getInterval2 = setInterval(() => {
            if ($('#search-location').length) {
                $('#search-location').unbind("keydown", searchLogic2);
                $('#search-location').on("keydown", searchLogic2);
            }
        }, 1000);

        const searchLogic3 = function() {

            $("#search-title-select").append("");

            formData = {
                value: $(this).val(),
            }
            // console.log(formData);
            $("#search-title-search").addClass('d-none');
            $("#search-title-location").addClass('d-none');
            $.ajax({
                type: "GET",
                url: "{{ route('search.company') }}",
                data: {
                    value: $('#search-company').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-select").removeClass('d-none');
                $("#search-title-select").html('');
                html = '';
                if (data['comp'].length == 0) {
                    $("#search-title-select").html("No Employer Found");
                } else {
                    $.each(data['comp'], function(index, value) {
                        html += "<p class='d-block border-bottom py-2 fs-14 mb-0' id='para-" + value[
                                'id'] +
                            "' onclick='fitText(" + value['id'] + ")'>" +
                            value['name'] + "</p>";
                    });
                    if ($("#search-company").val().length == 0) {
                        $("#search-title-select").addClass('d-none');
                    }
                }
                $("#search-title-select").append(html);
                this.value = "";
            });
        }
        const getInterval3 = setInterval(() => {
            if ($('#search-company').length) {
                $('#search-company').unbind("keydown", searchLogic3);
                $('#search-company').on("keydown", searchLogic3);
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
        $(function() {
            $("#search-location-hide").on("click", function(a) {
                // $("#search-title-search").addClass("d-none");
                a.stopPropagation()
            });
            $(document).on("click", function(a) {
                if ($(a.target).is("#search-title-location") === false) {
                    $("#search-title-location").addClass("d-none");
                }
            });
        });
        $(function() {
            $("#search-select-hide").on("click", function(a) {
                // $("#search-title-search").addClass("d-none");
                a.stopPropagation()
            });
            $(document).on("click", function(a) {
                if ($(a.target).is("#search-title-select") === false) {
                    $("#search-title-select").addClass("d-none");
                }
            });
        });
    </script>
@endsection
