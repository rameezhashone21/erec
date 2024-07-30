<!-- Main Navbar -->
<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <form action="{{ route('search.Keyword.view') }}" method="get"
        class="main-navbar__search d-none d-md-flex d-lg-flex">
        <!-- removed Classes: w-100 -->
        {{-- <div class="input-group input-group-seamless ml-3">
             <div class="input-group-prepend">
                 <div class="input-group-text">
                     <i class="fas fa-search"></i>
                 </div>
             </div>
             <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                 aria-label="Search">
         </div> --}}
        <div class="header_search_bar mx-auto d-sm-flex  position-relative justify-content-center position-relative"
            id="showDiv">
            <input type="search" class="form-control input_dash_theme mb-3 mb-sm-0" id="search-title"
                placeholder="Search keyword" autocomplete="off" name="searchKeyword">
            <div id="search-title-search" class="search-suggestion-bar position-absolute shadow-lg d-none">
            </div>
            {{-- <select class="form-select input_dash_theme border-left-0" name="for" id="for">
                 <option value="post">Jobs</option>
                 <option value="users">Users</option>
             </select> --}}
            {{-- <button class="btn_theme text-uppercase border-0 fs-14 py-2 d-inline-block" type="submit">Search</button> --}}
            <i class="fa-solid fa-magnifying-glass position-absolute text_grey_999"></i>
        </div>
    </form>
    <ul class="navbar-nav border-left flex-row ">
        {{-- <li class="nav-item border-right dropdown notifications">
             <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="nav-link-icon__wrapper">
                     <i class="material-icons">&#xE7F4;</i>
                     <span class="badge badge-pill badge-danger">2</span>
                 </div>
             </a>
             <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                 @foreach (\App\Models\User::where('id', 66)->get() as $row)
                     <a class="dropdown-item" href="#">
                         <div class="notification__content">
                             <span class="notification__category">{{ $row->notifications }}</span>
        </div>
        </a>
        @endforeach
        </div>
        </li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3 d-flex align-items-center" data-toggle="dropdown"
                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle mr-2" src="{{ asset('imgs/fav-icon.png') }}"
                    {{-- <img class="user-avatar rounded-circle mr-2" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                    --}} alt="User Avatar">
                <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                {{-- <a class="dropdown-item" href="user-profile-lite.html">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.html">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.html">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a> --}}

                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="material-icons text-danger">&#xE879;</i>Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
            data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            <i class="material-icons">&#xE5D2;</i>
        </a>
    </nav>
</nav>
</div>
<!-- / .main-navbar -->