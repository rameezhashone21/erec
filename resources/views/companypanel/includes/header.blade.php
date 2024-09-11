<header class="py-3 py-lg-0 header-dashboard" id="headerDashboard">
    <img src="{{ asset('/dashboard/images/bg_shape_header.svg') }}" alt=""
        class="position-absolute z-index--1 d-none d-lg-inline">
    <div class="container">
        <div class="d-flex d-lg-none align-items-center">
            <div>
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('/dashboard/images/logo.png') }}" alt="" class="img-fluid">
                </a>
            </div>
            <div class="ml-auto d-flex w-100 justify-content-end">
                <div class="dropdown">
                    <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#" role="button"
                        id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="{{ asset('/dashboard/images/round_img.png') }}" alt=""
                        class="profile_thumb me-2 rounded-50"> --}}
                        @if (isset(auth()->user()->company))

                            @if (auth()->user()->company->logo != null)
                                <img class="profile_thumb me-2 rounded-50"
                                    src="{{ asset('storage/' . auth()->user()->company->logo) }}" alt="">
                            @else
                                <img class="profile_thumb me-2 rounded-50"
                                    src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                            @endif
                            {{-- <span class="fs-12 text_dark_292929 fw-500 ">{{ auth()->user()->company->name }}</span> --}}
                            <span class="fs-12 text_dark_292929 fw-500 ">Menu</span>
                        @else
                            <img class="profile_thumb me-2 rounded-50"
                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                        @endif
                    </a>
                    <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                        <!--@if (Route::is('company.map'))-->
                        <!--    <li class="p-2 mx-3">-->
                        <!--        <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"-->
                        <!--            href="{{ route('home') }}">-->
                        <!--            <span>-->
                        <!--                Profile-->
                        <!--            </span>-->
                        <!--            <span>-->
                        <!--                <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"-->
                        <!--                    style="width: 21px; height: 21px;">-->
                        <!--            </span>-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--    {{-- <hr class="my-0"> --}}-->
                        <!--@endif-->
                        <li class=" p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('company.dashboard') }}">
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
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('company.jobs') }}">
                                <span>
                                    My Job Posts
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <!--<li class="p-2 mx-3">-->
                        <!--    <a class="dropdown-item fs-12 p-0 d-flex justify-content-between "-->
                        <!--        href="{{ route('company.profile') }}">-->
                        <!--        <span>-->
                        <!--            My Profile-->
                        <!--        </span>-->
                        <!--        <span>-->
                        <!--            <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"-->
                        <!--                style="width: 21px; height: 21px;">-->
                        <!--        </span>-->

                        <!--    </a>-->
                        <!--</li>-->
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('company.map') }}">
                                <span>
                                    Map View
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between "
                                href="{{ route('company.recruiters') }}">
                                <span>
                                    Recruiters
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('company.candidateIndex') }}">
                                <span>
                                    Candidates
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/Profile.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between align-items-center"
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
                                                transform="translate(0)" fill="#888"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="21.088" height="21.242"
                                viewBox="0 0 21.088 21.242">
                                <g id="on-off-button" transform="translate(-0.089)" opacity="0.72">
                                    <path id="Path_3228" data-name="Path 3228"
                                        d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                                        transform="translate(0)" fill="#888" />
                                </g>
                            </svg> --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
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
    <nav id="navbar_main" class="mobile-offcanvas navbar-expand-lg ">
        <div class="offcanvas-header">
            <button class="btn-close float-end color-dark"><i class="fa-solid fa-xmark "></i></button>
        </div>
        <div class="main_menu_top py-3">
            <div class="container-fluid px-lg-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-2">
                        <a class="navbar-brand d-none d-lg-inline" href="{{ route('index') }}">
                            <img src="{{ asset('/dashboard/images/logo.png') }}" alt=""
                                class="img-fluid logo-img">
                        </a>
                    </div>
                    <div class="col-md-10 row align-items-center justify-content-end">
                        <form action="{{ route('search.Keyword.view') }}" class="col-xxl-6 col-lg-5" method="get">
                            {{-- @csrf --}}
                            <div class="header_search_bar mx-auto d-sm-flex  position-relative justify-content-center position-relative"
                                id="showDiv">
                                <input type="search" class="form-control input_dash_theme mb-3 mb-sm-0"
                                    id="search-title" placeholder="Search keyword" autocomplete="off"
                                    name="searchKeyword">
                                <div id="search-title-search"
                                    class="search-suggestion-bar position-absolute shadow-lg d-none">
                                </div>
                                <select class="form-select input_dash_theme border-left-0" name="for"
                                    id="for">
                                    <option value="post">Jobs</option>
                                    <option value="users">Users</option>
                                </select>
                                <button class="btn_theme border-0 fs-12 py-2 d-inline-block"
                                    type="submit">Search</button>
                                <i class="fa-solid fa-magnifying-glass position-absolute text_grey_999"></i>
                            </div>
                        </form>
                        <div class="d-lg-flex align-items-center col-xxl-6 col-lg-7  mt-3 mt-lg-0"
                            style="gap: 1.3rem">
                            <a class="d-block fs-12 onhover_text text_dark_292929 fw-500"
                                href="{{ route('recruiter.list') }}">Find
                                Recruiters</a>
                            <div class="d-none d-lg-block">
                                @if (isset(auth()->user()->package))
                                    <a href="{{ route('subscription') }}"
                                        class="d-flex btn-subcription {{ auth()->user()->package->class }}">
                                        <img width="16px" height="16px"
                                            src="{{ asset('/dashboard/images/bronze-medal.png') }}" alt="">
                                        <span
                                            style="font-size: 10px!important;">{{ auth()->user()->package->name }}</span>
                                    </a>
                                    {{-- @if (auth()->user()->package->name == 'Standard')
                                    @elseif (auth()->user()->package->name == 'Business')
                                        <a href="{{ route('subscription') }}"
                                            class="d-flex fs-12 btn-subcription silver">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Business</span>
                                        </a>
                                    @elseif (auth()->user()->package->name == 'Enterprise')
                                        <a href="{{ route('subscription') }}"
                                            class="d-flex fs-12 btn-subcription gold">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Enterprise</span>
                                        </a>
                                    @elseif (auth()->user()->package->id == 21)
                                        <a href="{{ route('subscription') }}"
                                            class="d-flex fs-12 btn-subcription silver">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Free To Try</span>
                                        </a>
                                    @endif --}}
                                @endif
                            </div>
                            {{-- <ul class="d-md-flex align-items-center justify-content-lg-end d-none">
                                <li> --}}
                            <div class="dropdown d-none d-lg-block">
                                <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#"
                                    role="button" id="messageDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{-- <img src="{{ asset('/dashboard/images/round_img.png') }}" alt=""
                                            class="profile_thumb me-2 rounded-50"> --}}
                                    @if (isset(auth()->user()->company))

                                        @if (auth()->user()->company->logo != null)
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="{{ asset('storage/' . auth()->user()->company->logo) }}"
                                                alt="">
                                        @else
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                                alt="">
                                        @endif
                                        <span class="fs-12 text_dark_292929 fw-500 ">Menu</span>
                                    @else
                                        <img class="profile_thumb me-2 rounded-50"
                                            src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                                    @endif
                                </a>
                                <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                                    {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                                    <!--@if (Route::is('company.map'))-->
                                    <!--    <li class="p-2 mx-3">-->
                                    <!--        <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"-->
                                    <!--            href="{{ route('home') }}">-->
                                    <!--            <span>-->
                                    <!--                Profile-->
                                    <!--            </span>-->
                                    <!--            <span>-->
                                    <!--                <img src="{{ asset('/dashboard/images/edit.png') }}"-->
                                    <!--                    alt="dashboard icon" style="width: 21px; height: 21px;">-->
                                    <!--            </span>-->
                                    <!--        </a>-->
                                    <!--    </li>-->
                                    <!--    {{-- <hr class="my-0"> --}}-->
                                    <!--@endif-->
                                    <li class=" p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="{{ route('company.dashboard') }}">
                                            <span>
                                                Dashboard
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/dashboard.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="{{ route('company.jobs') }}">
                                            <span>
                                                My Job Posts
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/suitcase.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between "
                                            style='font-size: 14px;' href="{{ route('company.profile') }}">
                                            <span>
                                                My Profile
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/edit.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>

                                        </a>
                                    </li>

                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between "
                                            style='font-size: 14px;' href="{{ route('company.recruiters') }}">
                                            <span>
                                                Recruiters
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="{{ route('company.candidateIndex') }}">
                                            <span>
                                                Candidates
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/Profile.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="{{ route('company.map') }}">
                                            <span>
                                                Map View
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between a style='font-size: 14px;'lign-items-center"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <span>
                                                Logout
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21.088"
                                                    height="21.242" viewBox="0 0 21.088 21.242">
                                                    <g id="on-off-button" transform="translate(-0.089)"
                                                        opacity="0.72">
                                                        <path id="Path_3228" data-name="Path 3228"
                                                            d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                                                            transform="translate(0)" fill="#888"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="21.088" height="21.242"
                                            viewBox="0 0 21.088 21.242">
                                            <g id="on-off-button" transform="translate(-0.089)" opacity="0.72">
                                                <path id="Path_3228" data-name="Path 3228"
                                                    d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                                                    transform="translate(0)" fill="#888" />
                                            </g>
                                        </svg> --}}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            {{-- 40/40 job post left --}}
                            @if (isset(auth()->user()->package))
                                <a href=""
                                    class="d-flex fs-12 btn-subcription {{ auth()->user()->package->class }}"
                                    style="font-size: 10px !important">
                                    {{ auth()->user()->all_posts_count }}/
                                    {{-- @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                        {{ (auth()->user()->package->no_of_posts + auth()->user()->posts_count) - auth()->user()->package->no_of_posts }}
                                        jobs Posts left
                                    @else --}}
                                    {{ auth()->user()->posts_count }} Jobs posts left
                                    {{-- @endif --}}
                                </a>
                                {{-- @if (auth()->user()->package->name == 'Standard')
                                @elseif (auth()->user()->package->name == 'Business')
                                    <a href="" class="d-flex fs-12 btn-subcription silver">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts . '+' . auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            jobs Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} jobs Posts left
                                        @endif
                                    </a>
                                @elseif (auth()->user()->package->name == 'Enterprise')
                                    <a href="" class="d-flex fs-12 btn-subcription gold">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts . '+' . auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            jobs Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} jobs Posts left
                                        @endif
                                    </a>
                                @elseif (auth()->user()->package->id == 21)
                                    <a href="" class="d-flex fs-12 btn-subcription silver">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts . '+' . auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            jobs Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} jobs Posts left
                                        @endif
                                    </a>
                                @endif --}}
                            @endif
                            {{-- </li>
                            </ul> --}}
                            @php
                             $notifications = App\Models\ExamNotification::latest('id','asc')->where('receiver_id',Auth::user()->id)->take(5)->get();
                             $unread_notifications_count = App\Models\ExamNotification::latest('id','asc')->where('read',0)->where('receiver_id',Auth::user()->id)->take(5)->get();
                            @endphp

                            <div class="dropdown d-none d-lg-block">
                                <a class="text_dark_292929" href="#"
                                    role="button" id="notificationsDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-bell fs-5"></i>
                                    @if(count($unread_notifications_count) > 0)
                                    <div class="notification-count">{{count($unread_notifications_count)}}</div>
                                    @endif
                                </a>
                                <ul class="dropdown-menu user-setting notifications-dropdown" aria-labelledby="notificationsDropdown">
                                    <li class='d-flex align-items-center justify-content-between p-2 mx-3'>
                                        <div>
                                            <h3> Notifications </h3>
                                        </div>
                                        <div>
                                            <a href={{route("company.markNotificationsRead")}} class='fs-14 text_primary onhover_text-decoration'> Mark as all read </a>
                                        </div> 
                                    </li>

                                    @if(!$notifications->isEmpty())
                                    @foreach($notifications as $notification)
                                    {{-- Unread Notifications --}}
                                    
                                    @php
                                        $candidate_banner = App\Models\User::where('id',$notification->sender_id)->value('avatar');
                                    @endphp
                                    
                                    @if($notification->read == 0) 
                                    <li>
                                        @if($notification->status == "exam_status" || $notification->status == "job_apply")
                                        <a class="dropdown-item fs-12 d-flex align-items-center" style="background-color: #f5f5f5;"
                                            href="{{ route('company.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id]) }}">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>   
                                        @elseif($notification->status == "Company Connection Request Accepted" || $notification->status == "Company Connection Request Rejected" ||
                                        $notification->status == "Recruiter Connection Request" || $notification->status == "Recruiter Connection Request" )
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="{{route('notificationRead', ['id' => $notification->id])}}" style="background-color: #f5f5f5;">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>    
                                        @endif
                                    </li>
                                    {{-- Read Notifications --}}
                                    @else
                                    <li>
                                        @if($notification->status == "exam_status" || $notification->status == "job_apply")
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="{{ route('company.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id]) }}">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>   
                                        @elseif($notification->status == "Company Connection Request Accepted" || $notification->status == "Company Connection Request Rejected" ||
                                        $notification->status == "Recruiter Connection Request" || $notification->status == "Recruiter Connection Request")
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="{{route('notificationRead', ['id' => $notification->id])}}">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>    

                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                    @else
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item fs-12 px-0">
                                            No Notifications Found
                                        </a>
                                    </li>
                                    @endif
                                    
                                    <li class='text-center'>
                                        <a href="{{route('company.allNotifications')}}" class='fs-14 text_primary onhover_text-decoration'> See all notifications </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 d-md-flex align-items-center justify-content-evenly">


                    </div> --}}
                </div>
            </div>
        </div>
        <div class="main_menu bg_primary py-3 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="navbar-nav justify-content-center align-items-center">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}"
                                    @if (Route::is('index')) class="nav-link active" @else class="nav-link" @endif>Home</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('services') }}"
                                    @if (Route::is('services')) class="nav-link active" @else class="nav-link" @endif>Services</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('about') }}"
                                    @if (Route::is('about')) class="nav-link active" @else class="nav-link" @endif>About
                                    Us</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('recruiter.list') }}"
                                    @if (Route::is('recruiter.list')) class="nav-link active" @else class="nav-link" @endif>Recruiters</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('platform') }}"
                                    @if (Route::is('platform')) class="nav-link active" @else class="nav-link" @endif>Technology</a>
                            </li>

                            {{-- <li class="dropdown nav-item header-dropdown">
                                <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Technologies
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="nav-item mx-0">
                                        <a class="nav-item " href="{{ route('platform') }}">Platform Technology</a>
                                    </li>
                                    <li class="dropdown nav-item header-dropdown inner-drop mx-0">
                                        <a class="nav-link dropdown-toggle" role="button" id="intelligenceDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">Intelligence</a>
                                        <ul class="dropdown-menu " aria-labelledby="intelligenceDropdown">
                                            <li><a class="nav-item" href="#">AI</a></li>
                                            <li><a class="nav-item" href="#">Platform ML</a></li>
                                            <li><a class="nav-item" href="#">Talent Sourcing</a></li>
                                            <li><a class="nav-item" href="#">Pre Employment Assessments</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item"> <a class="nav-link" href="javascript:;">Company</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="contact.html">Recruiter</a></li>
                        <li class="nav-item"> <a class="nav-link" href="contact.html">Candidates</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div style="height: 74.4px"></div>
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script>

    function fitTextTitle(id) {
        var value = $("#para-" + id).html();
        console.log(value);
        $("#search-title").val(value);
    }
    const searchLogic = function() {

        $("#search-title-search").append("");
        // $("#search-title-search").addClass('d-none');

        formData = {
            value: $(this).val(),
        }
        // console.log(formData);
        $.ajax({
            type: "GET",
            url: "{{ route('search.Keyword') }}",
            data: {
                value: $('#search-title').val(),
            },
            dataType: "json",
            encode: true,
        }).done(function(data) {
            console.log(data['can'].length);
            $("#search-title-search").removeClass('d-none');
            $("#search-title-search").html('');
            html = '';
            if (data['can'].length == 0 && data['rec'].length == 0 && data['comp'].length == 0)
            {
                $("#search-title-search").html("NO RECORD FOUND");
            }
            else
            {
                $.each(data['can'], function(index, value) {
                    html +=
                        '<div class="d-flex align-items-center border-bottom py-2" style="gap:0 6px;"> <img src="https://www.snappydate.com/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdf8fqd7mz%2Fimage%2Fupload%2Fv1671722692%2Frazer-logo-png-transparent_s5spd5.png&w=256&q=75" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;" /><p id="para-' +
                        value['id'] + '" onclick="fitTextTitle(' + value['id'] +
                        ')">' +
                        value['first_name'] + '</p></div>';
                });
                $.each(data['rec'], function(index, value) {
                    html +=
                        '<div class="d-flex align-items-center border-bottom py-2" style="gap:0 6px;"> <img src="https://www.snappydate.com/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdf8fqd7mz%2Fimage%2Fupload%2Fv1671722692%2Frazer-logo-png-transparent_s5spd5.png&w=256&q=75" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;" /><p id="para-' +
                        value['id'] + '" onclick="fitTextTitle(' + value['id'] +
                        ')">' +
                        value['name'] + '</p></div>';
                });
                $.each(data['comp'], function(index, value) {
                    html +=
                        '<div class="d-flex align-items-center border-bottom py-2" style="gap:0 6px;"> <img src="https://www.snappydate.com/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdf8fqd7mz%2Fimage%2Fupload%2Fv1671722692%2Frazer-logo-png-transparent_s5spd5.png&w=256&q=75" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;" /><p id="para-' +
                        value['id'] + '" onclick="fitTextTitle(' + value['id'] +
                        ')">' +
                        value['name'] + '</p></div>';
                });
                $("#search-title-search").append(html);
            }

            this.value = "";
        });
    }
    const getInterval = setInterval(() => {
        if ($('#search-title').length) {
            $('#search-title').unbind("keydown", searchLogic);
            $('#search-title').on("keydown", searchLogic);
        }
    }, 1000);
</script> --}}
