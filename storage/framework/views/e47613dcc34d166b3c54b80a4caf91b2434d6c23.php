<?php $__env->startSection('content'); ?>
    <style>
        .rounded_img_xxm {
            width: 20px;
            height: 20px;
        }

        .candidate_thumb {
            width: 80px;
            height: 80px;
        }

        .theme_box_2 {
            background: #fff;
            filter: drop-shadow(0px 3px 10px rgba(120, 120, 120, 0.25));
            border-top: 2px solid var(--color-primary);
            border-radius: 2px;
            border-radius: 1rem;
        }

        /*========= MEDIA QUERIES===========*/
        @media (max-width: 991.98px) {
            .university_thumb {
                width: 50px;
                height: 50px;
            }
        }
    </style>
    <div class="pt__banner"></div>
    <section class="position-relative">
        <?php if($comp->user->banner != null): ?>
            <img class="" src="<?php echo e(asset('storage/' . $comp->user->banner)); ?>" alt=""
                class="w-100 banner__image" width="100%" height="300rem">
        <?php else: ?>
            <img src="<?php echo e(asset('dashboard/images/Company.png')); ?>" alt="" class="w-100 banner__image">
        <?php endif; ?>
    </section>
    <main class="margin-top-minus-all position-relative" style="z-index: 2">
        <div class="container">
            <div class="row gy-4 gy-lg-0">
                <div class="col-lg-3 sidebar_container">
                    <div class="side_bar bg-white position-relative rounded_10 side_bar_top view_profile_box pb-4">
                        <img src="<?php echo e(asset('dashboard/images/side_bar_top.png')); ?>" alt="" class="img-fluid w-100">
                        <div class="text-center">
                            <div class="view_profile_image">
                                <?php if(isset($comp->logo)): ?>
                                    <img src="<?php echo e(asset('storage/' . $comp->logo)); ?>" alt="profile-img">
                                <?php else: ?>
                                    <img class="" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                        alt="">
                                    
                                <?php endif; ?>
                                <!-- <img src="../assets/images/side_bar_auth.png" alt="" class="side_bar_author rounded-50 mt-minus"> -->
                            </div>
                            <h3 class="view_profile_name px-4">
                                <?php echo e($comp->name); ?>

                            </h3>
                            <?php if($comp->tagline != null): ?>
                                <p class="mb-0 px-4 fs-14">
                                    <?php echo e($comp->tagline); ?>

                                </p>
                            <?php endif; ?>
                            <?php if($comp->type != null): ?>
                                <p class="mb-0 px-4 fs-14">
                                    <?php echo e($comp->type); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="mb-2 px-3 fs-14 text-center fw-bolder">Employer</p>
                        </div>
                        <div class="mt-4 px-3">
                            <h3 class="view_profile_txt">Contact Details</h3>
                        </div>
                        <ul class="side_bar_menu view_profile_sidebar px-3" id="side_bar_view">
                            <?php if($comp->headQuarter != null): ?>
                                <li>
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <span>
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
                                        <span><?php echo e($comp->headQuarter); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($comp->phone != null): ?>
                                <li>
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18.405" height="18.398"
                                                viewBox="0 0 18.405 18.398">
                                                <path id="phone"
                                                    d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                    transform="translate(-3.364 -3.375)" fill="#92929d" />
                                            </svg>
                                        </span>
                                        
                                        
                                        <?php if(Auth::check()): ?>
                                            <span><?php echo e($comp->country_code); ?>

                                                <?php echo e($comp->phone); ?></span>
                                        <?php else: ?>
                                            <span>
                                                <?php echo e(\Illuminate\Support\Str::limit($comp->country_code . ' ' . $comp->phone, 6, $end = '****')); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($comp->created_at != null): ?>
                                <li>
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <span>
                                            <svg id="ic_date" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 20 20">
                                                <path id="Shape"
                                                    d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,0,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                                    fill="#92929d" />
                                            </svg>
                                        </span>
                                        <span>Since
                                            <?php echo e(\Carbon\Carbon::parse($comp->created_at)->formatLocalized('%b %Y')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($comp->cSizeFrom != null and $comp->cSizeFrom != 'Please Select company size'): ?>
                                <li>
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <span>
                                            <svg id="ic_Working" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24">
                                                <g id="Working_at" data-name="Working at">
                                                    <rect id="Rectangle_24" data-name="Rectangle 24" width="24"
                                                        height="24" fill="none" />
                                                    <g id="Group_25" data-name="Group 25" transform="translate(1 3)">
                                                        <path id="Combined_Shape" data-name="Combined Shape"
                                                            d="M3,19a3,3,0,0,1-3-3V6A3,3,0,0,1,3,3H6A3,3,0,0,1,9,0h4a3,3,0,0,1,3,3h3a3,3,0,0,1,3,3V16a3,3,0,0,1-3,3Zm16-2a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1h-.5V17Zm-2.5,0V5H5.5V17ZM2,6V16a1,1,0,0,0,1,1h.5V5H3A1,1,0,0,0,2,6ZM14,3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3Z"
                                                            fill="#92929d" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><?php echo e($comp->cSizeFrom); ?> Employees</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($comp->type != null): ?>
                                <li>
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <span>
                                            <img src="<?php echo e(asset('dashboard/images/users-avatar-view.png')); ?>"
                                                alt="">
                                        </span>
                                        <span><?php echo e($comp->type); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="border-bottom py-3">
                            <ul class="d-flex justify-content-around">
                                <li class="text-center">
                                    <p class="mb-0 view_profile_des2 h-50px ">Jobs<br>Posted</p>
                                    <p class="mb-0 view_profile_des3"><?php echo e(count($post)); ?></p>
                                </li>
                                <li class="text-center ">
                                    <p class="mb-0 view_profile_des2 h-50px">Recruited</p>
                                    <p class="mb-0 view_profile_des3"><?php echo e($recruited); ?></p>
                                </li>
                                <li class="text-center ">
                                    <p class="mb-0 view_profile_des2 h-50px">Recruiter<br>connected</p>
                                    
                                    <p class="mb-0 view_profile_des3"><?php echo e(count($comp->recRelation)); ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class=" d-flex justify-content-around view_profile_socials  mt-4 px-3">
                            <?php if($comp->facebook != null): ?>
                                <a href="<?php echo e($comp->facebook); ?>" target="_blank">
                                    <i class="fab fa-facebook-f text_primary "></i>
                                </a>
                                
                            <?php endif; ?>
                            <?php if($comp->twitter != null): ?>
                                <a href="<?php echo e($comp->twitter); ?>" target="_blank">
                                    <i class="fab fa-twitter text_primary "></i>
                                </a>
                                
                            <?php endif; ?>
                            <?php if($comp->website != null): ?>
                                <a href="<?php echo e($comp->website); ?>" target="_blank">
                                    <i class="fas fa-globe text_primary "></i>
                                </a>
                                
                            <?php endif; ?>
                            <?php if($comp->linkedIn != null): ?>
                                <a href="<?php echo e($comp->linkedIn); ?>" target="_blank">
                                    <i class="fab fa-linkedin-in text_primary "></i>
                                </a>
                                
                            <?php endif; ?>
                            <?php if($comp->insta != null): ?>
                                <a href="<?php echo e($comp->insta); ?>" target="_blank">
                                    <img src="<?php echo e(asset('dashboard/images/instagram.svg')); ?>"alt="">
                                </a>
                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="view_profile_box content_area p-4">
                        <?php if($comp->description != null): ?>
                            <div class="border-bottom pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h2 class="view_profile_name my-3">About Us</h2>
                                    </div>
                                    <div class="d-flex" style="gap: 15px;">
                                        <?php if(Auth::check()): ?>
                                            <?php if(auth()->user()->role == 'rec'): ?>
                                                <?php if(auth()->user()->recruiter->CompRecRelation($comp->id, auth()->user()->recruiter->id) != null): ?>
                                                    <?php if(auth()->user()->recruiter->CompRecRelation($comp->id, auth()->user()->recruiter->id)->status == 1): ?>
                                                        
                                                    <?php else: ?>
                                                        <?php if(auth()->user()->recruiter->CompRecRelation($comp->id, auth()->user()->recruiter->id)->sender != "rec"): ?>
                                                            
                                                            <a href="<?php echo e(route('recruiters.accept', $comp->id)); ?>"
                                                                class="view_profile_button d-block w-100 text-center px-3">Accept</a>
                                                            
                                                            
                                                            <a href=""
                                                                class="view_profile_button d-block w-100 text-center  px-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#newModal<?php echo e($comp->id); ?>">Ignore</a>
                                                            

                                                        <?php else: ?>

                                                        <button type="button"
                                                            class="btn default-btn text-center btn-disabled" disabled
                                                            style="padding: 6px 24px, font-size: 14px;"><i
                                                                class="fas fa-user-plus me-1"></i> Request
                                                            Sent
                                                        </button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('recruiter.request.send.to.company', $comp->id)); ?>"
                                                        class="btn default-btn text-center"
                                                        style="padding: 6px 24px, font-size: 14px;"><i
                                                            class="fas fa-user-plus me-1"></i> Connect</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <p>
                                    <?php echo $comp->description; ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if($comp->whatWeDo != null): ?>
                            <div class="border-bottom pb-4">
                                <h2 class="view_profile_name my-3">Mission</h2>
                                <p>
                                    <?php echo $comp->whatWeDo; ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if($comp->mission != null): ?>
                            <div class="border-bottom pb-4">
                                <h2 class="view_profile_name my-3">Vision</h2>
                                <p>
                                    <?php echo $comp->mission; ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if(count($comp->features) > 0): ?>
                            <div class="border-bottom pb-4">
                                <h2 class="view_profile_name mb-3">Industry Skilled in</h2>
                                <ul class="tags d-flex aling-items-center flex-wrap">
                                    <?php $__currentLoopData = $comp->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php echo e($skill->name); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(count($post) > 0): ?>
                            <div id="recentjobs">
                                <h2 class="view_profile_name my-4">Recently Posted Jobs</h2>
                                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>"
                                        class="recentlyPostedJobsContent">
                                        <div class="theme_box_2 p-3 mb-4">
                                            <div>
                                                <div class="d-md-flex mb-3">
                                                    <div class="me-3 mb-2 mb-md-0">
                                                        <?php if(isset($row->banner)): ?>
                                                            <img src="<?php echo e(asset('storage/' . $row->banner)); ?>"
                                                                alt="" class="candidate_thumb rounded-50">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('images/profile-img.svg')); ?>"
                                                                alt="" class="candidate_thumb rounded-50">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <p class="view_profile_destination mb-1"><?php echo e($row->post); ?></p>
                                                        <h4 class="view_profile_description"><?php echo \Illuminate\Support\Str::limit($row->description, 150, $end = '...'); ?></h4>
                                                    </div>
                                                </div>
                                                <ul class="d-flex flex-column flex-wrap flex-lg-row align-items-lg-center justify-content-center profile_view_info"
                                                    style='gap: 16px'>
                                                    <li class="d-flex align-items-center">
                                                        <svg id="ic_date" xmlns="http://www.w3.org/2000/svg"
                                                            width="20" height="20" viewBox="0 0 20 20">
                                                            <path id="Shape"
                                                                d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,0,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                                                fill="#92929d"></path>
                                                        </svg>
                                                        <span><?php echo e(\Carbon\Carbon::parse($row->created_at)->isoFormat('DD MMM YYYY')); ?></span>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.182"
                                                            height="23" viewBox="0 0 19.182 23">
                                                            <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                                transform="translate(1 1)">
                                                                <path id="Path_3207" data-name="Path 3207"
                                                                    d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                                    transform="translate(-4.5 -1.5)" fill="none"
                                                                    stroke="#92929d" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"></path>
                                                                <path id="Path_3208" data-name="Path 3208"
                                                                    d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                    transform="translate(-7.159 -4.313)" fill="none"
                                                                    stroke="#92929d" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"></path>
                                                            </g>
                                                        </svg>
                                                        <span class="shortName"
                                                            style="width: 70px;"><?php echo e($row->location); ?></span>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <span>Posted by :</span>
                                                        <span><img
                                                                src="<?php echo e(asset('storage/' . $row->company->logo)); ?>"
                                                                alt="" class="rounded-50 rounded_img_xxm"></span>
                                                        <span class="text_primary"><?php echo e($row->company->name); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="text-center mt-5">
                                <a href="#" class="view_profile_button px-5" id="loadMore">Load
                                    More</a>
                            </div>
                        <?php else: ?>
                            <div id="recentjobs">
                                <h2 class="view_profile_name my-4">Recently Posted Jobs</h2>
                                <p>No Jobs Found</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="col-lg-3 ">
                    <div class="view_profile_box p-3">
                        <h2 class="view_profile_name mb-3" style="color: #333;">Other Employer</h2>
                        <ul class="views_others_box_list">
                            <?php $__currentLoopData = $compAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('job.details', $row->slug)); ?>"
                                        class="views_others_box d-flex align-items-center">
                                        <div class="view_profile_candidates">
                                            <?php if($row->logo != null): ?>
                                                <img class="" src="<?php echo e(asset('storage/' . $row->logo)); ?>"
                                                    alt="">
                                            <?php else: ?>
                                                <img class=""
                                                    src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                    alt="">
                                            <?php endif; ?>
                                            
                                        </div>
                                        <div>
                                            <h4 class="shortName" style="width: 100px;"><?php echo e($row->name); ?></h4>
                                            
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <a href="<?php echo e(route('employer.list')); ?>" class="view_profile_button d-block text-center mt-4">View
                            all</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="newModal<?php echo e($comp->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-md-4 py-3">
                    <p class="text-center fs-4" style="font-weight:600;">
                        Are you really want
                        to
                        delete?
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <a class="btn btn-danger" id="delete-edu" href="<?php echo e(route('recruiters.reject', $comp->id)); ?>">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
    <script>
        $(document).ready(function() {
            let content = $(".recentlyPostedJobsContent");
            if (content.length <= 4) {
                $("#loadMore").hide();
            }
            $(".recentlyPostedJobsContent").slice(0, 4).show();
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".recentlyPostedJobsContent:hidden").slice(0, 4).slideDown();
                if ($(".recentlyPostedJobsContent:hidden").length == 0) {
                    $("#loadMore").hide();
                }
                if ($(".recentlyPostedJobsContent").length <= 4) {
                    $("#loadMore").hide();
                }

            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/job/details.blade.php ENDPATH**/ ?>