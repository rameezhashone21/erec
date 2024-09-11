<?php $__env->startSection('content'); ?>
    <div class="pt__banner"></div>
    <section class="position-relative">
        <?php
            $url = asset('storage/' . $user->banner);
            $response = Http::head($url);
        ?>
        <?php if($response->status() != 404 && isset($user->banner)): ?>
            <img src="<?php echo e(asset('storage/' . $user->banner)); ?>" alt="profile-img" class="w-100 banner__image"
                id="imagePreview">
        <?php else: ?>
            <img src="<?php echo e(asset('dashboard/images/candidate.png')); ?>" alt="" class="w-100 banner__image">
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
                                <?php if(isset($user->candidate)): ?>
                                    <?php if($user->avatar != null): ?>
                                        <img class="" src="<?php echo e(asset('storage/' . $user->avatar)); ?>"
                                            alt="">
                                    <?php else: ?>
                                        <img class="" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                            alt="">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img class="" src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                        alt="">
                                <?php endif; ?>

                            </div>
                            <h3 class="view_profile_name">
                                <?php echo e($user->candidate->first_name . ' ' . $user->candidate->last_name); ?>

                            </h3>
                            <?php if($user->candidate->tagline != null): ?>
                                <p class="mb-0 px-3 fs-14">
                                    <?php echo e($user->candidate->tagline); ?>

                                </p>
                            <?php endif; ?>
                            <p class="mb-0 px-3 fs-14">
                                <?php if(isset($user->candidatePro) && count($user->candidatePro) > 0): ?>
                                    <?php echo e($user->candidatePro[0]->designation); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                        <div>
                            <p class="mb-2 px-3 fs-14 text-center fw-bolder">Candidate</p>
                        </div>
                        <div class="mt-4 px-3">
                            <h3 class="view_profile_txt">Contact Details</h3>

                        </div>

                        <ul class="side_bar_menu view_profile_sidebar px-3" id="side_bar_view">
                            <?php if($user->candidate->address != null): ?>
                                <?php if($user->candidate->address_status == 'Public'): ?>
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
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                        <path id="Path_3208" data-name="Path 3208"
                                                            d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                            transform="translate(-7.159 -4.313)" fill="none"
                                                            stroke="#92929d" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <?php if(Auth::check()): ?>
                                                <span><?php echo e($user->candidate->address); ?></span>
                                            <?php else: ?>
                                                <span style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                    ;><?php echo e($user->candidate->address); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php elseif($user->candidate->address_status == 'Employers'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                                        viewBox="0 0 19.182 23">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(1 1)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                                transform="translate(-4.5 -1.5)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-7.159 -4.313)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->address); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->address); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->address_status == 'Recruiters'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'rec'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                                        viewBox="0 0 19.182 23">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(1 1)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                                transform="translate(-4.5 -1.5)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-7.159 -4.313)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->address); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->address); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->address_status == 'Employers/Recruiters'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'rec' or Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                                        viewBox="0 0 19.182 23">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(1 1)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                                transform="translate(-4.5 -1.5)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-7.159 -4.313)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->address); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->address); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->address_status == 'Only Me'): ?>
                                    <?php if(Auth::check() and auth()->user()->id == $user->id): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                                        viewBox="0 0 19.182 23">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(1 1)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                                transform="translate(-4.5 -1.5)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-7.159 -4.313)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->address); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->address); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($user->candidate->email != null): ?>
                                <?php if($user->candidate->email_status == 'Public'): ?>
                                    <li>
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <span>
                                                <i class="fas fa-envelope fs-5" style="color: #92929d;"></i>
                                            </span>
                                            <?php if(Auth::check()): ?>
                                                <span class="word-break-all"><?php echo e($user->candidate->email); ?></span>
                                            <?php else: ?>
                                                <span
                                                    style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                    ;><?php echo e($user->candidate->email); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php elseif($user->candidate->email_status == 'Employers'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <i class="fas fa-envelope fs-5" style="color: #92929d;"></i>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->email); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->email); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->email_status == 'Recruiters'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'rec'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <i class="fas fa-envelope fs-5" style="color: #92929d;"></i>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->email); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->email); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->email_status == 'Employers/Recruiters'): ?>
                                    <?php if(Auth::check() and auth()->user()->role == 'rec' or Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <i class="fas fa-envelope fs-5" style="color: #92929d;"></i>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->email); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->email); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->email_status == 'Only Me'): ?>
                                    <?php if(Auth::check() and auth()->user()->id == $user->id): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <i class="fas fa-envelope fs-5" style="color: #92929d;"></i>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->email); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                                                        ;><?php echo e($user->candidate->email); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($user->candidate->number != null): ?>
                                <?php if($user->candidate->phone_status == 'Public'): ?>
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
                                                <span><?php echo e($user->candidate->country_code . ' ' . $user->candidate->number); ?></span>
                                            <?php else: ?>
                                                
                                                <span>
                                                    <?php echo e(\Illuminate\Support\Str::limit($user->candidate->country_code . ' ' . $user->candidate->number, 6, $end = '****')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php elseif($user->candidate->phone_status == 'Employers'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.405"
                                                        height="18.398" viewBox="0 0 18.405 18.398">
                                                        <path id="phone"
                                                            d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                            transform="translate(-3.364 -3.375)" fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->country_code . ' ' . $user->candidate->number); ?></span>
                                                <?php else: ?>
                                                    <?php echo e(\Illuminate\Support\Str::limit($user->candidate->country_code . ' ' . $user->candidate->number, 6, $end = '****')); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->phone_status == 'Recruiters'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'rec'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.405"
                                                        height="18.398" viewBox="0 0 18.405 18.398">
                                                        <path id="phone"
                                                            d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                            transform="translate(-3.364 -3.375)" fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->country_code . ' ' . $user->candidate->number); ?></span>
                                                <?php else: ?>
                                                    <?php echo e(\Illuminate\Support\Str::limit($user->candidate->country_code . ' ' . $user->candidate->number, 6, $end = '****')); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->phone_status == 'Employers/Recruiters'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'rec' or Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.405"
                                                        height="18.398" viewBox="0 0 18.405 18.398">
                                                        <path id="phone"
                                                            d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                            transform="translate(-3.364 -3.375)" fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <?php if(Auth::check()): ?>
                                                    <span><?php echo e($user->candidate->country_code . ' ' . $user->candidate->number); ?></span>
                                                <?php else: ?>
                                                    <?php echo e(\Illuminate\Support\Str::limit($user->candidate->country_code . ' ' . $user->candidate->number, 6, $end = '****')); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->phone_status == 'Only Me'): ?>
                                    <?php if(Auth::check() and auth()->user()->id == $user->id): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.405"
                                                        height="18.398" viewBox="0 0 18.405 18.398">
                                                        <path id="phone"
                                                            d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                            transform="translate(-3.364 -3.375)" fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <?php if(check::Auth()): ?>
                                                    <span><?php echo e($user->candidate->country_code . ' ' . $user->candidate->number); ?></span>
                                                <?php else: ?>
                                                    <?php echo e(\Illuminate\Support\Str::limit($user->candidate->country_code . ' ' . $user->candidate->number, 6, $end = '****')); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li>
                                <a href="javascript:;" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <g id="ic_date" transform="translate(0 -0.388)">
                                                <path id="Shape"
                                                    d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,1,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                                    transform="translate(0 0.388)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>Joined
                                        <?php echo e(\Carbon\Carbon::parse($user->created_at)->formatLocalized('%b %Y')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="ic_Working" transform="translate(0 -0.014)">
                                                <g id="Working_at" data-name="Working at">
                                                    <rect id="Rectangle_24" data-name="Rectangle 24" width="24"
                                                        height="24" transform="translate(0 0.014)" fill="none" />
                                                    <g id="Group_25" data-name="Group 25" transform="translate(1 3)">
                                                        <path id="Combined_Shape" data-name="Combined Shape"
                                                            d="M3,19a3,3,0,0,1-3-3V6A3,3,0,0,1,3,3H6A3,3,0,0,1,9,0h4a3,3,0,0,1,3,3h3a3,3,0,0,1,3,3V16a3,3,0,0,1-3,3Zm16-2a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1h-.5V17Zm-2.5,0V5H5.5V17ZM2,6V16a1,1,0,0,0,1,1h.5V5H3A1,1,0,0,0,2,6ZM14,3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3Z"
                                                            transform="translate(0 0.014)" fill="#92929d" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    
                                    <?php if(isset($user->candidatePro) && count($user->candidatePro) > 0): ?>
                                        <span>Working at <?php echo e($user->candidatePro[0]->company_name); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23.993" height="24"
                                            viewBox="0 0 23.993 24">
                                            <path
                                                d="M22,0H18a1,1,0,0,0,0,2h2.586l-2.4,2.4a6.941,6.941,0,0,0-7.693-.449A6.989,6.989,0,1,0,6,16.92V19H4a1,1,0,0,0,0,2H6v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2H8V16.927a6.934,6.934,0,0,0,2.491-.88A6.986,6.986,0,0,0,19.6,5.816l2.4-2.4V6a1,1,0,0,0,2,0V2A2,2,0,0,0,22,0ZM2,10A4.971,4.971,0,0,1,8.788,5.344a6.956,6.956,0,0,0,0,9.312A4.971,4.971,0,0,1,2,10Zm12,5a5,5,0,1,1,5-5A5,5,0,0,1,14,15Z"
                                                transform="translate(-0.007)" fill="#92929d" />
                                        </svg>
                                    </span>
                                    <span><?php echo e($user->candidate->marital_status); ?></span>
                                </a>
                            </li>
                            <?php if($user->candidate->visa_status != null): ?>
                                <?php if($user->candidate->visa_status_status == 'Public'): ?>
                                    <li>
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.871" height="23.655"
                                                    viewBox="0 0 24.871 23.655">
                                                    <g transform="translate(-2.198 -4.595)">
                                                        <path
                                                            d="M47.661,37.6a5.461,5.461,0,1,0,5.461,5.461A5.466,5.466,0,0,0,47.661,37.6Zm3.82,3.461H49.815a8.428,8.428,0,0,0-.513-2A4.462,4.462,0,0,1,51.481,41.061Zm.513,1.974a4.721,4.721,0,0,1-.077.846H49.943c.026-.282.026-.564.026-.846s0-.564-.026-.846h1.949A4.766,4.766,0,0,1,51.994,43.035Zm-4.333,4.307c-.205,0-.718-.795-.974-2.307H48.61C48.379,46.548,47.892,47.343,47.661,47.343Zm-1.077-3.461c-.026-.282-.026-.538-.026-.846s.026-.59.026-.846h2.179c.026.282.026.538.026.846s-.026.59-.026.846Zm-3.23-.846a4.72,4.72,0,0,1,.077-.846H45.4c-.026.282-.026.564-.026.846s0,.564.026.846H43.431A7.963,7.963,0,0,1,43.354,43.035Zm4.307-4.307c.205,0,.718.795.974,2.307H46.712C46.969,39.523,47.456,38.728,47.661,38.728Zm-1.59.333a8.428,8.428,0,0,0-.513,2H43.892A4.256,4.256,0,0,1,46.071,39.061Zm-2.2,5.974h1.667a8.428,8.428,0,0,0,.513,2A4.462,4.462,0,0,1,43.867,45.035Zm5.41,2a8.428,8.428,0,0,0,.513-2h1.667A4.256,4.256,0,0,1,49.276,47.035Z"
                                                            transform="translate(-29.559 -24.317)" fill="#92929d"
                                                            stroke="#92929d" stroke-width="0.5" />
                                                        <path
                                                            d="M23.614,9.438h-4.23l1.41-.744a1.793,1.793,0,0,0,.949-1.308,1.905,1.905,0,0,0-.923-1.9,3.935,3.935,0,0,0-4.1-.026L13.692,7.207,8.975,5.335a1.041,1.041,0,0,0-.872.051l-1.026.564a1.066,1.066,0,0,0-.538.846.973.973,0,0,0,.436.9L9.693,9.617,6.154,11.668,4.488,10.95a1.009,1.009,0,0,0-.9.051L3,11.309a1.066,1.066,0,0,0-.538.744.989.989,0,0,0,.282.872l2.307,2.307a2.1,2.1,0,0,0,1.461.615,1.693,1.693,0,0,0,.359-.026,1.934,1.934,0,0,0,.615-.205l1.9-1V24.8a3.206,3.206,0,0,0,3.2,3.2H23.614a3.206,3.206,0,0,0,3.2-3.2V12.642A3.206,3.206,0,0,0,23.614,9.438ZM6.975,14.591a.918.918,0,0,1-.282.1,1,1,0,0,1-.82-.256l-2.2-2.2.41-.205,1.615.692a1.2,1.2,0,0,0,1.1-.077l4.23-2.513a.6.6,0,0,0,.282-.461.563.563,0,0,0-.231-.487L7.8,6.848l.846-.436,4.641,1.872a1.225,1.225,0,0,0,1.077-.077l2.948-1.743a2.789,2.789,0,0,1,2.923.026h0a.812.812,0,0,1,.41.744.775.775,0,0,1-.359.487Zm18.691,10.23A2.084,2.084,0,0,1,23.589,26.9H12.615a2.084,2.084,0,0,1-2.077-2.077V14.053l6.615-3.436h6.461a2.084,2.084,0,0,1,2.077,2.077V24.821Z"
                                                            fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <span><?php echo e($user->candidate->visa_status); ?></span>
                                        </a>
                                    </li>
                                <?php elseif($user->candidate->visa_status_status == 'Employers'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.871"
                                                        height="23.655" viewBox="0 0 24.871 23.655">
                                                        <g transform="translate(-2.198 -4.595)">
                                                            <path
                                                                d="M47.661,37.6a5.461,5.461,0,1,0,5.461,5.461A5.466,5.466,0,0,0,47.661,37.6Zm3.82,3.461H49.815a8.428,8.428,0,0,0-.513-2A4.462,4.462,0,0,1,51.481,41.061Zm.513,1.974a4.721,4.721,0,0,1-.077.846H49.943c.026-.282.026-.564.026-.846s0-.564-.026-.846h1.949A4.766,4.766,0,0,1,51.994,43.035Zm-4.333,4.307c-.205,0-.718-.795-.974-2.307H48.61C48.379,46.548,47.892,47.343,47.661,47.343Zm-1.077-3.461c-.026-.282-.026-.538-.026-.846s.026-.59.026-.846h2.179c.026.282.026.538.026.846s-.026.59-.026.846Zm-3.23-.846a4.72,4.72,0,0,1,.077-.846H45.4c-.026.282-.026.564-.026.846s0,.564.026.846H43.431A7.963,7.963,0,0,1,43.354,43.035Zm4.307-4.307c.205,0,.718.795.974,2.307H46.712C46.969,39.523,47.456,38.728,47.661,38.728Zm-1.59.333a8.428,8.428,0,0,0-.513,2H43.892A4.256,4.256,0,0,1,46.071,39.061Zm-2.2,5.974h1.667a8.428,8.428,0,0,0,.513,2A4.462,4.462,0,0,1,43.867,45.035Zm5.41,2a8.428,8.428,0,0,0,.513-2h1.667A4.256,4.256,0,0,1,49.276,47.035Z"
                                                                transform="translate(-29.559 -24.317)" fill="#92929d"
                                                                stroke="#92929d" stroke-width="0.5" />
                                                            <path
                                                                d="M23.614,9.438h-4.23l1.41-.744a1.793,1.793,0,0,0,.949-1.308,1.905,1.905,0,0,0-.923-1.9,3.935,3.935,0,0,0-4.1-.026L13.692,7.207,8.975,5.335a1.041,1.041,0,0,0-.872.051l-1.026.564a1.066,1.066,0,0,0-.538.846.973.973,0,0,0,.436.9L9.693,9.617,6.154,11.668,4.488,10.95a1.009,1.009,0,0,0-.9.051L3,11.309a1.066,1.066,0,0,0-.538.744.989.989,0,0,0,.282.872l2.307,2.307a2.1,2.1,0,0,0,1.461.615,1.693,1.693,0,0,0,.359-.026,1.934,1.934,0,0,0,.615-.205l1.9-1V24.8a3.206,3.206,0,0,0,3.2,3.2H23.614a3.206,3.206,0,0,0,3.2-3.2V12.642A3.206,3.206,0,0,0,23.614,9.438ZM6.975,14.591a.918.918,0,0,1-.282.1,1,1,0,0,1-.82-.256l-2.2-2.2.41-.205,1.615.692a1.2,1.2,0,0,0,1.1-.077l4.23-2.513a.6.6,0,0,0,.282-.461.563.563,0,0,0-.231-.487L7.8,6.848l.846-.436,4.641,1.872a1.225,1.225,0,0,0,1.077-.077l2.948-1.743a2.789,2.789,0,0,1,2.923.026h0a.812.812,0,0,1,.41.744.775.775,0,0,1-.359.487Zm18.691,10.23A2.084,2.084,0,0,1,23.589,26.9H12.615a2.084,2.084,0,0,1-2.077-2.077V14.053l6.615-3.436h6.461a2.084,2.084,0,0,1,2.077,2.077V24.821Z"
                                                                fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span><?php echo e($user->candidate->visa_status); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->visa_status_status == 'Recruiters'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'rec'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.871"
                                                        height="23.655" viewBox="0 0 24.871 23.655">
                                                        <g transform="translate(-2.198 -4.595)">
                                                            <path
                                                                d="M47.661,37.6a5.461,5.461,0,1,0,5.461,5.461A5.466,5.466,0,0,0,47.661,37.6Zm3.82,3.461H49.815a8.428,8.428,0,0,0-.513-2A4.462,4.462,0,0,1,51.481,41.061Zm.513,1.974a4.721,4.721,0,0,1-.077.846H49.943c.026-.282.026-.564.026-.846s0-.564-.026-.846h1.949A4.766,4.766,0,0,1,51.994,43.035Zm-4.333,4.307c-.205,0-.718-.795-.974-2.307H48.61C48.379,46.548,47.892,47.343,47.661,47.343Zm-1.077-3.461c-.026-.282-.026-.538-.026-.846s.026-.59.026-.846h2.179c.026.282.026.538.026.846s-.026.59-.026.846Zm-3.23-.846a4.72,4.72,0,0,1,.077-.846H45.4c-.026.282-.026.564-.026.846s0,.564.026.846H43.431A7.963,7.963,0,0,1,43.354,43.035Zm4.307-4.307c.205,0,.718.795.974,2.307H46.712C46.969,39.523,47.456,38.728,47.661,38.728Zm-1.59.333a8.428,8.428,0,0,0-.513,2H43.892A4.256,4.256,0,0,1,46.071,39.061Zm-2.2,5.974h1.667a8.428,8.428,0,0,0,.513,2A4.462,4.462,0,0,1,43.867,45.035Zm5.41,2a8.428,8.428,0,0,0,.513-2h1.667A4.256,4.256,0,0,1,49.276,47.035Z"
                                                                transform="translate(-29.559 -24.317)" fill="#92929d"
                                                                stroke="#92929d" stroke-width="0.5" />
                                                            <path
                                                                d="M23.614,9.438h-4.23l1.41-.744a1.793,1.793,0,0,0,.949-1.308,1.905,1.905,0,0,0-.923-1.9,3.935,3.935,0,0,0-4.1-.026L13.692,7.207,8.975,5.335a1.041,1.041,0,0,0-.872.051l-1.026.564a1.066,1.066,0,0,0-.538.846.973.973,0,0,0,.436.9L9.693,9.617,6.154,11.668,4.488,10.95a1.009,1.009,0,0,0-.9.051L3,11.309a1.066,1.066,0,0,0-.538.744.989.989,0,0,0,.282.872l2.307,2.307a2.1,2.1,0,0,0,1.461.615,1.693,1.693,0,0,0,.359-.026,1.934,1.934,0,0,0,.615-.205l1.9-1V24.8a3.206,3.206,0,0,0,3.2,3.2H23.614a3.206,3.206,0,0,0,3.2-3.2V12.642A3.206,3.206,0,0,0,23.614,9.438ZM6.975,14.591a.918.918,0,0,1-.282.1,1,1,0,0,1-.82-.256l-2.2-2.2.41-.205,1.615.692a1.2,1.2,0,0,0,1.1-.077l4.23-2.513a.6.6,0,0,0,.282-.461.563.563,0,0,0-.231-.487L7.8,6.848l.846-.436,4.641,1.872a1.225,1.225,0,0,0,1.077-.077l2.948-1.743a2.789,2.789,0,0,1,2.923.026h0a.812.812,0,0,1,.41.744.775.775,0,0,1-.359.487Zm18.691,10.23A2.084,2.084,0,0,1,23.589,26.9H12.615a2.084,2.084,0,0,1-2.077-2.077V14.053l6.615-3.436h6.461a2.084,2.084,0,0,1,2.077,2.077V24.821Z"
                                                                fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span><?php echo e($user->candidate->visa_status); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->visa_status_status == 'Employers/Recruiters'): ?>
                                    <?php if(auth()->check() && auth()->user()->role == 'rec' or Auth::check() and auth()->user()->role == 'company'): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.871"
                                                        height="23.655" viewBox="0 0 24.871 23.655">
                                                        <g transform="translate(-2.198 -4.595)">
                                                            <path
                                                                d="M47.661,37.6a5.461,5.461,0,1,0,5.461,5.461A5.466,5.466,0,0,0,47.661,37.6Zm3.82,3.461H49.815a8.428,8.428,0,0,0-.513-2A4.462,4.462,0,0,1,51.481,41.061Zm.513,1.974a4.721,4.721,0,0,1-.077.846H49.943c.026-.282.026-.564.026-.846s0-.564-.026-.846h1.949A4.766,4.766,0,0,1,51.994,43.035Zm-4.333,4.307c-.205,0-.718-.795-.974-2.307H48.61C48.379,46.548,47.892,47.343,47.661,47.343Zm-1.077-3.461c-.026-.282-.026-.538-.026-.846s.026-.59.026-.846h2.179c.026.282.026.538.026.846s-.026.59-.026.846Zm-3.23-.846a4.72,4.72,0,0,1,.077-.846H45.4c-.026.282-.026.564-.026.846s0,.564.026.846H43.431A7.963,7.963,0,0,1,43.354,43.035Zm4.307-4.307c.205,0,.718.795.974,2.307H46.712C46.969,39.523,47.456,38.728,47.661,38.728Zm-1.59.333a8.428,8.428,0,0,0-.513,2H43.892A4.256,4.256,0,0,1,46.071,39.061Zm-2.2,5.974h1.667a8.428,8.428,0,0,0,.513,2A4.462,4.462,0,0,1,43.867,45.035Zm5.41,2a8.428,8.428,0,0,0,.513-2h1.667A4.256,4.256,0,0,1,49.276,47.035Z"
                                                                transform="translate(-29.559 -24.317)" fill="#92929d"
                                                                stroke="#92929d" stroke-width="0.5" />
                                                            <path
                                                                d="M23.614,9.438h-4.23l1.41-.744a1.793,1.793,0,0,0,.949-1.308,1.905,1.905,0,0,0-.923-1.9,3.935,3.935,0,0,0-4.1-.026L13.692,7.207,8.975,5.335a1.041,1.041,0,0,0-.872.051l-1.026.564a1.066,1.066,0,0,0-.538.846.973.973,0,0,0,.436.9L9.693,9.617,6.154,11.668,4.488,10.95a1.009,1.009,0,0,0-.9.051L3,11.309a1.066,1.066,0,0,0-.538.744.989.989,0,0,0,.282.872l2.307,2.307a2.1,2.1,0,0,0,1.461.615,1.693,1.693,0,0,0,.359-.026,1.934,1.934,0,0,0,.615-.205l1.9-1V24.8a3.206,3.206,0,0,0,3.2,3.2H23.614a3.206,3.206,0,0,0,3.2-3.2V12.642A3.206,3.206,0,0,0,23.614,9.438ZM6.975,14.591a.918.918,0,0,1-.282.1,1,1,0,0,1-.82-.256l-2.2-2.2.41-.205,1.615.692a1.2,1.2,0,0,0,1.1-.077l4.23-2.513a.6.6,0,0,0,.282-.461.563.563,0,0,0-.231-.487L7.8,6.848l.846-.436,4.641,1.872a1.225,1.225,0,0,0,1.077-.077l2.948-1.743a2.789,2.789,0,0,1,2.923.026h0a.812.812,0,0,1,.41.744.775.775,0,0,1-.359.487Zm18.691,10.23A2.084,2.084,0,0,1,23.589,26.9H12.615a2.084,2.084,0,0,1-2.077-2.077V14.053l6.615-3.436h6.461a2.084,2.084,0,0,1,2.077,2.077V24.821Z"
                                                                fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span><?php echo e($user->candidate->visa_status); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($user->candidate->visa_status_status == 'Only Me'): ?>
                                    <?php if(Auth::check() and auth()->user()->id == $user->id): ?>
                                        <li>
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.871"
                                                        height="23.655" viewBox="0 0 24.871 23.655">
                                                        <g transform="translate(-2.198 -4.595)">
                                                            <path
                                                                d="M47.661,37.6a5.461,5.461,0,1,0,5.461,5.461A5.466,5.466,0,0,0,47.661,37.6Zm3.82,3.461H49.815a8.428,8.428,0,0,0-.513-2A4.462,4.462,0,0,1,51.481,41.061Zm.513,1.974a4.721,4.721,0,0,1-.077.846H49.943c.026-.282.026-.564.026-.846s0-.564-.026-.846h1.949A4.766,4.766,0,0,1,51.994,43.035Zm-4.333,4.307c-.205,0-.718-.795-.974-2.307H48.61C48.379,46.548,47.892,47.343,47.661,47.343Zm-1.077-3.461c-.026-.282-.026-.538-.026-.846s.026-.59.026-.846h2.179c.026.282.026.538.026.846s-.026.59-.026.846Zm-3.23-.846a4.72,4.72,0,0,1,.077-.846H45.4c-.026.282-.026.564-.026.846s0,.564.026.846H43.431A7.963,7.963,0,0,1,43.354,43.035Zm4.307-4.307c.205,0,.718.795.974,2.307H46.712C46.969,39.523,47.456,38.728,47.661,38.728Zm-1.59.333a8.428,8.428,0,0,0-.513,2H43.892A4.256,4.256,0,0,1,46.071,39.061Zm-2.2,5.974h1.667a8.428,8.428,0,0,0,.513,2A4.462,4.462,0,0,1,43.867,45.035Zm5.41,2a8.428,8.428,0,0,0,.513-2h1.667A4.256,4.256,0,0,1,49.276,47.035Z"
                                                                transform="translate(-29.559 -24.317)" fill="#92929d"
                                                                stroke="#92929d" stroke-width="0.5" />
                                                            <path
                                                                d="M23.614,9.438h-4.23l1.41-.744a1.793,1.793,0,0,0,.949-1.308,1.905,1.905,0,0,0-.923-1.9,3.935,3.935,0,0,0-4.1-.026L13.692,7.207,8.975,5.335a1.041,1.041,0,0,0-.872.051l-1.026.564a1.066,1.066,0,0,0-.538.846.973.973,0,0,0,.436.9L9.693,9.617,6.154,11.668,4.488,10.95a1.009,1.009,0,0,0-.9.051L3,11.309a1.066,1.066,0,0,0-.538.744.989.989,0,0,0,.282.872l2.307,2.307a2.1,2.1,0,0,0,1.461.615,1.693,1.693,0,0,0,.359-.026,1.934,1.934,0,0,0,.615-.205l1.9-1V24.8a3.206,3.206,0,0,0,3.2,3.2H23.614a3.206,3.206,0,0,0,3.2-3.2V12.642A3.206,3.206,0,0,0,23.614,9.438ZM6.975,14.591a.918.918,0,0,1-.282.1,1,1,0,0,1-.82-.256l-2.2-2.2.41-.205,1.615.692a1.2,1.2,0,0,0,1.1-.077l4.23-2.513a.6.6,0,0,0,.282-.461.563.563,0,0,0-.231-.487L7.8,6.848l.846-.436,4.641,1.872a1.225,1.225,0,0,0,1.077-.077l2.948-1.743a2.789,2.789,0,0,1,2.923.026h0a.812.812,0,0,1,.41.744.775.775,0,0,1-.359.487Zm18.691,10.23A2.084,2.084,0,0,1,23.589,26.9H12.615a2.084,2.084,0,0,1-2.077-2.077V14.053l6.615-3.436h6.461a2.084,2.084,0,0,1,2.077,2.077V24.821Z"
                                                                fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span><?php echo e($user->candidate->visa_status); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <?php if(Auth::check()): ?>
                            <?php if(auth()->user()->role == 'rec' || auth()->user()->role == 'company'): ?>
                                <?php if(isset($user->resume) && count($user->resume) > 0): ?>
                                    <div class="border-bottom">
                                        <div class="mt-4 mb-3 px-3">
                                            <h3 class="view_profile_txt">Download CV</h3>
                                        </div>
                                        <a href="<?php echo e(asset('candidateDoc/doc/' . $user->resume[0]->document)); ?>"
                                            class="d-flex align-items-center justify-content-center view_profile_button mx-3"
                                            target="_blank">
                                            <span>
                                                Resume
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20"
                                                    viewBox="0 0 16 20">
                                                    <g id="bxs-file-pdf" transform="translate(-6 -3)">
                                                        <path id="Path_3235" data-name="Path 3235"
                                                            d="M12.214,22.02a1.5,1.5,0,0,0-.372.036v1.178a1.361,1.361,0,0,0,.3.023c.479,0,.774-.242.774-.651,0-.366-.254-.586-.7-.586Zm3.487.012a1.839,1.839,0,0,0-.407.036v2.61a1.631,1.631,0,0,0,.313.018,1.236,1.236,0,0,0,1.349-1.4A1.144,1.144,0,0,0,15.7,22.032Z"
                                                            transform="translate(-1.947 -6.34)" fill="#fff" />
                                                        <path id="Path_3236" data-name="Path 3236"
                                                            d="M16,3H8A2,2,0,0,0,6,5V21a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V9ZM11.5,17.19a1.854,1.854,0,0,1-1.3.42,2.23,2.23,0,0,1-.308-.018v1.426H9V15.082A7.558,7.558,0,0,1,10.219,15a1.915,1.915,0,0,1,1.22.319,1.17,1.17,0,0,1,.426.923,1.285,1.285,0,0,1-.367.948ZM15.3,18.545a2.864,2.864,0,0,1-1.84.515A7.7,7.7,0,0,1,12.441,19V15.083A7.947,7.947,0,0,1,13.66,15a2.566,2.566,0,0,1,1.633.426,1.766,1.766,0,0,1,.675,1.5,2.022,2.022,0,0,1-.663,1.615ZM19,15.77H17.468v.911H18.9v.734H17.468v1.6h-.906V15.03H19ZM16,10H15V5l5,5Z"
                                                            fill="#fff" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class=" d-flex justify-content-around view_profile_socials  mt-4 px-3">

                            <?php if($user->candidate->facbookLink == !null): ?>
                                <a href="<?php echo e($user->candidate->facbookLink); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.428" height="20"
                                        viewBox="0 0 11.428 20">
                                        <path id="facebook"
                                            d="M1428,16l-2.741,0c-3.079,0-5.069,1.932-5.069,4.923v2.268h-2.756a.421.421,0,0,0-.431.409v3.288a.419.419,0,0,0,.431.406h2.756v8.3a.419.419,0,0,0,.431.407h3.6a.419.419,0,0,0,.431-.407v-8.3h3.222a.419.419,0,0,0,.431-.406V23.6a.4.4,0,0,0-.126-.289.446.446,0,0,0-.3-.12h-3.223V21.265c0-.925.233-1.395,1.506-1.395H1428a.42.42,0,0,0,.43-.409V16.408A.42.42,0,0,0,1428,16Z"
                                            transform="translate(-1417 -15.996)" fill="#007ba7" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if($user->candidate->instagramLink == !null): ?>
                                <a href="<?php echo e($user->candidate->instagramLink); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20">
                                        <path id="instagram"
                                            d="M13.333,10A3.335,3.335,0,0,0,10,6.667,3.335,3.335,0,0,0,6.667,10,3.335,3.335,0,0,0,10,13.333,3.335,3.335,0,0,0,13.333,10Zm1.8,0A5.112,5.112,0,0,1,10,15.13,5.112,5.112,0,0,1,4.87,10,5.112,5.112,0,0,1,10,4.87,5.112,5.112,0,0,1,15.13,10Zm1.406-5.338a1.2,1.2,0,1,1-2.044-.846,1.2,1.2,0,0,1,2.044.846ZM10,1.8,9,1.79q-.9-.007-1.374,0t-1.257.039a10.268,10.268,0,0,0-1.341.13A5.175,5.175,0,0,0,4.1,2.2,3.405,3.405,0,0,0,2.2,4.1a5.225,5.225,0,0,0-.241.931,10.268,10.268,0,0,0-.13,1.341q-.032.788-.039,1.257T1.791,9q.007.905.007,1t-.007,1q-.007.905,0,1.374t.039,1.257a10.268,10.268,0,0,0,.13,1.341,5.194,5.194,0,0,0,.241.93,3.405,3.405,0,0,0,1.9,1.9,5.225,5.225,0,0,0,.931.241,10.268,10.268,0,0,0,1.341.13q.788.032,1.257.039t1.374,0l1-.007,1,.007q.905.007,1.374,0t1.257-.039a10.267,10.267,0,0,0,1.341-.13A5.226,5.226,0,0,0,15.9,17.8a3.405,3.405,0,0,0,1.9-1.9,5.225,5.225,0,0,0,.241-.931,10.269,10.269,0,0,0,.13-1.341q.032-.788.039-1.257t0-1.374q-.007-.9-.007-1t.007-1q.007-.905,0-1.374t-.039-1.257a10.268,10.268,0,0,0-.13-1.341A5.125,5.125,0,0,0,17.8,4.1a3.405,3.405,0,0,0-1.9-1.9,5.225,5.225,0,0,0-.931-.241,10.268,10.268,0,0,0-1.341-.13q-.788-.032-1.257-.039T11,1.791L10,1.8ZM20,10q0,2.982-.065,4.128a6.108,6.108,0,0,1-1.614,4.193,6.108,6.108,0,0,1-4.193,1.614Q12.982,20,10,20t-4.128-.065a6.108,6.108,0,0,1-4.193-1.614A6.108,6.108,0,0,1,.065,14.128Q0,12.982,0,10T.065,5.872A6.108,6.108,0,0,1,1.679,1.679,6.108,6.108,0,0,1,5.872.065Q7.018,0,10,0t4.128.065a6.108,6.108,0,0,1,4.193,1.614,6.108,6.108,0,0,1,1.614,4.193Q20,7.018,20,10Z"
                                            fill="#007ba7" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if($user->candidate->twitterLink == !null): ?>
                                <a href="<?php echo e($user->candidate->twitterLink); ?>" target="_blank">

                                    <i class="fab fa-twitter fs-5" style="padding-top: 4px; color: #007ba7;"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($user->candidate->linkdinLink == !null): ?>
                                <a href="<?php echo e($user->candidate->linkdinLink); ?>" target="_blank">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.626"
                                        viewBox="0 0 20 18.626">
                                        <path id="linkedIn"
                                            d="M1523.428,16a1.834,1.834,0,0,1,1.464.615,2.434,2.434,0,0,1,.57,1.544,2.1,2.1,0,0,1-2.242,2.172h-.024a2.125,2.125,0,0,1-1.613-.627,2.171,2.171,0,0,1-.594-1.546,2.016,2.016,0,0,1,.655-1.55A2.524,2.524,0,0,1,1523.428,16Zm-2.176,6.047h4.276V34.627h-4.276Zm19.738,5.366v7.212h-4.275V27.9a3.766,3.766,0,0,0-.5-2.063,1.832,1.832,0,0,0-1.673-.776,2.077,2.077,0,0,0-1.436.478,2.827,2.827,0,0,0-.776,1.053,1.863,1.863,0,0,0-.1.465c-.016.168-.024.35-.024.543v7.029h-4.3q.028-3.194.029-5.852V24.511c0-.62-.006-1.149-.016-1.585s-.013-.728-.013-.876h4.3v1.782l-.023.051h.023v-.051a5.058,5.058,0,0,1,.513-.688,3.845,3.845,0,0,1,.769-.669,4.235,4.235,0,0,1,1.1-.51,4.963,4.963,0,0,1,1.483-.2,5.652,5.652,0,0,1,1.952.333,3.966,3.966,0,0,1,1.566,1.049,5.023,5.023,0,0,1,1.034,1.764A7.519,7.519,0,0,1,1540.99,27.416Z"
                                            transform="translate(-1520.99 -16.003)" fill="#007ba7" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6" id="msg-btn">
                    <div class="view_profile_box content_area p-4">
                        <?php if(isset($user->candidate->head_line)): ?>
                            <div class="border-bottom pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <div>
                                    <h2 class="view_profile_name mb-3">About Me</h2>
                                  </div>
                                  <div>
                                    <?php if(auth()->check()): ?>
                                      <?php if(auth()->user()->role == 'company' || auth()->user()->role == 'rec'): ?>
                                          <open-box :openBoxFunction="openBox" :id="<?php echo e($user->id); ?>"></open-box>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                </div>
                                <p><?php echo e($user->candidate->head_line); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($user->candidatePro) && count($user->candidatePro) > 0): ?>
                            <h2 class="view_profile_name my-3">Professional Experience</h2>
                            <ul>
                                <?php $__currentLoopData = $user->candidatePro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border-bottom pb-3 mb-3">
                                        <p class="view_profile_destination mb-1">
                                            <?php echo e($row->designation); ?>

                                        </p>
                                        <h4 class="view_profile_company">
                                            <?php echo e($row->company_name); ?>

                                        </h4>
                                        <ul class="profile_view_info">
                                            <li class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 16 16">
                                                        <path id="Shape"
                                                            d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                            fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php if($row->year_exp != 0): ?>
                                                        <?php if(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') < 1): ?>
                                                        <?php elseif(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') < 2): ?>
                                                            <?php echo e(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y year, %m months')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months')); ?>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <p><?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $row->month_exp)->isoFormat('MMM YY')); ?>

                                                            - Currently working here.</p>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                        viewBox="0 0 15.091 18">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(-3.5 -0.5)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                                fill="none" stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-4.705 -4.687)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php echo e($row->comp_loc); ?>

                                                </span>
                                            </li>
                                        </ul>
                                        <?php if($row->description != null): ?>
                                            <p class="view_profile_description">
                                                <?php echo $row->description; ?>

                                            </p>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <?php if(isset($user->skills) && count($user->skills) > 0): ?>
                            <div class="border-bottom pb-4">
                                <h2 class="view_profile_name mb-3">Skills</h2>
                                <ul class="tags d-flex aling-items-center flex-wrap">
                                    <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($row->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($user->candidateEdu) && count($user->candidateEdu) > 0): ?>
                            <h2 class="view_profile_name my-3">Education</h2>
                            <ul>
                                <?php $__currentLoopData = $user->candidateEdu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border-bottom pb-3 mb-3">
                                        <p class="view_profile_destination mb-1"><?php echo e($row->institute); ?></p>
                                        <h4 class="view_profile_company"><?php echo e($row->education); ?> - <?php echo e($row->course); ?></h4>
                                        <ul class="profile_view_info">
                                            <li class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 16 16">
                                                        <path id="Shape"
                                                            d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                            fill="#92929d" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $row->passing_year)->formatLocalized('%b %Y')); ?>

                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                        viewBox="0 0 15.091 18">
                                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                            transform="translate(-3.5 -0.5)">
                                                            <path id="Path_3207" data-name="Path 3207"
                                                                d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                                fill="none" stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                            <path id="Path_3208" data-name="Path 3208"
                                                                d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                                transform="translate(-4.705 -4.687)" fill="none"
                                                                stroke="#92929d" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php echo e($row->institute_loc); ?>

                                                </span>
                                            </li>
                                        </ul>
                                        <?php if($row->grade != null): ?>
                                            <h4 class="view_profile_company">Grade: <?php echo e($row->grade); ?></h4>
                                        <?php endif; ?>
                                        <?php if($row->description != null): ?>
                                            <p class="view_profile_description">
                                                <?php echo $row->description; ?>

                                            </p>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="view_profile_box p-3">
                        <h2 class="view_profile_name mb-3" style="color: #333;">Other Candidates</h2>
                        <ul class="views_others_box_list">
                            <?php $__currentLoopData = $allCand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('candidate.detail', $row->slug)); ?>"
                                        class="views_others_box d-flex align-items-center">
                                        <div class="view_profile_candidates">
                                            <?php
                                                $url = asset('storage/' . $row->user->avatar);
                                                $response = Http::head($url);
                                            ?>
                                            <?php if($response->status() != 404 && isset($row->user->avatar)): ?>
                                                <?php if($row->user->avatar != null): ?>
                                                    <img class=""
                                                        src="<?php echo e(asset('storage/' . $row->user->avatar)); ?>"
                                                        alt="">
                                                <?php else: ?>
                                                    <img class=""
                                                        src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                        alt="">
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <img class=""
                                                    src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                    alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h4 class="shortName" style="width: 100px;">
                                                <?php echo e($row->first_name . ' ' . $row->last_name); ?>

                                            </h4>
                                            <h5 class="shortName" style="width: 100px;">
                                                <?php if(isset($row->user->candidatePro) && count($row->user->candidatePro) > 0): ?>
                                                    <?php echo e($row->user->candidatePro[0]->designation); ?>

                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <a href="<?php echo e(route('candidates.list')); ?>"
                            class="view_profile_button d-block text-center mt-4">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Documents\erec\resources\views/candidates/show.blade.php ENDPATH**/ ?>