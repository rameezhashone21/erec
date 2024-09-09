<header class="custom-header header_bg_new">
  <img src="<?php echo e(asset('imgs/bg_shape_header.svg')); ?>" alt="" class="bg-shape-header">

  <div class="container">
    <nav class="navbar navbar-expand-xl navbar-light">
      <a class="navbar-brand" href="<?php echo e(route('index')); ?>"><img class="img-fluid logo-img"
          src="<?php echo e(asset('images/logo.png')); ?>"alt=""></a>

      <div class="d-lg-none">
        <?php if(Auth::check()): ?>
          
          <div class="dropdown">
            <?php if(isset(auth()->user()->candidate)): ?>
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php if(auth()->user()->avatar != null): ?>
                  <img class="profile_thumb me-2 rounded-50" src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>"
                    alt="">
                <?php else: ?>
                  <img class="profile_thumb me-2 rounded-50" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                    alt="">
                <?php endif; ?>
                <?php echo e(auth()->user()->candidate->first_name); ?>

                <?php echo e(auth()->user()->candidate->last_name); ?>

              </a>
            <?php elseif(isset(auth()->user()->company)): ?>
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php if(auth()->user()->company->logo != null): ?>
                  <img class="profile_thumb me-2 rounded-50"
                    src="<?php echo e(asset('storage/' . auth()->user()->company->logo)); ?>" alt="">
                <?php else: ?>
                  <img class="profile_thumb me-2 rounded-50" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                    alt="">
                <?php endif; ?>
                <?php echo e(auth()->user()->company->name); ?>

              </a>
            <?php elseif(isset(auth()->user()->recruiter)): ?>
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php if(auth()->user()->recruiter->avatar != null): ?>
                  <img class="profile_thumb me-2 rounded-50"
                    src="<?php echo e(asset('storage/' . auth()->user()->recruiter->avatar)); ?>" alt="">
                <?php else: ?>
                  <img class="profile_thumb me-2 rounded-50" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                    alt="">
                <?php endif; ?>
                <?php echo e(auth()->user()->recruiter->name); ?>

              </a>
            <?php else: ?>
              <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting" data-bs-toggle="dropdown"
                aria-expanded="false"><img src="<?php echo e(asset('images/profile-img.svg')); ?>" width="30" height="30"
                  alt=""> <?php echo e(auth()->user()->name); ?></a>
            <?php endif; ?>
            <ul class="dropdown-menu user-setting dropdown-menu-end" aria-labelledby="user-setting">
              <li class="d-flex justify-content-between border-bottom align-items-center p-2 mx-3">
                <a class="dropdown-item fs-14 p-0"
                  <?php if(auth()->user()->role == 'admin'): ?> href="<?php echo e(route('admin.dashboard')); ?>" <?php endif; ?>
                  <?php if(auth()->user()->role == 'user'): ?> href="<?php echo e(route('candidate.dashboard')); ?>" <?php endif; ?>
                  <?php if(auth()->user()->role == 'company'): ?> href="<?php echo e(route('company.dashboard')); ?>" <?php endif; ?>
                  <?php if(auth()->user()->role == 'rec'): ?> href="<?php echo e(route('dashboard')); ?>" <?php endif; ?>>My
                  Profile</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="20.531" height="20.53" viewBox="0 0 20.531 20.53">
                  <g id="profile-user" transform="translate(0 -0.001)" opacity="0.72">
                    <path id="Path_3227" data-name="Path 3227"
                      d="M10.265,0A10.265,10.265,0,1,0,20.531,10.266,10.266,10.266,0,0,0,10.265,0Zm0,3.069a3.4,3.4,0,1,1-3.395,3.4A3.4,3.4,0,0,1,10.265,3.07Zm0,14.777a7.534,7.534,0,0,1-4.906-1.809,1.447,1.447,0,0,1-.508-1.1A3.424,3.424,0,0,1,8.29,11.515h3.951a3.419,3.419,0,0,1,3.436,3.423,1.443,1.443,0,0,1-.507,1.1A7.531,7.531,0,0,1,10.263,17.847Z"
                      fill="#888" />
                  </g>
                </svg>
              </li>
              <li class="d-flex justify-content-between align-items-center p-2 mx-3">
                <a class="dropdown-item fs-14 p-0" href="<?php echo e(route('logout')); ?>"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="21.088" height="21.242" viewBox="0 0 21.088 21.242">
                  <g id="on-off-button" transform="translate(-0.089)" opacity="0.72">
                    <path id="Path_3228" data-name="Path 3228"
                      d="M8.987,9.875V1.646a1.646,1.646,0,0,1,3.292,0V9.875a1.646,1.646,0,0,1-3.292,0Zm8.17-7.462a1.234,1.234,0,0,0-1.529,1.939,8.075,8.075,0,1,1-9.992,0,1.235,1.235,0,1,0-1.53-1.939,10.544,10.544,0,1,0,13.051,0Z"
                      transform="translate(0)" fill="#888" />
                  </g>
                </svg>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
                </form>
              </li>
            </ul>
          </div>
        <?php else: ?>
          <a class="login-btn default-btn btn" href="<?php echo e(route('register')); ?>"> REGISTER</a>
          <a class="login-btn default-btn btn" href="<?php echo e(route('login')); ?>"> LOGIN</a>
        <?php endif; ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse my-auto" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
          <?php if(
              !Route::is('subscription') &&
                  !Route::is('subscriptionPayment') &&
                  !Route::is('successPayment') &&
                  !Route::is('company.details') &&
                  !Route::is('candidates.details') &&
                  !Route::is('candidates.details.next') &&
                  !Route::is('candidates.details.profile') &&
                  !Route::is('candidateEducationView') &&
                  !Route::is('recruiter.details')): ?>
            <li class="nav-item active mb-2 mb-md-0">
              <a href="<?php echo e(route('index')); ?>"
                <?php if(Route::is('index')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Home</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="<?php echo e(route('services')); ?>"
                <?php if(Route::is('services')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Services</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="<?php echo e(route('about')); ?>"
                <?php if(Route::is('about')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>About
                Us</a>
            </li>
            <li class="nav-item mb-2 mb-md-0">
              <a href="<?php echo e(route('job.browse')); ?>"
                <?php if(Route::is('job.browse')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Browse
                Jobs</a>
            </li>
            <li class="nav-item mb-2 mb-md-0"> <a class="nav-link" href="<?php echo e(route('platform')); ?>"
                <?php if(Route::is('platform')): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?>>Technology</a>
            </li>
            
          <?php endif; ?>
        </ul>
        <?php if(Auth::check()): ?>
          <?php if(auth()->user()->role != 'user'): ?>
            <?php if(isset(auth()->user()->package)): ?>
              <?php if(auth()->user()->package->name == 'Standard'): ?>
                <a href="<?php echo e(route('subscription')); ?>"
                  class="d-flex fs-14 align-items-center btn-subcription bronze_web">
                  <img width="16px" height="16px" src="<?php echo e(asset('/dashboard/images/bronze-medal.png')); ?>"
                    alt="">
                  <span>Standard</span>
                </a>
              <?php elseif(auth()->user()->package->name == 'Business'): ?>
                <a href="<?php echo e(route('subscription')); ?>"
                  class="d-flex fs-14 align-items-center btn-subcription silver_web">
                  <img width="16px" height="16px" src="<?php echo e(asset('/dashboard/images/bronze-medal.png')); ?>"
                    alt="">
                  <span>Business</span>
                </a>
              <?php elseif(auth()->user()->package->name == 'Enterprise'): ?>
                <a href="<?php echo e(route('subscription')); ?>"
                  class="d-flex fs-14 align-items-center btn-subcription gold_web">
                  <img width="16px" height="16px" src="<?php echo e(asset('/dashboard/images/bronze-medal.png')); ?>"
                    alt="">
                  <span>Enterprise</span>
                </a>
              <?php elseif(auth()->user()->package->id == 21): ?>
                <a href="<?php echo e(route('subscription')); ?>"
                  class="d-flex fs-14 align-items-center btn-subcription silver_web">
                  <img width="16px" height="16px" src="<?php echo e(asset('/dashboard/images/bronze-medal.png')); ?>"
                    alt="">
                  <span>Free To Try</span>
                </a>
              <?php endif; ?>
            <?php endif; ?>

          <?php endif; ?>
        <?php endif; ?>
        <div class="d-none d-lg-block">
          <?php if(Auth::check()): ?>
            
            <div class="ps-3 dropdown ">
              <?php if(isset(auth()->user()->candidate)): ?>
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <?php if(auth()->user()->avatar != null): ?>
                    <img class="profile_thumb me-2 rounded-50" src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>"
                      alt="">
                  <?php else: ?>
                    <img class="profile_thumb me-2 rounded-50"
                      src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                  <?php endif; ?>
                  Menu
                </a>
              <?php elseif(isset(auth()->user()->company)): ?>
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <?php if(auth()->user()->company->logo != null): ?>
                    <img class="profile_thumb me-2 rounded-50"
                      src="<?php echo e(asset('storage/' . auth()->user()->company->logo)); ?>" alt="">
                  <?php else: ?>
                    <img class="profile_thumb me-2 rounded-50"
                      src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                  <?php endif; ?>
                  Menu
                </a>
              <?php elseif(isset(auth()->user()->recruiter)): ?>
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <?php if(auth()->user()->recruiter->avatar != null): ?>
                    <img class="profile_thumb me-2 rounded-50"
                      src="<?php echo e(asset('storage/' . auth()->user()->recruiter->avatar)); ?>" alt="">
                  <?php else: ?>
                    <img class="profile_thumb me-2 rounded-50"
                      src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                  <?php endif; ?>
                  Menu
                </a>
              <?php else: ?>
                <a class="dropdown-toggle fs-14" href="javascript:void(0)" id="user-setting"
                  data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo e(asset('imgs/fav-icon.png')); ?>"
                    width="30" height="30" alt=""> Menu</a>
              <?php endif; ?>
              <ul class="dropdown-menu user-setting dropdown-menu-end" aria-labelledby="user-setting">
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                    <?php if(auth()->user()->role == 'admin'): ?> href="<?php echo e(route('admin.dashboard')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'user'): ?> href="<?php echo e(route('candidate.dashboard')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'company'): ?> href="<?php echo e(route('company.dashboard')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'rec'): ?> href="<?php echo e(route('dashboard')); ?>" <?php endif; ?>>
                    <span>
                      Dashboard
                    </span>
                    <span>
                      <img src="<?php echo e(asset('/dashboard/images/dashboard.png')); ?>" alt="dashboard icon"
                        style="width: 21px; height: 21px;">
                    </span>
                  </a>
                </li>


                <?php if(auth()->user()->role == 'user'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('candidates.job.index')); ?>">
                      <span>
                        My Job Applications
                      </span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 'company'): ?>
                  <li class="p-2 mx-3">
                    <a class="d-flex justify-content-between align-items-center dropdown-item fs-14 p-0"
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
                <?php endif; ?>
                <?php if(auth()->user()->role == 'rec'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item d-flex justify-content-between align-items-center fs-14 p-0"
                      href="<?php echo e(route('recruiter.jobs')); ?>">
                      <span>
                        My Job Posts
                      </span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                    <?php if(auth()->user()->role == 'admin'): ?> href="<?php echo e(route('admin.dashboard')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'user'): ?> href="<?php echo e(route('candidates.details.view')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'company'): ?> href="<?php echo e(route('company.profile')); ?>" <?php endif; ?>
                    <?php if(auth()->user()->role == 'rec'): ?> href="<?php echo e(route('recruiter.profile')); ?>" <?php endif; ?>>
                    <span>
                      My Profile
                    </span>
                    <span>
                      <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>" alt="dashboard icon"
                        style="width: 21px; height: 21px;">
                    </span>
                  </a>
                </li>

                <?php if(auth()->user()->role == 'rec'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('recruiter.companyIndex')); ?>">
                      <span>Employeres</span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'rec'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('recruiter.candidateIndex')); ?>">
                      <span>
                        Candidates
                      </span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/Profile.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'user'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('candidates.cvList')); ?>">
                      <span>
                        My Resumes
                      </span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/CV.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'company'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('company.recruiters')); ?>">
                      <span>Recruiters</span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 'company'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('company.candidateIndex')); ?>">
                      <span>Candidates</span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/Profile.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 'rec'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
                      href="<?php echo e(route('recruiter.map')); ?>">
                      <span>
                        Map View
                      </span>
                      <span>
                        <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="dashboard icon"
                          style="width: 21px; height: 21px;">
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->role == 'company'): ?>
                  <li class="p-2 mx-3">
                    <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
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
                <?php endif; ?>
                <li class="p-2 mx-3">
                  <a class="dropdown-item fs-14 p-0 d-flex justify-content-between align-items-center"
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
                            transform="translate(0)" fill="#888" />
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
          <?php else: ?>
            <a class="login-btn default-btn btn" href="<?php echo e(route('register')); ?>"> REGISTER</a>
            <a class="login-btn default-btn btn" href="<?php echo e(route('login')); ?>"> LOGIN</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/layouts/includes/header.blade.php ENDPATH**/ ?>