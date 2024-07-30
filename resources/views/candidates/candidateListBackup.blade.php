@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5">Candidates</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 offset-xl-1 col-md-8">
                        <form action="{{ route('candidates.list') }}" method="get"
                            class="row row-cols-1 search-area mb-3 py-4 px-3 d-block">
                            <div class="col position-relative">
                                <input type="text" class="w-100 fs-14 bg-theme-secondary  text-dark h-50px mb-3"
                                    placeholder="Search by Name" name="name" value="{{ $search_word }}">
                                <img src="{{ asset('images/icon-search.svg') }}" alt="icon-search"
                                    class="img-fluid position-absolute">
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
                                    <div class="card card-body border-0  rounded-0">
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
                            <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fs-18 text-theme-primary fw-bold mb-0">Experience</h2>
                                    <a href="javascript:void(0)">
                                        <a data-bs-toggle="collapse" href="#Experience" role="button" aria-expanded="false"
                                            aria-controls="Experience" id="collapseButtonOne" class="collapsed">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                </div>
                                <div class="collapse" id="Experience">
                                    <div class="card card-body border-0  rounded-0">
                                        <ul>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="6 Months"
                                                        type="radio" name="experience" id="jt1">
                                                    <label class="form-check-label" for="jt1">
                                                        6 Months
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="1+ Year"
                                                        type="radio" name="experience" id="jt2">
                                                    <label class="form-check-label" for="jt2">
                                                        1+ Year
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="2+ Years"
                                                        type="radio" name="experience" id="jt3">
                                                    <label class="form-check-label" for="jt3">
                                                        2+ Years
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="3+ Years"
                                                        type="radio" name="experience" id="jt4">
                                                    <label class="form-check-label" for="jt4">
                                                        3+ Years
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="4+ Years"
                                                        type="radio" name="experience" id="jt5">
                                                    <label class="form-check-label" for="jt5">
                                                        4+ Years
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="5+ Years"
                                                        type="radio" name="experience" id="jt6">
                                                    <label class="form-check-label" for="jt6">
                                                        5+ Years
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="6+ Years"
                                                        type="radio" name="experience" id="jt7">
                                                    <label class="form-check-label" for="jt7">
                                                        6+ Years
                                                    </label>
                                                </div>
                                                <span>
                                                </span>
                                            </li>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-pill" value="More than 10 Years"
                                                        type="radio" name="experience" id="jt8">
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
                            <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fs-18 text-theme-primary fw-bold">Skills</h2>
                                    <a href="javascript:void(0)">
                                        <a data-bs-toggle="collapse" href="#Skills" role="button" aria-expanded="false"
                                            aria-controls="Skills" id="collapseButtonOne" class="collapsed">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                </div>
                                <div class="collapse" id="Skills">
                                    <div class="card card-body border-0  rounded-0">
                                        <ul>
                                            @foreach ($skill as $key => $row)
                                                <li
                                                    class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill"
                                                            value="{{ $row->id }}" type="checkbox" name="skill[]"
                                                            id="jt1"
                                                            @foreach ($related as $col)
                                                            @if ($row->id == $col)
                                                                checked=checked
                                                            @endif @endforeach>
                                                        <label class="form-check-label" for="jt1">
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

                            {{-- <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center ">
                                    <h2 class="fs-18 text-theme-primary fw-bold">Job Type</h2>
                                    <a href="javascript:void(0)">
                                        <a data-bs-toggle="collapse" href="#JobType" role="button" aria-expanded="false"
                                        aria-controls="JobType" id="collapseButtonOne" class="collapsed">
                                        <i class="fas fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="collapse" id="JobType">
                                    <div class="card card-body border-0  rounded-0">
                                        <ul>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
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

                            {{-- <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fs-18 text-theme-primary fw-bold">Experience Level</h2>
                                  
                                    <a href="javascript:void(0)">
                                        <a data-bs-toggle="collapse" href="#Experience" role="button" aria-expanded="false"
                                        aria-controls="Experience" id="collapseButtonOne" class="collapsed">
                                        <i class="fas fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="collapse" id="Experience">
                                    <div class="card card-body border-0  rounded-0">
                                        <ul>
                                            <li
                                                class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
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
                            <div class="mb-2">
                                <a href="javascript:void(0)" class="fs-14" id="resetCand"><i
                                        class="fas fa-sync me-2"></i>
                                    Reset</a>
                            </div>

                            <button class="login-btn default-btn btn w-100">
                                <i class="fas fa-filter" aria-hidden="true"></i>
                                Click here-Filter Search
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <h3 class="view_profile_description fs-16 mb-0">Showing 1-{{ $cand->total() }} Of
                                    {{ $count }} Candidates</h3>
                            </div>
                            <div class="col-lg-7">
                                <form action="{{ route('candidates.list') }}" method="get">
                                    <div class="row row-cols-1 row-cols-lg-3 align-items-center">
                                        <div class="col px-lg-0 mb-3 mb-lg-0">
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
                                        <div class="col pe-lg-0">
                                            <select id="role" onchange="this.form.submit()" name="per_page"
                                                class="sort_input form-select">
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
                            <div class="col-lg-11 pe-0 mt-4">
                                @foreach ($cand as $row)
                                    <div class="card horizontal-view py-3 mb-3">
                                        <div class="card-body row align-items-center">
                                            <div class="col-lg-2 text-center">
                                                @if ($row->user->avatar != null)
                                                    <img src="{{ asset('public/storage/' . $row->user->avatar) }}"
                                                        alt="profile-img" class="candidate_profile_picture">
                                                @else
                                                    <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img"
                                                        class="candidate_profile_picture">
                                                @endif
                                                {{-- <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture"> --}}
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="details">
                                                    <span class="title fw-bold text-theme-primary">{{ $row->first_name }}
                                                        {{ $row->last_name }}</span>
                                                    <p>{{ $row->head_line }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="btns d-flex flex-column">
                                                    <a href="{{ route('candidate.detail', $row->slug) }}"
                                                        class="btn default-btn mb-3">View profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture">
                            </div>
                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">Candidate</span>
                                    <p>
                                        5 years experience
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">View profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture">
                            </div>
                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">Candidate</span>
                                    <p>
                                        10 years experience
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">View profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture">
                            </div>
                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">Candidate</span>
                                    <p>
                                        5 years experience
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">View profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture">
                            </div>
                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">Candidate</span>
                                    <p>
                                        2 years experience
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">View profile</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{asset('images/profile-img.svg')}}" alt="profile-img" class="candidate_profile_picture">
                            </div>
                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">Candidate</span>
                                    <p>
                                        5 years experience
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">View profile</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                        {{-- <nav aria-label="Page navigation example" class="pt-5">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
