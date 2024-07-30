@extends('companypanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    {{-- <section> --}}
    <!-- start new box here  -->
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4" id="msg-btn">
            <h2 class="fw-500 text_primary fs-5 mb-4">My Recruiters</h2>
            <div class="row gy-lg-5 gy-4">
                <div class="col-12">
                    <h2 class="fw-500 text_primary fs-5">New</h2>
                </div>
                {{-- {{ dd($rec->toArray()) }} --}}
                @if (count($rec) > 0)
                    @php
                        $checkNull = 0;
                    @endphp
                    @foreach ($rec as $key => $row)
                        @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                            @if ($row->CompRecRelation(auth()->user()->company->id, $row->id)->status != 1)
                                @php
                                    $checkNull = 1;
                                @endphp
                                {{-- <a type="button" class="view_profile_button d-block w-100 text-center"
                                                        disabled>Connected</a> --}}
                                {{-- <a href="{{ route('chat.index', ['user' => 'recruiter', 'slug' => $row->slug]) }}"
                                                            class="view_profile_button d-block w-100 text-center">Chat</a> --}}
                                {{-- @else
                                                        <div class="col">
                                                            <a type="button"
                                                                class="default-btn w-100 text-center btn-disabled"
                                                                disabled>Request Sent
                                                            </a>
                                                        </div> --}}
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="new-recruter-box">
                                        <a href="{{ route('recruiter.detail', $row->slug) }}">
                                            {{-- @if ($row->user->banner != null) --}}
                                            @if ($row->user->banner != null)
                                                <img src="{{ asset('public/storage/' . $row->user->banner) }}"
                                                    alt="profile-img" class="user_banner img-fluid">
                                            @else
                                                <img src="{{ asset('dashboard/images/RecruiterSM.png') }}" alt=""
                                                    class="user_banner img-fluid">
                                            @endif
                                        </a>
                                        <div class="text-center px-3 pb-4">
                                            <a href="{{ route('recruiter.detail', $row->slug) }}">
                                                {{-- @if ($row->avatar != null) --}}
                                                @if ($row->avatar != null)
                                                    <img src="{{ asset('public/storage/' . $row->avatar) }}"
                                                        alt="profile-img" class="user_logo">
                                                @else
                                                    <img src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                                        alt="profile-img" class="user_logo">
                                                @endif
                                            </a>
                                            <h2 class="title"><a href="{{ route('recruiter.detail', $row->slug) }}">{{ $row->name }}</a></h2>
                                            <p class="job_type mb-3">No Open Jobs</p>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                                @if (auth()->user()->role == 'company')
                                                    @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                                                    @else
                                                        <div class="col">
                                                            <a href="{{ route('company.recruiters.send', $row->id) }}"
                                                                class="default-btn w-100 text-center">Connect</a>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col">
                                                        <a href="{{ route('login') }}"
                                                            class="default-btn w-100 text-center">Connect</a>
                                                    </div>
                                                @endif
                                                {{-- </br> --}}
                                                {{-- <div class="col">
                                                    <a href="{{ route('recruiter.detail', $row->slug) }}"
                                                        class="view_profile_button d-block w-100 text-center">Request sent</a>
                                                    </div> --}}
                                                <div class="col">
                                                    <a type="button" class="default-btn w-100 text-center btn-disabled"
                                                        disabled>Request Sent
                                                    </a>
                                                </div>
                                                <div class="col message__button__mt-0">
                                                    <open-box :openBoxFunction="openBox"
                                                        :id="{{ $row->user->id }}"></open-box>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    @if ($checkNull == 0)
                        <div class="">
                            You didn't send any new connection request to the recruiter. <a href="{{ route('recruiter.list') }}">Connect recruiters</a>
                        </div>
                    @endif
                @else
                    <div class="">
                        You didn't send any new connection request to the recruiter. <a href="{{ route('recruiter.list') }}">Connect recruiters</a>
                    </div>
                @endif
            </div>
            <div class="row gy-lg-5 gy-4 mt-4">
                <div class="col-12">
                    <h2 class="fw-500 text_primary fs-5">Connected Recruiters</h2>
                </div>
                @if (count($rec) > 0)
                    @php
                        $checkNullNew = 0;
                    @endphp
                    @foreach ($rec as $key => $row)
                        @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                            @if ($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1)
                                @php
                                    $checkNullNew = 1;
                                @endphp
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="new-recruter-box">
                                        <a href="{{ route('recruiter.detail', $row->slug) }}">
                                            {{-- @if ($row->user->banner != null) --}}
                                            @if ($row->user->banner != null)
                                                <img src="{{ asset('public/storage/' . $row->user->banner) }}"
                                                    alt="profile-img" class="user_banner img-fluid">
                                            @else
                                                <img src="{{ asset('dashboard/images/RecruiterSM.png') }}" alt=""
                                                    class="user_banner img-fluid">
                                            @endif
                                        </a>
                                        <div class="text-center px-3 pb-4">
                                            <a href="{{ route('recruiter.detail', $row->slug) }}">
                                                {{-- @if ($row->avatar != null) --}}
                                                @if ($row->avatar != null)
                                                    <img src="{{ asset('public/storage/' . $row->avatar) }}"
                                                        alt="profile-img" class="user_logo">
                                                @else
                                                    <img src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                                        alt="profile-img" class="user_logo">
                                                @endif
                                            </a>
                                            <h2 class="title">{{ $row->name }}</h2>
                                            <p class="job_type mb-3">No Open Jobs</p>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                                @if (auth()->user()->role == 'company')
                                                    @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                                                        @if ($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1)
                                                            {{-- <a type="button" class="view_profile_button d-block w-100 text-center"
                                                        disabled>Connected</a> --}}
                                                            {{-- <a href="{{ route('chat.index', ['user' => 'recruiter', 'slug' => $row->slug]) }}"
                                                            class="view_profile_button d-block w-100 text-center">Chat</a> --}}
                                                            {{-- @else
                                                        <div class="col">
                                                            <a type="button"
                                                                class="default-btn w-100 text-center btn-disabled"
                                                                disabled>Request Sent
                                                            </a>
                                                        </div> --}}
                                                        @endif
                                                    @else
                                                        <div class="col">
                                                            <a href="{{ route('company.recruiters.send', $row->id) }}"
                                                                class="default-btn w-100 text-center">Connect</a>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col">
                                                        <a href="{{ route('login') }}"
                                                            class="default-btn w-100 text-center">Connect</a>
                                                    </div>
                                                @endif
                                                {{-- </br> --}}
                                                {{-- <div class="col">
                                                    <a href="{{ route('recruiter.detail', $row->slug) }}"
                                                        class="view_profile_button d-block w-100 text-center">View
                                                        Profile</a>
                                                </div> --}}
                                                {{-- <div class="col">
                                                    <a type="button"
                                                        class="default-btn w-100 text-center btn-disabled"
                                                        disabled>Connected
                                                    </a>
                                                </div> --}}
                                                <div class="col">
                                                    <div>
                                                        @if (Auth::check())
                                                            {{-- {{ dd() }} --}}
                                                            @if (auth()->user()->role == 'company')
                                                                @if ($row->CompRecRelation(auth()->user()->company->id, $row->id) != null)
                                                                    @if ($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1)
                                                                        <a href="{{ route('delRelation', [$row->id, auth()->user()->company->id]) }}"
                                                                            class="view_profile_button d-block w-100 text-center">
                                                                            <i class="fas fa-user-plus me-1"></i>
                                                                            Unfollow</a>
                                                                    @endif
                                                                    {{-- @else
                                                                <a href="{{ route('company.recruiters.send', $rec->id) }}" class="btn default-btn text-center"
                                                                    style="padding: 6px 24px, font-size: 14px;"><i class="fas fa-user-plus me-1"></i> Connect</a> --}}
                                                                @endif
                                                                {{-- @else --}}
                                                            @endif
                                                        @endif
                                                    </div>
                                                    {{-- <a href="" class="view_profile_button d-block w-100 text-center">
                                                        <i class="fas fa-user-plus me-1"></i> Unfollow --}}
                                                    </a>
                                                </div>
                                                <div class="col message__button__mt-0">
                                                    <open-box :openBoxFunction="openBox"
                                                        :id="{{ $row->user->id }}"></open-box>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    @if ($checkNullNew == 0)
                        <div class="">
                            No Recruiters are in connection. <a href="{{ route('recruiter.list') }}">Connect recruiters</a>
                        </div>
                    @endif
                @else
                    <div class="">
                        No Recruiters are in connection. <a href="{{ route('recruiter.list') }}">Connect recruiters</a>
                    </div>
                @endif
            </div>
        </div>
        {{-- <div class="row row-cols-xl-3 row-cols-lg-2 gy-lg-5 gy-4">
                <div class="col">
                    <div class="new-recruter-box">
                        <img src="http://127.0.0.1:8000/images/banner-placeholder.png" alt="" class="user_banner img-fluid">
                        <div class="text-center px-3 pb-4">
                            <img src="https://check.hostingladz.com/webapp/Erec/storage/companyLogo/img/2022-09-30_.51.857142857143_.jpg" alt="profile-img" class="user_logo">
                            <h2 class="title">Zeus Schneider</h2>
                            <p class="job_type mb-3">No Open Jobs</p>
                            <div class="d-flex justify-content-center button">
                                <a href="" class="view_profile_button d-block w-100 text-center">Accept</a>
                                <a href="" class="default-btn w-100 text-center">Ignore</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="new-recruter-box">
                        <img src="{{ asset('images/banner-placeholder.png') }}" alt="" class="user_banner img-fluid">
                        <div class="text-center px-3 pb-4">
                            <img src="{{ asset('images/logo-placeholder.png') }}" alt="profile-img" class="user_logo">
                            <h2 class="title">Zeus Schneider</h2>
                            <p class="job_type mb-3">No Open Jobs</p>
                            <div class="d-flex justify-content-center button">
                                <a href="" class="view_profile_button d-block w-100 text-center">Unfollow</a>
                                <a type="button" class="default-btn w-100 text-center btn-disabled" disabled>Connected</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
    </div>
    <!-- end new box here  -->
    {{-- @foreach ($rec as $key => $row)
        <div class="col-md-3 mb-md-5 mb-3">
            <div class="dashboard-card recruiters_box shadow">
                <div class=" d-flex">
                    <div class="first text-center">
                        <img class="recruiters_img" src="{{ asset('public/storage/' . $row->avatar) }} " />
                    </div>
                    <div class="second ml-3">
                        <h5 class="recruiters_title">{{ $row->name }}</h5>
                        @if (count($row->recRelation) != 0)
                            @if ($row->recRelation[0]->com_id == auth()->user()->company->id)
                                @if ($row->recRelation[0]->status == 1)
                                    <p> Connected </p>
                                @else
                                    Request Sent
                                @endif
                            @else
                                <a class="btn btn-primary" style="color: #FFF;"
                                    href="{{ route('company.recruiters.send', $row->id) }}">Add Connect</a>
                            @endif
                        @else
                            <a class="btn btn-primary" style="color: #FFF;"
                                href="{{ route('company.recruiters.send', $row->id) }}">Add Connect</a>
                        @endif
                    </div>
                </div>
            </div>
            comment Area
            <div class="card mb-3 p-3">
                    <div class="row">
                        <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/storage/' . $row->avatar) }}" width="70px" height="70px" style="border-radius: 70px;"/>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ $row->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
            end
            @if (count($row->recRelation) != 0)
                @if ($row->recRelation[0]->com_id == auth()->user()->company->id)
                    @if ($row->recRelation[0]->status == 1)
                        Connected
                    @else
                        Request Sent
                    @endif
                @else
                    <a class="btn btn-primary" style="color: #FFF;"
                        href="{{ route('company.recruiters.send', $row->id) }}">Add Connect</a>
                @endif
            @else
                <a class="btn btn-primary" style="color: #FFF;"
                    href="{{ route('company.recruiters.send', $row->id) }}">Add Connect</a>
            @endif
        </div>
    @endforeach --}}
    {{-- </div>
    </div> --}}
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
