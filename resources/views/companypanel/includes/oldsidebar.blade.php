 <!-- Main Sidebar -->

 <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
     <!-- <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('adminpanel/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
            <span class="d-none d-md-inline ml-1">Admin Dashboard</span>
        </div>
        </a>
        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
        </a>
    </nav>
    </div> -->
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
             @if (isset(auth()->user()->company))

                 @if (auth()->user()->company->logo != null)
                     <img class="avatar shadow" src="{{ asset('public/storage/' . auth()->user()->company->logo) }}"
                         alt="">
                 @else
                     <img class="avatar shadow" src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                 @endif
             @else
                 <img class="avatar shadow" src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
             @endif
         </div>
         <!-- <span class="d-none d-md-inline ml-1">Admin Dashboard</span> -->
         <ul class="nav flex-column">
             <li class="nav-item">
                 <a href="{{ route('company.dashboard') }}"
                     @if (Route::is('company.dashboard')) class="nav-link active"
                     @else class="nav-link" @endif>
                     <i class="material-icons">dashboard</i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ route('company.profile') }}"
                     @if (Route::is('company.profile')) class="nav-link active"
                     @else class="nav-link" @endif>
                     <i class="fa-solid fa-user"></i>
                     <span>Profile Setup</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ route('company.jobs') }}"
                     @if (Route::is('company.jobs')) class="nav-link active" @else
                     class="nav-link" @endif>
                     <i class="fa-solid fa-file-import"></i>
                     <span>Job Posts</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ route('company.recruiters') }}"
                     @if (Route::is('company.recruiters')) class="nav-link active" @else class="nav-link" @endif>
                     <i class="material-icons">edit</i>
                     <span>My Recriuters</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ route('company.jobApplications') }}"
                     @if (Route::is('company.jobApplications')) class="nav-link active" @else class="nav-link" @endif>
                     <i class="material-icons">apps</i>
                     <span>Job Applications</span>
                 </a>
             </li>

         </ul>
     </div>
 </aside>
 <!-- End Main Sidebar -->
