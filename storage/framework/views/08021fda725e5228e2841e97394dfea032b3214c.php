<header class="py-3 py-lg-0 header-dashboard" id="headerDashboard">
    <img src="<?php echo e(asset('/dashboard/images/bg_shape_header.svg')); ?>" alt=""
        class="position-absolute z-index--1 d-none d-lg-inline">
    <div class="container">
        <div class="d-flex d-lg-none align-items-center">
            <div>
                <a class="navbar-brand" href="<?php echo e(route('index')); ?>">
                    <img src="<?php echo e(asset('/dashboard/images/logo.png')); ?>" alt="" class="img-fluid">
                </a>
            </div>
            <div class="ml-auto d-flex w-100 justify-content-end">
                <div class="dropdown">
                    <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#" role="button"
                        id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        
                        <?php if(isset(auth()->user()->company)): ?>

                            <?php if(auth()->user()->company->logo != null): ?>
                                <img class="profile_thumb me-2 rounded-50"
                                    src="<?php echo e(asset('storage/' . auth()->user()->company->logo)); ?>" alt="">
                            <?php else: ?>
                                <img class="profile_thumb me-2 rounded-50"
                                    src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                            <?php endif; ?>
                            
                            <span class="fs-12 text_dark_292929 fw-500 ">Menu</span>
                        <?php else: ?>
                            <img class="profile_thumb me-2 rounded-50"
                                src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                        
                        <!--<?php if(Route::is('company.map')): ?>-->
                        <!--    <li class="p-2 mx-3">-->
                        <!--        <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"-->
                        <!--            href="<?php echo e(route('home')); ?>">-->
                        <!--            <span>-->
                        <!--                Profile-->
                        <!--            </span>-->
                        <!--            <span>-->
                        <!--                <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>" alt="dashboard icon"-->
                        <!--                    style="width: 21px; height: 21px;">-->
                        <!--            </span>-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--    -->
                        <!--<?php endif; ?>-->
                        <li class=" p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="<?php echo e(route('company.dashboard')); ?>">
                                <span>
                                    Dashboard
                                </span>
                                <span>
                                    <img src="<?php echo e(asset('/dashboard/images/dashboard.png')); ?>" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="<?php echo e(route('company.jobs')); ?>">
                                <span>
                                    My Job Posts
                                </span>
                                <span>
                                    <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <!--<li class="p-2 mx-3">-->
                        <!--    <a class="dropdown-item fs-12 p-0 d-flex justify-content-between "-->
                        <!--        href="<?php echo e(route('company.profile')); ?>">-->
                        <!--        <span>-->
                        <!--            My Profile-->
                        <!--        </span>-->
                        <!--        <span>-->
                        <!--            <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>" alt="dashboard icon"-->
                        <!--                style="width: 21px; height: 21px;">-->
                        <!--        </span>-->

                        <!--    </a>-->
                        <!--</li>-->
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="<?php echo e(route('company.map')); ?>">
                                <span>
                                    Map View
                                </span>
                                <span>
                                    <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between "
                                href="<?php echo e(route('company.recruiters')); ?>">
                                <span>
                                    Recruiters
                                </span>
                                <span>
                                    <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"
                                href="<?php echo e(route('company.candidateIndex')); ?>">
                                <span>
                                    Candidates
                                </span>
                                <span>
                                    <img src="<?php echo e(asset('/dashboard/images/Profile.png')); ?>" alt="dashboard icon"
                                        style="width: 21px; height: 21px;">
                                </span>
                            </a>
                        </li>
                        <li class="p-2 mx-3">
                            <a class="dropdown-item fs-12 p-0 d-flex justify-content-between align-items-center"
                                href="<?php echo e(route('logout')); ?>"
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
                            
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
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
                        <a class="navbar-brand d-none d-lg-inline" href="<?php echo e(route('index')); ?>">
                            <img src="<?php echo e(asset('/dashboard/images/logo.png')); ?>" alt=""
                                class="img-fluid logo-img">
                        </a>
                    </div>
                    <div class="col-md-10 row align-items-center justify-content-end">
                        <form action="<?php echo e(route('search.Keyword.view')); ?>" class="col-xxl-6 col-lg-5" method="get">
                            
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
                                href="<?php echo e(route('recruiter.list')); ?>">Find
                                Recruiters</a>
                            <div class="d-none d-lg-block">
                                <?php if(isset(auth()->user()->package)): ?>
                                    <a href="<?php echo e(route('subscription')); ?>"
                                        class="d-flex btn-subcription <?php echo e(auth()->user()->package->class); ?>">
                                        <img width="16px" height="16px"
                                            src="<?php echo e(asset('/dashboard/images/bronze-medal.png')); ?>" alt="">
                                        <span
                                            style="font-size: 10px!important;"><?php echo e(auth()->user()->package->name); ?></span>
                                    </a>
                                    
                                <?php endif; ?>
                            </div>
                            
                            <div class="dropdown d-none d-lg-block">
                                <a class="text_grey_999 dropdown-toggle d-flex align-items-center" href="#"
                                    role="button" id="messageDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    
                                    <?php if(isset(auth()->user()->company)): ?>

                                        <?php if(auth()->user()->company->logo != null): ?>
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="<?php echo e(asset('storage/' . auth()->user()->company->logo)); ?>"
                                                alt="">
                                        <?php else: ?>
                                            <img class="profile_thumb me-2 rounded-50"
                                                src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                alt="">
                                        <?php endif; ?>
                                        <span class="fs-12 text_dark_292929 fw-500 ">Menu</span>
                                    <?php else: ?>
                                        <img class="profile_thumb me-2 rounded-50"
                                            src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                                    <?php endif; ?>
                                </a>
                                <ul class="dropdown-menu user-setting" aria-labelledby="messageDropdown">
                                    
                                    <!--<?php if(Route::is('company.map')): ?>-->
                                    <!--    <li class="p-2 mx-3">-->
                                    <!--        <a class="dropdown-item fs-12 p-0 d-flex justify-content-between"-->
                                    <!--            href="<?php echo e(route('home')); ?>">-->
                                    <!--            <span>-->
                                    <!--                Profile-->
                                    <!--            </span>-->
                                    <!--            <span>-->
                                    <!--                <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>"-->
                                    <!--                    alt="dashboard icon" style="width: 21px; height: 21px;">-->
                                    <!--            </span>-->
                                    <!--        </a>-->
                                    <!--    </li>-->
                                    <!--    -->
                                    <!--<?php endif; ?>-->
                                    <li class=" p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="<?php echo e(route('company.dashboard')); ?>">
                                            <span>
                                                Dashboard
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/dashboard.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="<?php echo e(route('company.jobs')); ?>">
                                            <span>
                                                My Job Posts
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between "
                                            style='font-size: 14px;' href="<?php echo e(route('company.profile')); ?>">
                                            <span>
                                                My Profile
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>

                                        </a>
                                    </li>

                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between "
                                            style='font-size: 14px;' href="<?php echo e(route('company.recruiters')); ?>">
                                            <span>
                                                Recruiters
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="<?php echo e(route('company.candidateIndex')); ?>">
                                            <span>
                                                Candidates
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/Profile.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between"
                                            style='font-size: 14px;' href="<?php echo e(route('company.map')); ?>">
                                            <span>
                                                Map View
                                            </span>
                                            <span>
                                                <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>"
                                                    alt="dashboard icon" style="width: 21px; height: 21px;">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item p-0 d-flex justify-content-between a style='font-size: 14px;'lign-items-center"
                                            href="<?php echo e(route('logout')); ?>"
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
                                        
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            
                            <?php if(isset(auth()->user()->package)): ?>
                                <a href=""
                                    class="d-flex fs-12 btn-subcription <?php echo e(auth()->user()->package->class); ?>"
                                    style="font-size: 10px !important">
                                    <?php echo e(auth()->user()->posts_count); ?>/
                                    
                                    <?php echo e(auth()->user()->all_posts_count); ?> Jobs posts left
                                    
                                </a>
                                
                            <?php endif; ?>
                            
                            <?php
                             $notifications = App\Models\ExamNotification::latest('id','asc')->where('receiver_id',Auth::user()->id)->take(5)->get();
                             $unread_notifications_count = App\Models\ExamNotification::latest('id','asc')->where('read',0)->where('receiver_id',Auth::user()->id)->take(5)->get();
                            ?>

                            <div class="dropdown d-none d-lg-block">
                                <a class="text_dark_292929" href="#"
                                    role="button" id="notificationsDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-bell fs-5"></i>
                                    <?php if(count($unread_notifications_count) > 0): ?>
                                    <div class="notification-count"><?php echo e(count($unread_notifications_count)); ?></div>
                                    <?php endif; ?>
                                </a>
                                <ul class="dropdown-menu user-setting notifications-dropdown" aria-labelledby="notificationsDropdown">
                                    <li class='d-flex align-items-center justify-content-between p-2 mx-3'>
                                        <div>
                                            <h3> Notifications </h3>
                                        </div>
                                        <div>
                                            <a href=<?php echo e(route("company.markNotificationsRead")); ?> class='fs-14 text_primary onhover_text-decoration'> Mark as all read </a>
                                        </div> 
                                    </li>

                                    <?php if(!$notifications->isEmpty()): ?>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    <?php
                                        $candidate_banner = App\Models\User::where('id',$notification->sender_id)->value('avatar');
                                    ?>
                                    
                                    <?php if($notification->read == 0): ?> 
                                    <li>
                                        <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                                        <a class="dropdown-item fs-12 d-flex align-items-center" style="background-color: #f5f5f5;"
                                            href="<?php echo e(route('company.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id])); ?>">
                                        <span>
                                            <img src='<?php echo e(asset('storage/'.$candidate_banner)); ?>' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'><?php echo e($notification->content); ?></span>   
                                        <?php elseif($notification->status == "Company Connection Request Accepted" || $notification->status == "Company Connection Request Rejected" ||
                                        $notification->status == "Recruiter Connection Request" || $notification->status == "Recruiter Connection Request" ): ?>
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="<?php echo e(route('notificationRead', ['id' => $notification->id])); ?>" style="background-color: #f5f5f5;">
                                        <span>
                                            <img src='<?php echo e(asset('storage/'.$candidate_banner)); ?>' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'><?php echo e($notification->content); ?></span>    
                                        <?php endif; ?>
                                    </li>
                                    
                                    <?php else: ?>
                                    <li>
                                        <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="<?php echo e(route('company.job.applicantsById', ['id' => $notification->job_id , 'notification_id' => $notification->id])); ?>">
                                        <span>
                                            <img src='<?php echo e(asset('storage/'.$candidate_banner)); ?>' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'><?php echo e($notification->content); ?></span>   
                                        <?php elseif($notification->status == "Company Connection Request Accepted" || $notification->status == "Company Connection Request Rejected" ||
                                        $notification->status == "Recruiter Connection Request" || $notification->status == "Recruiter Connection Request"): ?>
                                        <a class="dropdown-item fs-12 d-flex align-items-center"
                                            href="<?php echo e(route('notificationRead', ['id' => $notification->id])); ?>">
                                        <span>
                                            <img src='<?php echo e(asset('storage/'.$candidate_banner)); ?>' alt='' class='profile_thumb me-2 rounded-50' />
                                        </span>
                                        <span style='white-space: normal;'><?php echo e($notification->content); ?></span>    

                                        <?php endif; ?>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <li class="p-2 mx-3">
                                        <a class="dropdown-item fs-12 px-0">
                                            No Notifications Found
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <li class='text-center'>
                                        <a href="<?php echo e(route('company.allNotifications')); ?>" class='fs-14 text_primary onhover_text-decoration'> See all notifications </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="main_menu bg_primary py-3 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="navbar-nav justify-content-center align-items-center">
                            <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('index')); ?>"
                                    <?php if(Route::is('index')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Home</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('services')); ?>"
                                    <?php if(Route::is('services')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Services</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('about')); ?>"
                                    <?php if(Route::is('about')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>About
                                    Us</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('recruiter.list')); ?>"
                                    <?php if(Route::is('recruiter.list')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Recruiters</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('platform')); ?>"
                                    <?php if(Route::is('platform')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Technology</a>
                            </li>

                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div style="height: 74.4px"></div>

<?php /**PATH C:\Users\Rameez Ali\Pictures\new1\erec\resources\views/companypanel/includes/header.blade.php ENDPATH**/ ?>