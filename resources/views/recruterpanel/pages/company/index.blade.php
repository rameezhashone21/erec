@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    {{-- <section> --}}
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4" id="msg-btn">
            <h2 class="fw-500 text_primary fs-5 mb-4">My Employers</h2>
            {{-- @if (count($comp) != 0)
            <div class="row row-cols-lg-2 row-cols-md-1 g-3 row-cols-sm-2 row-cols-1">
                @foreach ($comp as $key => $row)
                    <div class="col">
                        <div class="progress_card shadow p-4">
                            <div class="row">
                                <div class="col-md-3 pe-0 text-center">
                                    <img src="{{ asset('storage/' . $row->company->logo) }}" width="70px"
                                        height="70px" style="border-radius: 70px;" />
                                </div>
                                <div class="col-md-9">
                                    <h4 class="mb-2">{{ $row->company->name }}</h4>
                                    <div class="d-flex ">
                                        @if ($row->status == 1)
                                            <button type="button" class="btn btn_viewall me-3" style="opacity: 0.5; pointer-events: none;" disabled>Connected </button>
                                            <button type="button" class="me-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#newModal{{ $row->id }}">Unfollow</button>
                                        @else
                                            <a class="btn btn_viewall me-3" href="{{ route('recruiters.accept', $row->id) }}">Accept</a>
                                            <button type="button" class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#newModal{{ $row->id }}">Ignore</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="newModal{{ $row->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body py-md-4 py-3">
                                    <p class="text-center fs-4" style="font-weight:600;">Are you really want to delete?
                                    </p>
                                </div>
                                <div class="modal-footer border-0 justify-content-center">
                                    <a class="btn btn-danger" id="delete-edu"
                                        href="{{ route('recruiters.reject', $row->id) }}">Yes</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h3>Your are not connected to any company</h3>
            </div>
            @endif --}}
            @if (count($comp) != 0)
                <div class="row gy-lg-5 gy-4">
                    <div class="col-12">
                        <h2 class="fw-500 text_primary fs-5">New</h2>
                    </div>
                    @php
                        $checkNullNew = 0;
                    @endphp
                    @foreach ($comp as $key => $row)
                        {{-- @if (auth()->user()->recruiter->CompRecRelation($row->id, auth()->user()->recruiter->id) != null) --}}
                        @if ($row->status != 1)
                            @php
                                $checkNullNew = 1;
                            @endphp
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="new-recruter-box d-flex flex-column">
                                    {{-- {{ dd($row->company->user->banner) }} --}}
                                    @if (isset($row->company->user->banner))
                                        <img src="{{ asset('storage/' . $row->company->user->banner) }}"
                                            alt="profile-img" class="user_banner img-fluid">
                                    @else
                                        <img src="{{ asset('dashboard/images/Company.png') }}" alt=""
                                            class="user_banner img-fluid">
                                    @endif
                                    @if ($row->company->logo != null)
                                        <img src="{{ isset($row->company->logo) ? asset('storage/' . $row->company->logo) : asset('images/profile-img.png') }}"
                                            alt="profile-img" class="user_logo">
                                    @else
                                        <img src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="profile-img"
                                            class="user_logo">
                                    @endif
                                    <div class="text-center px-3 pb-4 my-auto">
                                        <h2 class="title">
                                            <a href="{{ route('job.details', $row->company->slug) }}">
                                                {{ $row->company->name }}
                                            </a>
                                        </h2>
                                        <p class="job_type mb-3">{{ $row->company->type }}</p>
                                        {{-- <p class="job_type mb-3">No Open Jobs</p> --}}
                                        @php
                                            $posted_jobs = App\Models\Posts::where('status', 1)
                                                ->where('comp_id', $row->company->id)
                                                ->where('expiry_date', '>=', \Carbon\Carbon::today())
                                                ->count();

                                        @endphp
                                        @if ($posted_jobs > 0)
                                            <p class="job_type">
                                                Open Jobs - ({{ $posted_jobs }})
                                            </p>
                                        @else
                                            {{-- <p class="job_type" style="height: 26px;"></p> --}}
                                            <p class="job_type">No Open Jobs</p>
                                        @endif
                                        @if ($row->sender != 'rec')
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                            @else
                                                <div class="row row-cols-12 button gx__0 gy-3">
                                        @endif
                                        {{-- <div class="col">
                                                    <a href="{{ route('job.details', $row->company->slug) }}"
                                                        class="view_profile_button d-block w-100 text-center">View
                                                        Profile</a>
                                                </div> --}}
                                        @if ($row->status == 1)
                                            {{-- <div class="col">
                                                <a href=""
                                                    class="view_profile_button d-block w-100 text-center btn-disabled"
                                                    style="opacity: 0.5; pointer-events: none;">Connected</a>
                                            </div> --}}
                                            <div class="col message__button__mt-0">
                                                <open-box :openBoxFunction="openBox"
                                                    :id="{{ $row->company->user->id }}"></open-box>
                                            </div>
                                            {{-- <div class="col">
                                                 <a href="" class="view_profile_button d-block w-100 text-center"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#newModal{{ $row->id }}">Unfollow</a>
                                            </div> --}}
                                        @else
                                            @if ($row->sender != 'rec')
                                                <div class="col">
                                                    <a href="{{ route('recruiters.accept', $row->id) }}"
                                                        class="view_profile_button d-block w-100 text-center">Accept</a>
                                                </div>
                                                <div class="col">
                                                    <a href="" class="view_profile_button d-block w-100 text-center"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#newModal{{ $row->id }}">Ignore</a>
                                                </div>
                                            @else
                                                <button type="button" class="btn default-btn text-center btn-disabled"
                                                    disabled style="padding: 6px 24px, font-size: 14px;"><i
                                                        class="fas fa-user-plus me-1"></i> Request
                                                    Sent
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="newModal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body py-md-4 py-3">
                                <p class="text-center fs-4" style="font-weight:600;">Are you really want to
                                    delete?
                                </p>
                            </div>
                            <div class="modal-footer border-0 justify-content-center">
                                <a class="btn btn-danger" id="delete-edu"
                                    href="{{ route('recruiters.reject', $row->id) }}">Yes</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- @endif --}}
            @endforeach
            @if ($checkNullNew == 0)
                <div class="">
                    No Recruiters are in connection. <a href="{{ route('recruiter.list') }}">Connect
                        recruiters</a>
                </div>
            @endif
        </div>
        <div class="row gy-lg-5 gy-4 mt-4">
            <div class="col-12">
                <h2 class="fw-500 text_primary fs-5">Connected</h2>
            </div>
            @php
                $checkNullNew = 0;
            @endphp
            @foreach ($comp as $key => $row)
                {{-- @if (auth()->user()->recruiter->CompRecRelation($row->id, auth()->user()->recruiter->id) != null) --}}
                @if ($row->status == 1)
                    @php
                        $checkNullNew = 1;
                    @endphp
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="new-recruter-box d-flex flex-column">
                            {{-- {{ dd($row->company->user->banner) }} --}}
                            @if (isset($row->company->user->banner))
                                <img src="{{ asset('storage/' . $row->company->user->banner) }}" alt="profile-img"
                                    class="user_banner img-fluid">
                            @else
                                <img src="{{ asset('dashboard/images/Company.png') }}" alt=""
                                    class="user_banner img-fluid">
                            @endif
                            @if ($row->company->logo != null)
                                <img src="{{ isset($row->company->logo) ? asset('storage/' . $row->company->logo) : asset('images/profile-img.png') }}"
                                    alt="profile-img" class="user_logo">
                            @else
                                <img src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="profile-img"
                                    class="user_logo">
                            @endif
                            <div class="text-center px-3 pb-4 my-auto">
                                <h2 class="title"><a
                                        href="{{ route('job.details', $row->company->slug) }}">{{ $row->company->name }}</a>
                                </h2>
                                <p class="job_type mb-3">{{ $row->company->type }}</p>
                                {{-- <p class="job_type mb-3">No Open Jobs</p> --}}
                                @php
                                    $posted_jobs = App\Models\Posts::where('status', 1)
                                        ->where('comp_id', $row->company->id)
                                        ->where('expiry_date', '>=', \Carbon\Carbon::today())
                                        ->count();

                                @endphp
                                @if ($posted_jobs > 0)
                                    <p class="job_type">
                                        Open Jobs - ({{ $posted_jobs }})
                                    </p>
                                @else
                                    {{-- <p class="job_type" style="height: 26px;"></p> --}}
                                    <p class="job_type">No Open Jobs</p>
                                @endif
                                <div class="row row-cols-2 button gx__0 gy-3">
                                    <div class="col">
                                        <a href="{{ route('job.details', $row->company->slug) }}"
                                            class="view_profile_button d-block w-100 text-center">View
                                            Profile</a>
                                    </div>
                                    @if ($row->status == 1)
                                        {{-- <div class="col">
                                                <a href=""
                                                    class="view_profile_button d-block w-100 text-center btn-disabled"
                                                    style="opacity: 0.5; pointer-events: none;">Connected</a>
                                            </div> --}}
                                        <div class="col message__button__mt-0">
                                            <open-box :openBoxFunction="openBox"
                                                :id="{{ $row->company->user->id }}"></open-box>
                                        </div>
                                        {{-- <div class="col">
                                                 <a href="" class="view_profile_button d-block w-100 text-center"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#newModal{{ $row->id }}">Unfollow</a>
                                            </div> --}}
                                    @else
                                        <div class="col">
                                            <a href="{{ route('recruiters.accept', $row->id) }}"
                                                class="view_profile_button d-block w-100 text-center">Accept</a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="view_profile_button d-block w-100 text-center"
                                                data-bs-toggle="modal"
                                                data-bs-target="#newModal{{ $row->id }}">Ignore</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="newModal{{ $row->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body py-md-4 py-3">
                                    <p class="text-center fs-4" style="font-weight:600;">Are you really want
                                        to
                                        delete?
                                    </p>
                                </div>
                                <div class="modal-footer border-0 justify-content-center">
                                    <a class="btn btn-danger" id="delete-edu"
                                        href="{{ route('recruiters.reject', $row->id) }}">Yes</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- @endif --}}
            @endforeach
            @if ($checkNullNew == 0)
                <div class="">
                    No Recruiters are in connection. <a href="{{ route('recruiter.list') }}">Connect
                        recruiters</a>
                </div>
            @endif
        </div>
    @else
        <h3>Your are not connected to any Employer</h3>
        @endif
    </div>
    </div>
    {{-- start new UI for companies --}}
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
    {{-- end new UI for companies --}}
    {{-- {{ route('recruiters.reject', $row->id) }} --}}

    {{-- @foreach ($comp as $key => $row)
                        {{ dd($row->company->toArray()) }}
                            <div class="col-md-4">
                                <div class="card mb-3 p-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('storage/'.$row->company->logo) }}" width="70px" height="70px" style="border-radius: 70px;"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="mb-2">{{ $row->company->name }}</h4>
                                                    @if ($row->status == 1)
                                                        Connected
                                                    @else
                                                        <a class="btn btn-primary" style="color: #FFF;" href="{{ route('recruiters.accept',$row->id) }}">Accept</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}


    {{-- <div class="container">
               <div class="row justify-content-center">



                </div>
           </div> --}}
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
