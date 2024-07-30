<!-- Main Sidebar -->
<style>
    .main-sidebar .nav .nav-item .nav-link.active,
    .main-sidebar .nav .nav-item .nav-link:hover,
    .main-sidebar .nav .nav-item.active,
    .main-sidebar .nav .nav-item:hover {
        box-shadow: inset 0.1875rem 0 0 #3c7ba7;
        background-color: #fbfbfb;
        color: #3c7ba7;
    }

    .admin-panel-round-img .avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    {{-- <div class="main-navbar">
         <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
             <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                 <div class="d-table m-auto">
                     <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                         src="{{ asset('adminpanel/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
    <span class="d-none d-md-inline ml-1">Admin Dashboard</span>
    </div>
    </a>
    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
    </a>
    </nav>
    </div> --}}
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper">
        <div class="admin-panel-round-img text-center py-4">
            <img class="avatar shadow" src="{{ asset('imgs/fav-icon.png') }}" alt="">
            {{-- <img class="avatar shadow" src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt=""> --}}
        </div>
        <!-- <span class="d-none d-md-inline ml-1">Admin Dashboard</span> -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a title="Dashboard" href="{{ route('admin.dashboard') }}"
                    @if (Route::is('admin.dashboard')) class="nav-link active"
                    @else class="nav-link" @endif>
                    <i class="material-icons">dashboard</i>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="All Users" href="{{ route('admin.users') }}"
                    @if (Route::is('admin.users')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="fa-solid fa-users"></i>
                    <span>
                        All Users
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Employers" href="{{ route('admin.companyIndex') }}"
                    @if (Route::is('admin.companyIndex')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="fa-solid fa-building"></i>
                    <span>
                        Employers
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Recruiters" href="{{ route('admin.recruiterIndex') }}"
                    @if (Route::is('admin.recruiterIndex')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="material-icons">edit</i>
                    <span>
                        Recruiters
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Candidates" href="{{ route('admin.candidateIndex') }}"
                    @if (Route::is('admin.candidateIndex')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="fa-solid fa-user"></i>
                    <span>
                        Candidates
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Job Posts" href="{{ route('admin.job') }}"
                    @if (Route::is('admin.job')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="fa-solid fa-file-import"></i>
                    <span>
                        Job Posts
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Subscriptions Packages" href="{{ route('admin.packages') }}"
                    @if (Route::is('admin.packages')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="fa-solid fa-file-import"></i>
                    <span>
                        Subscriptions Packages
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Skills" href="{{ route('admin.skills') }}"
                    @if (Route::is('admin.skills')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons">edit</i>
                    <span>
                        Skills
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Company Categories" href="{{ route('admin.category') }}"
                    @if (Route::is('admin.category')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons">category</i>
                    <span>
                        Company Categories
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Job Categories" href="{{ route('admin.jobCategory') }}"
                    @if (Route::is('admin.jobCategory')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons">category</i>
                    <span>
                        Job Categories
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Candidate Job Applications" href="{{ route('admin.jobApplication') }}"
                    @if (Route::is('admin.jobApplication')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="material-icons">apps</i>
                    <span>
                        Candidate Job Applications
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="Newsletter Subscribers" href="{{ route('admin.subscribers') }}"
                    @if (Route::is('admin.subscribers')) class="nav-link active"
                    @else class="nav-link" @endif>
                    <i class="material-icons">apps</i>
                    <span>
                        Newsletter Subscribers
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="SocialLinks" href="{{ route('social.links') }}"
                    @if (Route::is('social.links')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons">apps</i>
                    <span>
                        SocialLinks
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="FAQs" href="{{ route('faqs') }}"
                    @if (Route::is('faqs')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons">apps</i>
                    <span>
                        FAQs
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a title="FAQs" href="{{ route('admin.site.setting') }}"
                    @if (Route::is('admin.site.setting')) class="nav-link active" @else
                    class="nav-link" @endif>
                    <i class="material-icons"></i>
                    <span>
                        Site Settings
                    </span>
                </a>
            </li>

        </ul>
    </div>
</aside>
<!-- End Main Sidebar -->
