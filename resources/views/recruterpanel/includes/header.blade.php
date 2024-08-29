<header class="py-3 py-lg-0 header-dashboard" id="headerDashboard">
    <img src="{{ asset('/dashboard/images/bg_shape_header.svg') }}" alt=""
        class="position-absolute z-index--1 d-none d-lg-inline">
    <div class="container">
        <div class="d-flex d-lg-none align-items-center">
            <div>
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('/dashboard/images/logo.png') }}"
                        alt="" class="img-fluid"></a>
            </div>
            <div class="ml-auto d-flex w-100 justify-content-end">
                <div class="dropdown">
                    <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#" role="button"
                        id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="{{ asset('/dashboard/images/round_img.png') }}" alt=""
                        class="profile_thumb me-2 rounded-50"> --}}
                        @if (isset(auth()->user()->recruiter))

                            @if (auth()->user()->recruiter->avatar != null)
                                <img class="profile_thumb me-2 rounded-50"
                                    src="{{ asset('storage/' . auth()->user()->recruiter->avatar) }}"
                                    alt="">
                            @else
                                <img class="profile_thumb me-2 rounded-50"
                                    src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                            @endif
                            <span class="fs-12 text_dark_292929 fw-500 ">Menu</span>
                            {{-- <span class="fs-12 text_dark_292929 fw-500 ">{{ auth()->user()->recruiter->name }}  {{ auth()->user()->recruiter->lastName }}</span> --}}
                        @else
                            <img class="profile_thumb me-2 rounded-50"
                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                        @endif
                    </a>
                    <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                        @if (Route::is('recruiter.map'))
                            <li class="p-2 mx-3">
                                <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                    href="{{ route('home') }}">
                                    <span>
                                        Profile
                                    </span>
                                    <span>
                                        <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"
                                            style="width: 21px; height: 21px;">
                                    </span>
                                </a>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20.531" height="20.53"
                                    viewBox="0 0 20.531 20.53">
                                    <g id="profile-user" transform="translate(0 -0.001)" opacity="0.72">
                                        <path id="Path_3227" data-name="Path 3227"
                                            d="M10.265,0A10.265,10.265,0,1,0,20.531,10.266,10.266,10.266,0,0,0,10.265,0Zm0,3.069a3.4,3.4,0,1,1-3.395,3.4A3.4,3.4,0,0,1,10.265,3.07Zm0,14.777a7.534,7.534,0,0,1-4.906-1.809,1.447,1.447,0,0,1-.508-1.1A3.424,3.424,0,0,1,8.29,11.515h3.951a3.419,3.419,0,0,1,3.436,3.423,1.443,1.443,0,0,1-.507,1.1A7.531,7.531,0,0,1,10.263,17.847Z"
                                            fill="#888"></path>
                                    </g>
                                </svg> --}}
                            </li>
                            {{-- <hr class="my-0"> --}}
                        @endif
                        <li class="p-2 mx-3">
                            <a class="dropdown-item d-flex justify-content-between fs-12 p-0"
                                href="{{ route('dashboard') }}">
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
                            <a class="dropdown-item d-flex justify-content-between fs-12 p-0"
                                href="{{ route('recruiter.jobs') }}">
                                <span>
                                    My Job Posts
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('recruiter.profile') }}">
                                <span>
                                    My Profile
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/edit.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('recruiter.map') }}">
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
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('recruiter.companyIndex') }}">
                                <span>
                                    Employers
                                </span>
                                <span>
                                    <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="{{ route('recruiter.candidateIndex') }}">
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
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
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
                                                transform="translate(0)" fill="#888" />
                                        </g>
                                    </svg>
                                </span>
                            </a>
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
    <nav id="navbar_main" class="mobile-offcanvas navbar-expand-lg">
        <div class="offcanvas-header">
            {{-- <button class="btn-close float-end color-dark">x</button> --}}
            <button class="btn-close float-end color-dark"><i class="fa-solid fa-xmark "></i></button>
        </div>
        <div class="main_menu_top py-3">
            <div class="container-fluid px-lg-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-2">
                        <a class="navbar-brand d-none d-lg-inline" href="{{ route('index') }}">
                            <img src="{{ asset('/dashboard/images/logo.png') }}" alt=""
                                class="img-fluid logo-img d-block">
                        </a>
                    </div>
                    <div class="col-md-10 row align-items-center justify-content-end">
                        <form action="{{ route('search.Keyword.view') }}" class="col-xxl-6 col-lg-5" method="get">
                            {{-- @csrf --}}
                            <div class="header_search_bar mx-auto d-sm-flex  position-relative justify-content-center position-relative"
                                id="showDiv">
                                <input type="search" class="form-control fs-12 input_dash_theme mb-3 mb-sm-0"
                                    id="search-title" placeholder="Search keyword" autocomplete="off"
                                    name="searchKeyword">
                                <div id="search-title-search"
                                    class="search-suggestion-bar position-absolute shadow-lg d-none">
                                </div>
                                <select class="form-select input_dash_theme fs-12 border-left-0" name="for"
                                    id="for">
                                    <option value="post">Jobs</option>
                                    <option value="users">Users</option>
                                </select>
                                <button class="btn_theme w-sm-100 border-0 fs-12 py-2 d-inline-block"
                                    type="submit">Search</button>
                                <i class="fa-solid fa-magnifying-glass position-absolute text_grey_999"></i>
                            </div>
                        </form>
                        <div class="d-flex align-items-center col-xxl-6 col-lg-7 mt-3 mt-lg-0" style="gap: 1.3rem">
                            <a href="{{ route('employer.list') }}"
                                class="d-block fs-12 onhover_text text_dark_292929 fw-500">
                                Find Employers
                            </a>
                            {{-- <div>
                                @if (isset(auth()->user()->package))
                                    @if (auth()->user()->package->name == 'Gold')
                                        <a href="{{ route('subscription') }}"
                                            class="d-inline-flex fs-12 btn-subcription gold">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Gold Member</span>
                                        </a>
                                    @elseif (auth()->user()->package->name == 'Bronze')
                                        <a href="{{ route('subscription') }}"
                                            class="d-inline-flex fs-12 btn-subcription bronze">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Bronze Member</span>
                                        </a>
                                    @elseif (auth()->user()->package->name == 'Silver')
                                        <a href="{{ route('subscription') }}"
                                            class="d-inline-flex fs-12 btn-subcription silver">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Silver Member</span>
                                        </a>
                                    @endif
                                @endif
                            </div> --}}
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
                                        <a href="{{ route('subscription') }}"
                                            class="d-flex fs-12 btn-subcription bronze">
                                            <img width="16px" height="16px"
                                                src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                                                alt="">
                                            <span>Standard</span>
                                        </a>
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
                            <div class="dropdown d-none d-lg-block">
                                <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#"
                                    role="button" id="messageDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{-- <img src="{{ asset('/dashboard/images/round_img.png') }}" alt=""
                                                class="profile_thumb me-2 rounded-50"> --}}
                                    @if (isset(auth()->user()->recruiter))

                                        @if (auth()->user()->recruiter->avatar != null)
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="{{ asset('storage/' . auth()->user()->recruiter->avatar) }}"
                                                alt="">
                                        @else
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                                alt="">
                                        @endif
                                        <span class="fs-12 text_dark_292929 fw-500 ">
                                            Menu</span>
                                    @else
                                        <img class="profile_thumb me-2 rounded-50"
                                            src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                                    @endif
                                </a>
                                <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                                    @if (Route::is('recruiter.map'))
                                        <li class="p-2 mx-3">
                                            <a class="dropdown-item p-0 d-flex justify-content-between"
                                                href="{{ route('home') }}" style="font-size: 14px;">
                                                <span>
                                                    Profile
                                                </span>
                                                <span>
                                                    <img src="{{ asset('/dashboard/images/edit.png') }}"
                                                        alt="dashboard icon" style="width: 21px; height: 21px;">
                                                </span>
                                            </a>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20.531" height="20.53"
                                                viewBox="0 0 20.531 20.53">
                                                <g id="profile-user" transform="translate(0 -0.001)" opacity="0.72">
                                                    <path id="Path_3227" data-name="Path 3227"
                                                        d="M10.265,0A10.265,10.265,0,1,0,20.531,10.266,10.266,10.266,0,0,0,10.265,0Zm0,3.069a3.4,3.4,0,1,1-3.395,3.4A3.4,3.4,0,0,1,10.265,3.07Zm0,14.777a7.534,7.534,0,0,1-4.906-1.809,1.447,1.447,0,0,1-.508-1.1A3.424,3.424,0,0,1,8.29,11.515h3.951a3.419,3.419,0,0,1,3.436,3.423,1.443,1.443,0,0,1-.507,1.1A7.531,7.531,0,0,1,10.263,17.847Z"
                                                        fill="#888"></path>
                                                </g>
                                            </svg> --}}
                                        </li>
                                        {{-- <hr class="my-0"> --}}
                                    @endif
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item d-flex justify-content-between p-0"
                                            href="{{ route('dashboard') }}" style="font-size: 14px;">
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
                                        <a class="dropdown-item d-flex justify-content-between p-0"
                                            href="{{ route('recruiter.jobs') }}" style="font-size: 14px;">
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
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            href="{{ route('recruiter.profile') }}" style="font-size: 14px;">
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
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            href="{{ route('recruiter.companyIndex') }}" style="font-size: 14px;">
                                            <span>
                                                Employers
                                            </span>
                                            <span>
                                                <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            href="{{ route('recruiter.candidateIndex') }}" style="font-size: 14px;">
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
                                            href="{{ route('recruiter.map') }}" style="font-size: 14px;">
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
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            style="font-size: 14px;">
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
                                                            transform="translate(0)" fill="#888" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @if (isset(auth()->user()->package))
                                <a href="" class="d-flex btn-subcription {{ auth()->user()->package->class }}"
                                    style="font-size: 10px !importaant">
                                    {{-- @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                        {{ auth()->user()->package->no_of_posts + auth()->user()->posts_count - auth()->user()->package->no_of_posts }} /
                                        jobs Posts left
                                    @else --}}
                                    {{ auth()->user()->posts_count }} /
                                    {{-- @endif --}}
                                    {{ auth()->user()->all_posts_count }} Jobs posts left
                                </a>
                                {{-- @if (auth()->user()->package->name == 'Standard')
                                    <a href="" class="d-flex fs-12 btn-subcription bronze">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts + auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            Job Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} Job Posts left
                                        @endif
                                    </a>
                                @elseif (auth()->user()->package->name == 'Business')
                                    <a href="" class="d-flex fs-12 btn-subcription silver">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts + auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            Job Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} Job Posts left
                                        @endif
                                    </a>
                                @elseif (auth()->user()->package->name == 'Enterprise')
                                    <a href="" class="d-flex fs-12 btn-subcription gold">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts + auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            Job Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} Job Posts left
                                        @endif
                                    </a>
                                @elseif (auth()->user()->package->id == 21)
                                    <a href="" class="d-flex fs-12 btn-subcription silver">
                                        {{ auth()->user()->posts_count }}/
                                        @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                                            {{ auth()->user()->package->no_of_posts + auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                                            Job Posts left
                                        @else
                                            {{ auth()->user()->package->no_of_posts }} Job Posts left
                                        @endif
                                    </a>
                                @endif --}}
                            @endif
                            
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
                                            <a href={{route("recruiter.markNotificationsRead")}} class='fs-14 text_primary onhover_text-decoration'> Mark as all read </a>
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
                                            href="{{ route('recruiter.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id]) }}">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>   
                                        @elseif($notification->status == "Recruiter Connection Request Accepted" || $notification->status == "Recruiter Connection Request Rejected" || 
                                        $notification->status == "Company Connection Request" || $notification->status == "Recruiter Connection Request")
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
                                            href="{{ route('recruiter.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id]) }}">
                                        <span>
                                            <img src='{{asset('storage/'.$candidate_banner)}}' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'>{{$notification->content}}</span>   
                                        @elseif($notification->status == "Recruiter Connection Request Accepted" || $notification->status == "Recruiter Connection Request Rejected" ||
                                        $notification->status == "Company Connection Request" || $notification->status == "Recruiter Connection Request")
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
                                        <a href="{{route('recruiter.allNotifications')}}" class='fs-14 text_primary onhover_text-decoration'> See all notifications </a>
                                    </li>

                                </ul>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu bg_primary py-3 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}"
                                    @if (Route::is('index')) class="nav-link active" @else class="nav-link" @endif>Home</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('services') }}"
                                    @if (Route::is('services')) class="nav-link active" @else class="nav-link" @endif>Services</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('about') }}"
                                    @if (Route::is('about')) class="nav-link active" @else class="nav-link" @endif>About
                                    Us</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('employer.list') }}"
                                    @if (Route::is('employer.list')) class="nav-link active" @else class="nav-link" @endif>Employers</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('platform') }}"
                                    @if (Route::is('platform')) class="nav-link active" @else class="nav-link" @endif>Technology</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div style="height: 74.4px"></div>
