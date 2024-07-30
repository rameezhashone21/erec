@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <style>
        .user__avatar__admin {
            width: 110px;
            height: 110px;
            background: transparent;
            border: 2px solid #4dc1ba;
            border-radius: 100%;
            padding: 6px;
            object-fit: cover;
        }

        .bg__profile__left {
            border-radius: 10px;
            background: rgba(226, 226, 234, 0.21);
            height: 100%;
        }

        .bg__card__admin {
            border-radius: 9px;
            background-color: #fff;
            box-shadow: 0px 0px 20px rgba(221, 224, 233, 0.03);
        }

        .admin-dashboards-detail span,
        .admin-dashboards-detail p {
            font-size: 14px;
            /* color: #999; */
        }
    </style>
    <div class="dashboard_content rounded_10 p-4" style="background: rgba(226, 226, 234, 0.21);">
        <div>
            <a href="{{ route('admin.companyIndex') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
            @if ($comp->user->banner != null)
                <img src="{{ asset('public/storage/' . $comp->user->banner) }}" alt="" class="job-detail-banner">
            @else
                <img src="{{ asset('dashboard/images/Company.png') }}" alt="" class="job-detail-banner">
            @endif
        </div>
        <div class="admin-dashboards-detail">
            <div class="mb-4 border-bottom bg-white shadow bg-white">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="bg__profile__left text-center p-4">
                            <div class="position-relative">
                                @if ($comp->logo != null)
                                    <img src="{{ asset('public/storage/' . $comp->logo) }}" alt="user avatar"
                                        class="user__avatar__admin">
                                @else
                                    <img class="user__avatar__admin" src="{{ asset('images/profile-img.png') }}"
                                        alt="user dummy avatar">
                                @endif
                                <span class="panel_package_tag">
                                    @if (isset($comp->user->package))
                                        @if ($comp->user->package->name == 'Gold')
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}" alt="">
                                            <span>Gold Member</span>
                                        @elseif ($comp->user->package->name == 'Bronze')
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}" alt="">
                                            <span>Bronze Member</span>
                                        @elseif ($comp->user->package->name == 'Silver')
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}" alt="">
                                            <span>Silver Member</span>
                                        @endif
                                    @endif
                                </span>
                            </div>
                            <h1 class="fs-4 text-capitalize mb-2 text_primary">{{ $comp->name }}</h1>
                            <p class="mb-2">
                                @if ($comp->tagline != null)
                                    {!! $comp->tagline !!}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p class="mb-2">
                                Type:
                                @if ($comp->type != null)
                                    {{ $comp->type }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p class="mb-2">
                                Industry:
                                @if ($comp->industry != null)
                                    {{ $comp->industry }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <div class="d-flex justify-content-center">
                                @if ($comp->facebook != null)
                                    <div class="mr-3">
                                        <a href="{{ $comp->facebook }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.428" height="20"
                                                viewBox="0 0 11.428 20">
                                                <path id="facebook"
                                                    d="M1428,16l-2.741,0c-3.079,0-5.069,1.932-5.069,4.923v2.268h-2.756a.421.421,0,0,0-.431.409v3.288a.419.419,0,0,0,.431.406h2.756v8.3a.419.419,0,0,0,.431.407h3.6a.419.419,0,0,0,.431-.407v-8.3h3.222a.419.419,0,0,0,.431-.406V23.6a.4.4,0,0,0-.126-.289.446.446,0,0,0-.3-.12h-3.223V21.265c0-.925.233-1.395,1.506-1.395H1428a.42.42,0,0,0,.43-.409V16.408A.42.42,0,0,0,1428,16Z"
                                                    transform="translate(-1417 -15.996)" fill="#007ba7" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                                @if ($comp->insta != null)
                                    <div class="mr-3">
                                        <a href="{{ $comp->insta }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20">
                                                <path id="instagram"
                                                    d="M13.333,10A3.335,3.335,0,0,0,10,6.667,3.335,3.335,0,0,0,6.667,10,3.335,3.335,0,0,0,10,13.333,3.335,3.335,0,0,0,13.333,10Zm1.8,0A5.112,5.112,0,0,1,10,15.13,5.112,5.112,0,0,1,4.87,10,5.112,5.112,0,0,1,10,4.87,5.112,5.112,0,0,1,15.13,10Zm1.406-5.338a1.2,1.2,0,1,1-2.044-.846,1.2,1.2,0,0,1,2.044.846ZM10,1.8,9,1.79q-.9-.007-1.374,0t-1.257.039a10.268,10.268,0,0,0-1.341.13A5.175,5.175,0,0,0,4.1,2.2,3.405,3.405,0,0,0,2.2,4.1a5.225,5.225,0,0,0-.241.931,10.268,10.268,0,0,0-.13,1.341q-.032.788-.039,1.257T1.791,9q.007.905.007,1t-.007,1q-.007.905,0,1.374t.039,1.257a10.268,10.268,0,0,0,.13,1.341,5.194,5.194,0,0,0,.241.93,3.405,3.405,0,0,0,1.9,1.9,5.225,5.225,0,0,0,.931.241,10.268,10.268,0,0,0,1.341.13q.788.032,1.257.039t1.374,0l1-.007,1,.007q.905.007,1.374,0t1.257-.039a10.267,10.267,0,0,0,1.341-.13A5.226,5.226,0,0,0,15.9,17.8a3.405,3.405,0,0,0,1.9-1.9,5.225,5.225,0,0,0,.241-.931,10.269,10.269,0,0,0,.13-1.341q.032-.788.039-1.257t0-1.374q-.007-.9-.007-1t.007-1q.007-.905,0-1.374t-.039-1.257a10.268,10.268,0,0,0-.13-1.341A5.125,5.125,0,0,0,17.8,4.1a3.405,3.405,0,0,0-1.9-1.9,5.225,5.225,0,0,0-.931-.241,10.268,10.268,0,0,0-1.341-.13q-.788-.032-1.257-.039T11,1.791L10,1.8ZM20,10q0,2.982-.065,4.128a6.108,6.108,0,0,1-1.614,4.193,6.108,6.108,0,0,1-4.193,1.614Q12.982,20,10,20t-4.128-.065a6.108,6.108,0,0,1-4.193-1.614A6.108,6.108,0,0,1,.065,14.128Q0,12.982,0,10T.065,5.872A6.108,6.108,0,0,1,1.679,1.679,6.108,6.108,0,0,1,5.872.065Q7.018,0,10,0t4.128.065a6.108,6.108,0,0,1,4.193,1.614,6.108,6.108,0,0,1,1.614,4.193Q20,7.018,20,10Z"
                                                    fill="#007ba7" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                                @if ($comp->twitter != null)
                                    <div class="mr-3">
                                        <a href="{{ $comp->twitter }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="17.578"
                                                viewBox="0 0 25 17.578">
                                                <path id="youtube-play"
                                                    d="M9.918,12.226,16.67,8.739,9.918,5.209v7.017ZM12.5.2q2.344,0,4.527.062t3.2.133l1.019.056.237.021A3.1,3.1,0,0,1,21.8.514q.1.021.328.062a1.917,1.917,0,0,1,.4.112q.167.07.391.181a2.614,2.614,0,0,1,.433.272,3.435,3.435,0,0,1,.4.369,2.625,2.625,0,0,1,.216.258,4.75,4.75,0,0,1,.4.816,5.261,5.261,0,0,1,.369,1.409q.112.893.174,1.9T25,7.483V9.939a29.521,29.521,0,0,1-.251,4.046,5.586,5.586,0,0,1-.349,1.388,3.52,3.52,0,0,1-.447.858l-.2.237a3.288,3.288,0,0,1-.4.369,2.379,2.379,0,0,1-.433.265q-.223.1-.391.174a1.994,1.994,0,0,1-.4.112l-.335.062q-.1.02-.321.042t-.23.021q-3.5.265-8.747.265-2.887-.028-5.015-.091t-2.8-.1L4,17.527l-.5-.056a6.532,6.532,0,0,1-.76-.14,4.325,4.325,0,0,1-.712-.293,2.778,2.778,0,0,1-.788-.572,2.625,2.625,0,0,1-.216-.258,4.75,4.75,0,0,1-.4-.816,5.26,5.26,0,0,1-.369-1.409q-.112-.893-.174-1.9T0,10.5V8.041A29.52,29.52,0,0,1,.251,4,5.586,5.586,0,0,1,.6,2.607a3.52,3.52,0,0,1,.447-.858l.2-.237a3.288,3.288,0,0,1,.4-.369A2.733,2.733,0,0,1,2.078.87Q2.3.759,2.469.689a2.011,2.011,0,0,1,.4-.112L3.195.515q.1-.02.321-.042T3.753.452Q7.254.2,12.5.2Z"
                                                    transform="translate(0.001 -0.201)" fill="#007ba7" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                                @if ($comp->linkedIn != null)
                                    <div>
                                        <a href="{{ $comp->linkedIn }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.626"
                                                viewBox="0 0 20 18.626">
                                                <path id="linkedIn"
                                                    d="M1523.428,16a1.834,1.834,0,0,1,1.464.615,2.434,2.434,0,0,1,.57,1.544,2.1,2.1,0,0,1-2.242,2.172h-.024a2.125,2.125,0,0,1-1.613-.627,2.171,2.171,0,0,1-.594-1.546,2.016,2.016,0,0,1,.655-1.55A2.524,2.524,0,0,1,1523.428,16Zm-2.176,6.047h4.276V34.627h-4.276Zm19.738,5.366v7.212h-4.275V27.9a3.766,3.766,0,0,0-.5-2.063,1.832,1.832,0,0,0-1.673-.776,2.077,2.077,0,0,0-1.436.478,2.827,2.827,0,0,0-.776,1.053,1.863,1.863,0,0,0-.1.465c-.016.168-.024.35-.024.543v7.029h-4.3q.028-3.194.029-5.852V24.511c0-.62-.006-1.149-.016-1.585s-.013-.728-.013-.876h4.3v1.782l-.023.051h.023v-.051a5.058,5.058,0,0,1,.513-.688,3.845,3.845,0,0,1,.769-.669,4.235,4.235,0,0,1,1.1-.51,4.963,4.963,0,0,1,1.483-.2,5.652,5.652,0,0,1,1.952.333,3.966,3.966,0,0,1,1.566,1.049,5.023,5.023,0,0,1,1.034,1.764A7.519,7.519,0,0,1,1540.99,27.416Z"
                                                    transform="translate(-1520.99 -16.003)" fill="#007ba7" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h4 class="text_primary fw-bold border-bottom pb-2 pt-4 mb-3">
                            Contact Details
                        </h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex mb-3">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                            viewBox="0 0 19.182 23">
                                            <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                transform="translate(1 1)">
                                                <path id="Path_3207" data-name="Path 3207"
                                                    d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                    transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3208" data-name="Path 3208"
                                                    d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                    transform="translate(-7.159 -4.313)" fill="none" stroke="#92929d"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->headQuarter != null)
                                            {{ $comp->headQuarter }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex mb-3">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="ic_website" transform="translate(0 -0.145)">
                                                <path id="Shape"
                                                    d="M11,22A11,11,0,0,1,3.222,3.222,11,11,0,1,1,18.778,18.778,10.928,10.928,0,0,1,11,22Zm-.962-5.582a17.927,17.927,0,0,0-2.1.229,6.013,6.013,0,0,0,2.1,3.059Zm2,0v3.236a6.192,6.192,0,0,0,2.029-3.011A17.876,17.876,0,0,0,12.038,16.422Zm3.989.693a11.852,11.852,0,0,1-.829,1.849,9.009,9.009,0,0,0,1.982-1.419A11.551,11.551,0,0,0,16.027,17.115Zm-10.053,0a11.6,11.6,0,0,0-1.152.429A9.008,9.008,0,0,0,6.8,18.963,11.942,11.942,0,0,1,5.973,17.115Zm11-5.115a19.453,19.453,0,0,1-.408,3.189,13.053,13.053,0,0,1,1.942.771A9,9,0,0,0,19.945,12ZM2.055,12a9.017,9.017,0,0,0,1.434,3.96,13.072,13.072,0,0,1,1.943-.771A19.456,19.456,0,0,1,5.023,12H2.055Zm9.983,0v2.419a19.6,19.6,0,0,1,2.584.3A17.562,17.562,0,0,0,14.974,12ZM7.026,12a17.452,17.452,0,0,0,.352,2.714,19.784,19.784,0,0,1,2.66-.3V12ZM18.191,5.587a13.484,13.484,0,0,1-1.755.658A18.982,18.982,0,0,1,16.977,10h2.968A8.97,8.97,0,0,0,18.191,5.587ZM14.486,6.7a19.9,19.9,0,0,1-2.448.271V10h2.937A17.031,17.031,0,0,0,14.486,6.7Zm-6.972,0A16.961,16.961,0,0,0,7.026,10h3.011V6.979A19.9,19.9,0,0,1,7.514,6.7ZM3.809,5.587h0A8.97,8.97,0,0,0,2.055,10H5.023a19.052,19.052,0,0,1,.541-3.755,13.588,13.588,0,0,1-1.755-.658Zm6.229-3.293a5.392,5.392,0,0,0-1.874,2.49,18.009,18.009,0,0,0,1.874.192Zm2,.049V4.972a17.882,17.882,0,0,0,1.8-.187A5.558,5.558,0,0,0,12.038,2.343Zm3.16.694a11.487,11.487,0,0,1,.624,1.305c.307-.091.606-.192.887-.3A9.017,9.017,0,0,0,15.2,3.037Zm-8.4,0A9.057,9.057,0,0,0,5.291,4.042c.273.1.572.206.888.3A11.5,11.5,0,0,1,6.8,3.037Z"
                                                    transform="translate(0 0.145)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->website != null)
                                            {{ $comp->website }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex mb-3">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <g id="ic_date" transform="translate(0 0.474)">
                                                <path id="Shape"
                                                    d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,1,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                                    transform="translate(0 -0.474)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->founded != null)
                                            {{ $comp->founded }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="ic_relationship" transform="translate(0 -0.197)">
                                                <path id="Shape"
                                                    d="M11.094,20h-.188a3.06,3.06,0,0,1-2.21-.94L2.03,12.193A7.281,7.281,0,0,1,2.03,2.1,6.84,6.84,0,0,1,11,1.317a6.84,6.84,0,0,1,8.97.787,7.281,7.281,0,0,1,0,10.089L13.3,19.06A3.057,3.057,0,0,1,11.094,20Zm-.14-2h.14a1.076,1.076,0,0,0,.776-.333L18.535,10.8a5.281,5.281,0,0,0,0-7.3,4.843,4.843,0,0,0-6.848-.156,1,1,0,0,1-1.373,0A4.842,4.842,0,0,0,3.466,3.5a5.28,5.28,0,0,0,0,7.3l6.666,6.867a1.076,1.076,0,0,0,.775.333ZM11,14a1,1,0,0,1-1-1V11H8A1,1,0,1,1,8,9h2V7a1,1,0,0,1,2,0V9h2a1,1,0,1,1,0,2H12v2A1,1,0,0,1,11,14Z"
                                                    transform="translate(0 0.197)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->country_code != null)
                                            {{ $comp->country_code }} {{ $comp->phone }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex mb-3">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="ic_Working" transform="translate(0 0.174)">
                                                <g id="Working_at" data-name="Working at">
                                                    <rect id="Rectangle_24" data-name="Rectangle 24" width="24"
                                                        height="24" transform="translate(0 -0.174)" fill="none" />
                                                    <g id="Group_25" data-name="Group 25" transform="translate(1 3)">
                                                        <path id="Combined_Shape" data-name="Combined Shape"
                                                            d="M3,19a3,3,0,0,1-3-3V6A3,3,0,0,1,3,3H6A3,3,0,0,1,9,0h4a3,3,0,0,1,3,3h3a3,3,0,0,1,3,3V16a3,3,0,0,1-3,3Zm16-2a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1h-.5V17Zm-2.5,0V5H5.5V17ZM2,6V16a1,1,0,0,0,1,1h.5V5H3A1,1,0,0,0,2,6ZM14,3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3Z"
                                                            transform="translate(0 -0.174)" fill="#92929d" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->abn != null)
                                            {{ $comp->abn }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex mb-3">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="ic_relationship" transform="translate(0 -0.197)">
                                                <path id="Shape"
                                                    d="M11.094,20h-.188a3.06,3.06,0,0,1-2.21-.94L2.03,12.193A7.281,7.281,0,0,1,2.03,2.1,6.84,6.84,0,0,1,11,1.317a6.84,6.84,0,0,1,8.97.787,7.281,7.281,0,0,1,0,10.089L13.3,19.06A3.057,3.057,0,0,1,11.094,20Zm-.14-2h.14a1.076,1.076,0,0,0,.776-.333L18.535,10.8a5.281,5.281,0,0,0,0-7.3,4.843,4.843,0,0,0-6.848-.156,1,1,0,0,1-1.373,0A4.842,4.842,0,0,0,3.466,3.5a5.28,5.28,0,0,0,0,7.3l6.666,6.867a1.076,1.076,0,0,0,.775.333ZM11,14a1,1,0,0,1-1-1V11H8A1,1,0,1,1,8,9h2V7a1,1,0,0,1,2,0V9h2a1,1,0,1,1,0,2H12v2A1,1,0,0,1,11,14Z"
                                                    transform="translate(0 0.197)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->acn != null)
                                            {{ $comp->acn }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="ic_relationship" transform="translate(0 -0.197)">
                                                <path id="Shape"
                                                    d="M11.094,20h-.188a3.06,3.06,0,0,1-2.21-.94L2.03,12.193A7.281,7.281,0,0,1,2.03,2.1,6.84,6.84,0,0,1,11,1.317a6.84,6.84,0,0,1,8.97.787,7.281,7.281,0,0,1,0,10.089L13.3,19.06A3.057,3.057,0,0,1,11.094,20Zm-.14-2h.14a1.076,1.076,0,0,0,.776-.333L18.535,10.8a5.281,5.281,0,0,0,0-7.3,4.843,4.843,0,0,0-6.848-.156,1,1,0,0,1-1.373,0A4.842,4.842,0,0,0,3.466,3.5a5.28,5.28,0,0,0,0,7.3l6.666,6.867a1.076,1.076,0,0,0,.775.333ZM11,14a1,1,0,0,1-1-1V11H8A1,1,0,1,1,8,9h2V7a1,1,0,0,1,2,0V9h2a1,1,0,1,1,0,2H12v2A1,1,0,0,1,11,14Z"
                                                    transform="translate(0 0.197)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>
                                        @if ($comp->cSizeFrom != null)
                                            {{ $comp->cSizeFrom }}
                                        @else
                                          N/A
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-5 pb-4 ">
                            <div class="text-center mr-5">
                                <h5 class="fw-bold text_primary">
                                    Jobs Posted
                                </h5>
                                <p style="font-size: 16px;">
                                    {{ count($comp->posts) }}
                                </p>
                            </div>
                            <div class="text-center mr-5">
                                <h5 class="fw-bold text_primary">
                                    Recuited
                                </h5>
                                <p style="font-size: 16px;">
                                    {{ $recruited }}
                                </p>
                            </div>
                            <div class="text-center">
                                <h5 class="fw-bold text_primary">
                                    Recruiter connected
                                </h5>
                                <p style="font-size: 16px;">
                                    {{ count($comp->recRelation) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg__card__admin p-4 mb-3">
                <h3 class='text_primary fw-bold mb-3'>Skills</h3>
                <ul class='tags'>
                    @foreach ($comp->features as $row)
                        <li class="d-inline-block">
                            <a href="javascript:void 0;">{{ $row->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if ($comp->description != null)
                <div class="bg__card__admin p-4 mb-3">
                    <h3 class='text_primary fw-bold mb-3'>Description</h3>
                    <p class="fs-14 text_grey_999">
                        {!! $comp->description !!}
                        @if ($comp->description != null)
                            {!! $comp->description !!}
                        @else
                          N/A
                        @endif
                    </p>
                </div>
            @endif
            <div class="bg__card__admin p-4 mb-3">
                <h3 class='text_primary fw-bold mb-3'>Jobs Remaining</h3>
                <p class="fs-14 text_grey_999">
                    {{ $comp->user->posts_count }}
                </p>
            </div>
            <div class="bg__card__admin p-4 mb-3">
                <h3 class='text_primary fw-bold mb-3'>Package Subscribed</h3>
                <p class="fs-14 text_grey_999">
                    {{ $comp->user->package->name }}
                </p>
            </div>
            @if ($comp->specialties != null)
                <div class="bg__card__admin p-4 mb-3">
                    <h3 class='text_primary fw-bold mb-3'>Specialties</h3>
                    <p class="fs-14 text_grey_999">
                        {!! $comp->specialties !!}
                        @if ($comp->specialties != null)
                            {!! $comp->specialties !!}
                        @else
                          N/A
                        @endif
                    </p>
                </div>
            @endif
            @if ($comp->mission != null)
                <div class="bg__card__admin p-4 mb-3">
                    <h3 class='text_primary fw-bold mb-3'>Mission</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($comp->mission != null)
                            {!! $comp->mission !!}
                        @else
                          N/A
                        @endif
                    </p>
                </div>
            @endif
            @if ($comp->whatWeDo != null)
                <div class="bg__card__admin p-4 mb-3">
                    <h3 class='text_primary fw-bold mb-3'>What We Do</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($comp->whatWeDo != null)
                            {!! $comp->whatWeDo !!}
                        @else
                          N/A
                        @endif
                    </p>
                </div>
            @endif
            <div class="my-4">
                <ul class='row '>
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Phone</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->country_code != null)
                                {{ $comp->country_code }} {{ $comp->phone }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Abn</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->abn != null)
                                {{ $comp->abn }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Acn</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->acn != null)
                                {{ $comp->acn }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                    {{-- @if ($comp->comp_id != null)
                        <li class='col-md-4 mb-4'>
                            <h3 class='fw-bold fs-5 mb-1'>Website</h3>
                            <p class="fs-14 text_grey_999">
                                @if ($comp->website != null)
                                    {{ $comp->website }}
                                @else
                                  N/A
                                @endif
                            </p>
                        </li>
                    @endif --}}
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>LinkedIn</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->linkedIn != null)
                                {{ $comp->linkedIn }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li>
                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Twitter</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->twitter != null)
                                {{ $comp->twitter }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li>

                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Instagram</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->insta != null)
                                {{ $comp->insta }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li>
                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Facebook</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->facebook != null)
                                {{ $comp->facebook }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Address</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->headQuarter != null)
                                {{ $comp->headQuarter }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li>
                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Company Size</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->cSizeFrom != null)
                                {{ $comp->cSizeFrom }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li>
                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>Founded</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->founded != null)
                                {{ $comp->founded }}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                    {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-bold fs-5 mb-1'>What We Do</h3>
                        <p class="fs-14 text_grey_999">
                            @if ($comp->whatWeDo != null)
                                {!! $comp->whatWeDo !!}
                            @else
                              N/A
                            @endif
                        </p>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('bottom_script')
@endsection
