<div class="col-xl-3 col-lg-4 col-md-5 sidebar_container <?php if(Route::is('recruiter.map')): ?> d-none <?php endif; ?>">
    <i class="fa-solid fa-xmark side_bar_close d-lg-none"></i>
    <div class="bg-white position-relative rounded_10">
        <img src="<?php echo e(asset('/dashboard/images/side_bar_top.png')); ?>" alt="" class="img-fluid ">
        <div class="text-center">
            
            <div class="upload-profile-image mt-minus">
                <form id="upload_form" action="<?php echo e(route('recruiter.profile.update')); ?>" enctype="multipart/form-data"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="profileImage"><i class="fa-solid fa-camera"></i> </label>
                    <input type="file" name="avatar" id="profileImage">
                    <?php if(isset(auth()->user()->recruiter)): ?>

                        <?php if(auth()->user()->recruiter->avatar != null): ?>
                            <img class="side_bar_author rounded-50"
                                src="<?php echo e(asset('storage/' . auth()->user()->recruiter->avatar)); ?>" alt="">
                            
                        <?php else: ?>
                            <img class="side_bar_author rounded-50"
                                src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="">
                        <?php endif; ?>
                    <?php else: ?>
                        <img class="side_bar_author rounded-50" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                            alt="">
                    <?php endif; ?>
                </form>
            </div>
            <h3 class="fs-5 fw-600 text_primary mb-2">
                <?php echo e(auth()->user()->recruiter->name); ?>

                <!--<?php echo e(\Illuminate\Support\Str::limit(auth()->user()->recruiter->lastName, 20, $end = '...')); ?>-->
            </h3>
            <p class="mb-2 px-3 fs-14">
                <?php echo e(Illuminate\Support\Str::limit(auth()->user()->recruiter->tagline, 50, $end = '...')); ?>

            </p>
            
            <p class="mb-2 px-3 fs-14 fw-bolder">Profile: Recruiter
                
            </p>
        </div>
        <ul class="side_bar_menu" id="side_bar_dashboard">
            <li <?php if(Route::is('dashboard')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('dashboard')); ?>"
                    <?php if(Route::is('dashboard')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                    <img src="<?php echo e(asset('/dashboard/images/dashboard.png')); ?>" alt="" class="me-4 one">
                    <img src="<?php echo e(asset('/dashboard/images/dashboard-2.png')); ?>" alt="" class="me-4 two">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('recruiter.jobs')); ?>"
                    <?php if(Route::is('recruiter.jobs')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                    <img src="<?php echo e(asset('/dashboard/images/companies-av.png')); ?>" alt="" class="me-4 one">
                    <img src="<?php echo e(asset('/dashboard/images/companies-av-white.png')); ?>" alt="" class="me-4 two">
                    <span>My Job Posts</span>
                </a>
            </li>
            <li <?php if(Route::is('recruiter.exam.*')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('recruiter.exam.listing')); ?>"
                <?php if(Route::is('recruiter.exam.listing')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>" alt="" class="me-4 one">
                <img src="<?php echo e(asset('/dashboard/images/suitcase-white.png')); ?>" alt="" class="me-4 two">
                <span>My Exams</span>
                </a>
            </li>
            <li class="collapse_button_parent d-flex justify-content-between align-items-center">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <img src="<?php echo e(asset('dashboard/images/Connection.png')); ?>" alt="" class="me-4 one">
                    <img src="<?php echo e(asset('dashboard/images/Connection_hover.png')); ?>" alt="" class="me-4 two">

                    <span>My Connections</span>
                </a>
                <span class="mx-auto not_collapsed collapsed" data-bs-toggle="collapse" href="#myProfile" role="button"
                    aria-expanded="false" aria-controls="myProfile">
                    <i class="fa-solid fa-plus"></i>
                    <i class="fa-solid fa-minus"></i>
                </span>
            </li>
            <li class="collapse_items">
                <ul class="collapse" id="myProfile">
                    <li>
                        <a href="<?php echo e(route('recruiter.companyIndex')); ?>"
                            <?php if(Route::is('recruiter.companyIndex')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                            <img src="<?php echo e(asset('/dashboard/images/suitcase.png')); ?>" alt="" class="me-4 three">
                            <img src="<?php echo e(asset('/dashboard/images/suitcase-white.png')); ?>" alt=""
                                class="me-4 four">
                            <span>Employers</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('recruiter.candidateIndex')); ?>"
                            <?php if(Route::is('recruiter.candidateIndex')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                            <img src="<?php echo e(asset('dashboard/images/Profile.png')); ?>" alt="" class="me-4 three">
                            <img src="<?php echo e(asset('dashboard/images/Profile-1.png')); ?>" alt="" class="me-4 four">
                            <span>Candidates</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('recruiter.profile')); ?>"
                    <?php if(Route::is('recruiter.profile')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                    <img src="<?php echo e(asset('/dashboard/images/edit.png')); ?>" alt="" class="me-4 one">
                    <img src="<?php echo e(asset('/dashboard/images/edit-2.png')); ?>" alt="" class="me-4 two">
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('recruiter.map')); ?>"
                    <?php if(Route::is('recruiter.map')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
                    <img src="<?php echo e(asset('/dashboard/images/users-avatar-1.png')); ?>" alt="" class="me-4 one">
                    <img src="<?php echo e(asset('/dashboard/images/users-avatar-white.png')); ?>" alt="" class="me-4 two">
                    <span>Map View</span>
                </a>
            </li>
        </ul>
        <?php
            $pckg = App\Models\SubscriptionPackages::where('status', 1)->max('no_of_posts');
            // dd($pckg);
        ?>
        <?php if(auth()->user()->posts_count <= 2): ?>
            <div class="text-center px-4 mt-large pb-4">
                <a href="<?php echo e(route('subscription')); ?>"
                    class="d-flex align-items-center btn_theme_2 fw-500 justify-content-center py-3">
                    <img src="<?php echo e(asset('/dashboard/images/target.png')); ?>" alt="" class="me-3">
                    <span>Upgrade Package</span>
                </a>
                <p class="fs-14 mt-3">
                    Choose a package that best represents your requirements. Our subscription packages offer
                    great
                    value
                    for
                    money.
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('#profileImage').change(function(event) {
        $("#upload_form").submit();
    });
</script>
<?php /**PATH C:\Users\Rameez Ali\Pictures\new1\erec\resources\views/recruterpanel/includes/sidebar.blade.php ENDPATH**/ ?>