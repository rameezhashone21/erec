@extends('layouts.app')

@section('content')

<main>
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center py-lg-5 py-3">
                <div class="col">
                    <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5">Candidate Job Applications </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <form action="" class="row row-cols-1 search-area mb-3 py-4 px-3 position-relative">
                        <div class="col">
                            <input type="text" class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                placeholder="Enter Search Here">
                            <img src="{{ asset('images/icon-search.svg') }}" alt="icon-search"
                                class="img-fluid position-absolute">
                        </div>
                        <div class="col">
                            <input type="text" class="w-100 fs-14 bg-theme-secondary text-dark h-50px"
                                placeholder="Enter Locations Here">
                            <img src="{{ asset('images/icon-location.svg') }}" alt="icon-location"
                                class="img-fluid position-absolute">
                        </div>
                    </form>

                    <div class="search-area mb-3 py-3 px-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-18 text-theme-primary fw-bold mb-0">Designation</h2>
                            <a href="javascript:void(0)">
                                <img src="{{ asset('images/plus-circle-black.svg') }}" alt="plus-circle-black"
                                    class="img-fluid" data-bs-toggle="collapse" href="#Designation" role="button"
                                    aria-expanded="false" aria-controls="Designation">
                            </a>
                        </div>
                        <div class="collapse" id="Designation">
                            <div class="card card-body border-0  rounded-0">
                                <ul>
                                    <li
                                        class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-pill" type="checkbox"
                                                name="flexRadioDefault" id="d1">
                                            <label class="form-check-label" for="d1">
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
                                                name="flexRadioDefault" id="d2">
                                            <label class="form-check-label" for="d3">
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
                                                name="flexRadioDefault" id="d4">
                                            <label class="form-check-label" for="d3">
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
                    </div>

                    <div class="search-area mb-3 py-3 px-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center ">
                            <h2 class="fs-18 text-theme-primary fw-bold mb-0">Job Type</h2>
                            <a href="javascript:void(0)">
                                <img src="{{ asset('images/plus-circle-black.svg') }}" alt="plus-circle-black"
                                    class="img-fluid" data-bs-toggle="collapse" href="#JobType" role="button"
                                    aria-expanded="false" aria-controls="JobType">
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
                    </div>

                    <div class="search-area mb-3 py-3 px-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-18 text-theme-primary fw-bold mb-0">Experience Level</h2>
                            <a href="javascript:void(0)">
                                <img src="{{ asset('images/plus-circle-black.svg') }}" alt="plus-circle-black"
                                    class="img-fluid" data-bs-toggle="collapse" href="#Experience" role="button"
                                    aria-expanded="false" aria-controls="Experience">
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
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="d-lg-flex justify-content-between align-items-center py-2 mb-3 px-2">
                        <h3 class="mb-0 fs-5 fw-bold">Showing 1-10 Of {{ count($app) }} Jobs</h3>
                        <form action="" class="row">
                            <div class="col">
                                <div class="row row-cols-1 row-cols-lg-3">
                                    <div class="col">
                                        <label for="" class="fs-5 fw-bold">Sort By</label>
                                    </div>
                                    <div class="col px-lg-0">
                                        <select id="role" class="form-select fs-14  h-50px bg-theme-secondary">
                                            <option selected="" value="">Most Recent</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col pe-lg-0">
                                        <select id="role" class="form-select fs-14  h-50px bg-theme-secondary">
                                            <option selected="">10 Per Page</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (count($app) != 0)
                    @foreach ($app as $row)
                    <div class="card horizontal-view py-3 mb-3">
                        <div class="card-body row align-items-center">
                            <div class="col-lg-2">
                                @if ($row->user->avatar != null)
                                <img src="{{ asset('public/storage/' . $row->user->avatar) }}" alt="profile-img"
                                    width="100" height="100" style="border-radius: 100px;">
                                @else
                                <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img"
                                    class="candidate_profile_picture">
                                @endif
                            </div>


                            <div class="col-lg-7">
                                <div class="details">
                                    <span class="title fw-bold text-theme-primary">{{ $row->title }}</span>
                                    <ul>
                                        <li class="d-lg-flex pt-3">
                                            <div>Name </div>
                                            <div class="">{{ $row->user->name }}</div>
                                        </li>
                                        <li class="d-lg-flex">
                                            <div>Job Type </div>
                                            <div class="">{{ $row->job_type }}</div>
                                        </li>
                                        <li class="d-lg-flex">
                                            <div>Skills </div>
                                            <div class="fs-14 d-flex flex-wrap" style="gap: 14px 10px">
                                                @foreach ($row->user->skills as $item)
                                                <span id="pointer-alt">{{ $item->name }}</span>
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="d-lg-flex">
                                            <div>Experience </div>
                                            <div class="">{{ $row->experience }}</div>
                                        </li>
                                        <li class="d-lg-flex">
                                            <div>Location </div>
                                            <div class="">{{ $row->location }} </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="btns d-flex flex-column">
                                    <button class="btn default-btn mb-3">Hire Now</button>
                                    <a class="btn default-btn-2"
                                        href="{{ asset('public/candidateDoc/doc/' . $row->resume->document) }}"
                                        target="_blank">View Resume</a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#"><img src="{{ asset('images/share.svg ') }}" alt=""
                                                class="img-fluid"></a>
                                        {{-- sasa --}}
                                        <a href="mailto:{{ $row->user->email }}"><img
                                                src="{{ asset('images/mail.svg ') }}" alt="" class="img-fluid"></a>

                                        <a href="#"><img src="{{ asset('images/wishlist.svg ') }}" alt=""
                                                class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h3>No Applications Found</h3>
                    @endif

                </div>
            </div>
        </div>
    </section>

</main>

@endsection