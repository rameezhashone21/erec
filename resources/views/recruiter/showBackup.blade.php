@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center  py-lg-5 py-3 mt-5">
                    <div class="col-lg-8">
                        <div class="row pb-lg-5 pb-3">
                            <div class="col-lg-2">
                                @if (isset($rec->avatar))
                                    <img src="{{ asset('public/storage/' . $rec->avatar) }}" alt="profile-img" class="img-fluid"
                                        width="128" height="128">
                                @else
                                    <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img" class="img-fluid"
                                        width="128" height="128">
                                @endif
                                {{-- <img src="{{ asset('images/company.svg') }}" alt="company" class="img-fluid"> --}}
                            </div>
                            <div class="col-lg-9 details">
                                <span class="title text-theme-primary fw-bold">{{ $rec->name }}</span>
                                <p class="fs-14 mb-0 pt-1">
                                    {{-- IT , Customer Service / Call Center , Sales , Accounts, Telecommunications --}}
                                    @foreach ($rec->features as $key => $skill)
                                        @if ($key < 3)
                                            {{ $skill->name }}
                                            @if ($key < 2)
                                                ,
                                            @endif
                                        @endif
                                    @endforeach
                                </p>
                                {{-- <div class="rate">
                                <div class="rating">
                                    <a href="#" class="ps-2 text-decoration-underline fs-12">4 Reviews</a>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <span class="fs-17 fw-600 pe-2">4.0</span>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        @if ($rec->description != null)
                            <h4 class="fs-18 fw-600 pb-lg-4 pb-3">About</h4>
                            <p class="fs-14 text-secondary pb-3">{{ $rec->description }}</p>
                        @endif

                        @if (count($rec->features) > 0)
                            <h4 class="fs-18 fw-600 pb-lg-4 pb-3">Our Expertise</h4>

                            <div class="row row-cols-1 row-cols-lg-3 services">
                                @foreach ($rec->features as $skill)
                                    <div class="col">
                                        <div class="card shadow">
                                            <div class="card-body ps-lg-5 py-4 ">
                                                {{ $skill->name }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="search-area mb-3 p-4 mb-3">
                            <h2 class="fs-5 text-dark fw-bold pb-3">Other Recruiters</h2>
                            <ul>
                                @foreach ($similar as $row)
                                    <li class="d-flex justify-content-between align-items-center pb-4">
                                        {{-- <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid"> --}}
                                        @if (isset($row->avatar))
                                            <img src="{{ asset('public/storage/' . $row->avatar) }}" alt="profile-img"
                                                class="profile_thumb me-2 rounded-50" width="128" height="128">
                                        @else
                                            <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img"
                                                class="profile_thumb me-2 rounded-50" width="128" height="128">
                                        @endif
                                        <div class="text-center">
                                            <p class="mb-0 fw-bold"> {{ $row->name }}</p>
                                            {{-- <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p> --}}
                                        </div>
                                        <a href="{{ route('recruiter.detail', $row->slug) }}"
                                            class="btn default-btn ">View</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @if (count($rec->features) > 0)
                            <h3 class="mb-0 fs-3 fw-bold px-2 py-5 text-theme-primary ">Similar Jobs</h3>
                            @foreach ($jobs as $row)
                                {{-- <div class="card horizontal-view py-3 mb-3">
                                    <div class="card-body row justify-content-between">
                                        <div class="col-lg-2">
                                        <img src="{{ asset('images/bag.svg') }}" alt="profile-img" class="img-fluid"
                                            width="128" height="128">
                                    </div>
                                        <div class="col-lg-7">
                                            <div class="details">
                                                <span class="title fw-bold text-theme-primary">{{ $row->post }}</span>
                                                <ul>
                                                    <li class="d-lg-flex pt-3">
                                                        <div>Company </div>
                                                        <div class="">{{ $row->company->name }}</div>
                                                    </li>
                                                    <li class="d-lg-flex">
                                                        <div>Job Type </div>
                                                        <div class="">{{ $row->job_type }}</div>
                                                    </li>
                                                    <li class="d-lg-flex">
                                                        <div>Experience </div>
                                                        <div class="">{{ $row->experience }}</div>
                                                    </li>
                                                    <li class="d-lg-flex">
                                                        <div>Location </div>
                                                        <div class="">{{ $row->location }}</div>
                                                    </li>
                                                    <li class="d-lg-flex d-md-flex">
                                                        <div class="fs-14">Skills </div>
                                                        <div class="fs-14 d-flex flex-wrap" style="gap: 14px 10px">
                                                            @foreach ($row->skills as $item)
                                                                <span class="">
                                                                    <span id="pointer-alt">{{ $item->name }}</span>
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="btns d-flex flex-column align-items-end">
                                                <a href="{{ route('job.listing.details', $row->id) }}"
                                                    class="btn default-btn mb-3">View Details</a>
                                                <button class="btn default-btn-2">View Resume</button>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="#"><img src="{{ asset('images/share.svg') }}"
                                                            alt="" class="img-fluid"></a>
                                                    <a href="#"><img src="{{ asset('images/mail.svg') }}"
                                                            alt="" class="img-fluid"></a>
                                                    <a href="#"><img src="{{ asset('images/wishlist.svg') }}"
                                                            alt="" class="img-fluid"></a>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div> --}}
                                <div class="card horizontal-view py-3 mb-3 ps-3">
                                    <div class="card-body row align-items-center justify-content-between">
                                        {{-- <div class="col-lg-2">
                                        @if ($row->company->logo != null)
                                            <img src="{{ asset('public/storage/' . $row->banner) }}" alt="profile-img" width="100" height="100" style="border-radius: 100px;">
                                        @else
                                            <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img" class="candidate_profile_picture">
                                        @endif
                                        </div> --}}
                                        <div class="col-lg-7">
                                            <div class="details">
                                                <a href="{{ route('job.listing.details', $row->slug) }}">
                                                    <span
                                                        class="title fw-bold text-theme-primary">{{ $row->post }}</span>
                                                </a>
                                                <h6 class="fw-bold text-theme-primary">
                                                    @if ($row->comp_id != 0)
                                                        {{ $row->company->name }}
                                                    @endif
                                                </h6>
                                                <p style="font-size: 16px;">
                                                    {!! \Illuminate\Support\Str::limit($row->description, 150, $end = '...') !!}
                                                </p>
                                                <ul>
                                                    {{-- <input type="hidden" value="$row->id" name="post_id"> 
                                                    <li class="d-lg-flex d-md-flex">
                                                        <h6 class="fw-bold text-theme-primary">{{ $row->company->name }}</h6>
                                                         <div class="fs-14">{{ $row->company->name }}</div> 
                                                    </li> --}}
                                                    <li class="d-lg-flex d-md-flex">
                                                        <div class="fs-14">Job Type </div>
                                                        <div class="fs-14">{{ $row->job_type }}</div>
                                                    </li>
                                                    <li class="d-lg-flex d-md-flex">
                                                        <div class="fs-14">Experience </div>
                                                        <div class="fs-14">{{ $row->experience }}</div>
                                                    </li>
                                                    <li class="d-lg-flex d-md-flex">
                                                        <div class="fs-14">Location </div>
                                                        <div class="fs-14">{{ $row->location }} </div>
                                                    </li>
                                                    <li class="d-lg-flex d-md-flex">
                                                        <div class="fs-14">Skills </div>
                                                        <div class="fs-14 d-flex flex-wrap"
                                                            style="gap: 14px 10px">
                                                            @foreach ($row->skills as $item)
                                                                <span>
                                                                    <span
                                                                        id="pointer-alt">{{ $item->name }}</span>
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 align-self-start">
                                            <div class="btns d-flex flex-column">
                                                @if (auth()->check() && auth()->user()->candidate != null)
                                                    @if (auth()->user()->role == 'user')
                                                        @if ($row->jobApp == '[]')
                                                            <a class="btn open-apply-modal default-btn mb-3"
                                                                id="{{ $row->id }}"
                                                                href="javascript:;">Apply Now</a>
                                                        @else
                                                            {{-- <p>{{ $row->jobApp }}</p> --}}
                                                            <p></p>
                                                            <button disabled style="opacity: 0.5; pointer-event: none;" class="btn open-apply-modal default-btn mb-3"
                                                                id="{{ $row->id }}"
                                                                href="javascript:;">Applied</button>
                                                        @endif
                                                    @endif
                                                @elseif (auth()->user()->role == 'company' && auth()->user()->role == 'rec')
                                                    <a class="btn default-btn mb-3"
                                                        href="{{ route('login') }}">Apply Now</a>
                                                @endif
                                                <div class="d-flex justify-content-around align-items-center">
                                                    @if ($row->comp_id != 0)
                                                        <a href="mailto:{{ $row->company->user->email }}">
                                                            <img src="{{ asset('images/mail.svg ') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    @endif
                                                    <a href="#">
                                                        <img src="{{ asset('images/wishlist.svg ') }}"
                                                            alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div
                                                    class="social-btn-sp d-flex justify-content-between align-items-center mt-3">
                                                    {!! Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (count($jobs) > 4)
                                <p class="text-center mb-0 py-4">
                                    <a href="{{ route('job.browse') }}" class="btn default-btn ">View All</a>
                                </p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
