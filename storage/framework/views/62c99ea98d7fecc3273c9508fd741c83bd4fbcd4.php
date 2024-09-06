

<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <form action="<?php echo e(route('job.browse')); ?>">
                <div class="container pt-5 mt-4">
                    <h1 class="fs-48 text-center fw-bold text-uppercase my-md-5 pb-3 pb-md-0"> Browse Jobs </h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-5">
                            <?php if(Auth::check()): ?>
                                <?php if(auth()->user()->role != 'admin'): ?>
                                    <?php if(auth()->user()->role === 'company'): ?>
                                        <a href="<?php echo e(route('company.dashboard')); ?>" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    <?php elseif(auth()->user()->role === 'rec'): ?>
                                        <a href="<?php echo e(route('dashboard')); ?>" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    <?php elseif(auth()->user()->role === 'user'): ?>
                                        <a href="<?php echo e(route('candidate.dashboard')); ?>" class="text-primary">Dashboard</a>
                                        <span>> browse job </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="row row-cols-1 d-block form__search__box search-area mb-3 py-4" id="search_job">
                                <div class="col ">
                                    <div class="position-relative">
                                        <input type="text" name="search" id="search-title" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                             placeholder="Enter Job Title Here"
                                            value="<?php echo e($search); ?>">
                                        <img src="<?php echo e(asset('images/icon-search.svg')); ?>" alt=""
                                            class="img-fluid position-absolute">
                                        <div id="search-title-search"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="position-relative">
                                        <input type="text" name="search_location" id="search-location" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px" 
                                            placeholder="Enter Location Here" value="<?php echo e($search_location); ?>">
                                        <img src="<?php echo e(asset('images/icon-location.svg')); ?>" alt="icon-location"
                                            class="img-fluid position-absolute">
                                        <div id="search-title-location"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-location-hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" name="company" id="search-company" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                             placeholder="Enter Employer Here"
                                            value="<?php echo e($comp); ?>">
                                        <img src="<?php echo e(asset('images/icon-search.svg')); ?>" alt=""
                                            class="img-fluid position-absolute">

                                        <div id="search-title-select"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-select-hide">
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <h2 class="fs-18  mb-0">Job Type</h2>
                                        <a data-bs-toggle="collapse" href="#JobType" role="button"
                                            aria-expanded=" <?php if(count($job_type) > 0): ?> true <?php else: ?> false <?php endif; ?>"
                                            aria-controls="JobType" id="collapseButtonOne" class="">
                                            
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse show <?php if(count($job_type) > 0): ?> show <?php endif; ?>" id="JobType">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Full Time" name="job_type[]" id="job_type"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Full Time'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type">
                                                            Full Time
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Part Time" name="job_type[]" id="job_type1"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Part Time'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type1">
                                                            Part Time
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Contract" name="job_type[]" id="job_type2"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Contract'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type2">
                                                            Contract
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Casual" name="job_type[]" id="job_type3"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Casual'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type3">
                                                            Casual
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Graduate" name="job_type[]" id="job_type4"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Graduate'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type4">
                                                            Graduate
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Trainee" name="job_type[]" id="job_type5"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Trainee'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type5">
                                                            Trainee
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="Apprenticeship" name="job_type[]" id="job_type6"
                                                            <?php $__currentLoopData = $job_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Apprenticeship'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="job_type6">
                                                            Apprenticeship
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Experience Level</h2>
                                        <a data-bs-toggle="collapse" href="#Experience" role="button"
                                            aria-expanded="<?php if(count($exp_level) > 0): ?> true <?php else: ?> false <?php endif; ?>"
                                            aria-controls="Experience" id="collapseButtonOne"
                                            class="<?php if(count($exp_level) <= 0): ?> collapsed <?php endif; ?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse <?php if(count($exp_level) > 0): ?> show <?php endif; ?>" id="Experience">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="6 Months" name="exp_level[]" id="exp_level"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '6 Months'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level">
                                                            6 Months
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="1+ Year" name="exp_level[]" id="exp_level2"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '1+ Year'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level2">
                                                            1+ Year
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="2+ Years" name="exp_level[]" id="exp_level3"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '2+ Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level3">
                                                            2+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="3+ Years" name="exp_level[]" id="exp_level4"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '3+ Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level4">
                                                            3+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="4+ Years" name="exp_level[]" id="exp_level5"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '4+ Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level5">
                                                            4+ Years
                                                        </label>
                                                    </div>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="5+ Years" name="exp_level[]" id="exp_level6"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '5+ Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level6">
                                                            5+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="6+ Years" name="exp_level[]" id="exp_level7"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == '6+ Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level7">
                                                            6+ Years
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center    py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input rounded-pill" type="checkbox"
                                                            value="More than 10 Years" name="exp_level[]" id="exp_level8"
                                                            <?php $__currentLoopData = $exp_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'More than 10 Years'): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <label class="form-check-label" for="exp_level8">
                                                            More than 10 Years
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-area mb-3 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18  mb-0">Job Categories</h2>
                                        <a data-bs-toggle="collapse" href="#job_category" role="button"
                                            aria-expanded="<?php if(count($jobCategory) > 0): ?> true <?php else: ?> false <?php endif; ?>"
                                            aria-controls="job_category" id="collapseButtonOne"
                                            class="<?php if(count($jobCategory) <= 0): ?> collapsed <?php endif; ?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="collapse <?php if(count($jobCategory) > 0): ?> show <?php endif; ?>"
                                        id="job_category">
                                        <div class="mt-3">
                                            <ul id="cat-list">
                                                <?php if($data != null): ?>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li
                                                            class="d-flex justify-content-between align-items-center    py-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input rounded-pill"
                                                                    type="checkbox" value="<?php echo e($row['class_id']); ?>"
                                                                    name="job_cat[]" id="job_cat<?php echo e($row['class_id']); ?>"
                                                                    <?php $__currentLoopData = $jobCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row['class_id'] == $item): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>

                                                                <label class="form-check-label"
                                                                    for="job_cat<?php echo e($row['class_id']); ?>">
                                                                    <?php echo e($row['class_name']); ?>

                                                                </label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button class="login-btn default-btn btn w-100">
                                    <i class="fas fa-filter"></i> Click here - Filter Search
                                </button>
                                <div class="mt-2 text-end">
                                    <a href="javascript:void(0)" class="fs-14" id="resetButton">Reset<i
                                            class="fas fa-sync ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7">
                            <div class="row align-items-center justify-content-between gy-3 mb-4">
                                <div class="col-lg-4">
                                    <h3 class="view_profile_description fs-16 mb-0">Showing
                                        <?php if(count($app) > 0): ?>
                                            1-
                                        <?php endif; ?>
                                        <?php echo e(count($app)); ?> Of <?php echo e($app->total()); ?> Jobs
                                    </h3>
                                </div>
                                <div class="col-lg-7">
                                    <form action="<?php echo e(route('job.browse')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="d-flex justify-content-lg-end">
                                            <div class="me-3">
                                                <select id="role" onchange="this.form.submit()" name="sort_by"
                                                    class="sort_input form-select">
                                                    <option selected value="">All</option>
                                                    <option value="1"
                                                        <?php if($sort == 1): ?> selected <?php endif; ?>>
                                                        Last 24 hours</option>
                                                    <option value="3"
                                                        <?php if($sort == 3): ?> selected <?php endif; ?>>
                                                        Last 3 Days</option>
                                                    <option value="7"
                                                        <?php if($sort == 7): ?> selected <?php endif; ?>>
                                                        Last 7 Days</option>
                                                    <option value="14"
                                                        <?php if($sort == 14): ?> selected <?php endif; ?>>
                                                        Last 14 Days</option>
                                                    <option value="30"
                                                        <?php if($sort == 30): ?> selected <?php endif; ?>>
                                                        Last 30 Days</option>
                                                </select>
                                            </div>
                                            <div>
                                                <select id="role" onchange="this.form.submit()" name="per_page"
                                                    class="sort_input form-select">
                                                    <option value="10"
                                                        <?php if($pg == 10): ?> selected <?php endif; ?>>
                                                        10
                                                        Per Page</option>
                                                    <option value="25"
                                                        <?php if($pg == 25): ?> selected <?php endif; ?>>
                                                        25 Per Page</option>
                                                    <option value="50"
                                                        <?php if($pg == 50): ?> selected <?php endif; ?>>
                                                        50 Per Page</option>
                                                    <option value="100"
                                                        <?php if($pg == 100): ?> selected <?php endif; ?>>
                                                        100 Per Page</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <?php if(count($app) != 0): ?>
                                        <?php $__currentLoopData = $app; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card horizontal-view py-3 mb-3 ps-3">
                                                <div class="card-body row align-items-center justify-content-between">
                                                    <div class="col-lg-7">
                                                        <div class="details">
                                                            <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>">
                                                                <span
                                                                    class="title fw-bold text-theme-primary"><?php echo e($row->post); ?></span>
                                                            </a>
                                                            <h6 class="fw-bold text-theme-primary">
                                                                
                                                                <?php if($row->company != null): ?>
                                                                    <?php echo e($row->company->name); ?>

                                                                <?php endif; ?>
                                                            </h6>
                                                            <p class="fs-14">
                                                                <?php echo \Illuminate\Support\Str::limit($row->description, 150, $end = '...'); ?>

                                                            </p>
                                                            <ul>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Job Type </div>
                                                                    <div class="fs-14"><?php echo e($row->job_type); ?></div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Experience </div>
                                                                    <div class="fs-14"><?php echo e($row->experience); ?></div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Location </div>
                                                                    <div class="fs-14"><?php echo e($row->location); ?> </div>
                                                                </li>
                                                                <?php if(count($row->skills) > 0): ?>
                                                                    <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                        <div class="fs-14">Skills </div>
                                                                        <div class="fs-14 d-flex flex-wrap mt-3 mt-sm-0"
                                                                            style="gap: 14px 10px">
                                                                            <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <span>
                                                                                    <span
                                                                                        id="pointer-alt"><?php echo e($item->name); ?></span>
                                                                                </span>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 align-self-start mt-3 mt-lg-0">
                                                        <div class="btns d-flex flex-column">
                                                            <?php if(auth()->check()): ?>
                                                                
                                                                <?php if(auth()->user()->candidate != null): ?>
                                                                    <?php if(auth()->user()->role == 'user'): ?>
                                                                        <?php if($row->jobApp == '[]'): ?>
                                                                            <a class="btn open-apply-modal default-btn mb-3"
                                                                                id="<?php echo e($row->id); ?>"
                                                                                href="javascript:;">Apply
                                                                                Now</a>
                                                                        <?php else: ?>
                                                                            <button disabled="" style="opacity: 0.5;"
                                                                                class="btn open-apply-modal default-btn w-100 mb-3"
                                                                                id="18"
                                                                                href="javascript:;">Applied</button>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                
                                                            <?php else: ?>
                                                                <a class="btn default-btn mb-3"
                                                                    href="<?php echo e(route('job.session')); ?>">Apply
                                                                    Now</a>
                                                            <?php endif; ?>
                                                            <div
                                                                class="social-btn-sp d-flex justify-content-between align-items-center">
                                                                <?php echo Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin(); ?>

                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mt-3"
                                                                style="gap: 0 20px;">
                                                                
                                                                <?php if($row->company != null): ?>
                                                                    <a href="mailto:<?php echo e($row->company->user->email); ?>"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                <?php elseif($row->recruiter != null): ?>
                                                                    <a href="mailto:<?php echo e($row->recruiter->user->email); ?>"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::check()): ?>
                                                                    <?php if(isset(auth()->user()->candidate)): ?>
                                                                        <?php if(isset(auth()->user()->wishlist($row->id)->post_id)): ?>
                                                                            <div class="wishlist_box-<?php echo e($row->id); ?>">
                                                                                <a href=""
                                                                                    class="icons__box active"
                                                                                    onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                                                                    <i class="fas fa-heart "></i>
                                                                                </a>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="wishlist_box-<?php echo e($row->id); ?>">
                                                                                <a href="" class="icons__box"
                                                                                    onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </a>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('login')); ?>" class="icons__box"><i
                                                                            class="fas fa-heart"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <h3>No Records Found</h3>
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-center pt-5">
                                        <?php echo e($app->appends(request()->except(['page', '_token']))->links()); ?>

                                    </div>
                                    
                                    <?php if(count($appRecommend) != 0): ?>
                                        <h3>Recommended Jobs For You</h3>
                                        <?php $__currentLoopData = $appRecommend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card horizontal-view py-3 mb-3 ps-3">
                                                <div class="card-body row align-items-center justify-content-between">
                                                    <div class="col-lg-7">
                                                        <div class="details">
                                                            <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>">
                                                                <span
                                                                    class="title fw-bold text-theme-primary"><?php echo e($row->post); ?></span>
                                                            </a>
                                                            <h6 class="fw-bold text-theme-primary">
                                                                
                                                                <?php if($row->company != null): ?>
                                                                    <?php echo e($row->company->name); ?>

                                                                <?php endif; ?>
                                                            </h6>
                                                            <p class="fs-14">
                                                                <?php echo \Illuminate\Support\Str::limit($row->description, 150, $end = '...'); ?>

                                                            </p>
                                                            <ul>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Job Type </div>
                                                                    <div class="fs-14"><?php echo e($row->job_type); ?></div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Experience </div>
                                                                    <div class="fs-14"><?php echo e($row->experience); ?></div>
                                                                </li>
                                                                <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                    <div class="fs-14">Location </div>
                                                                    <div class="fs-14"><?php echo e($row->location); ?> </div>
                                                                </li>
                                                                <?php if(count($row->skills) > 0): ?>
                                                                    <li class="d-lg-flex d-md-flex d-sm-flex">
                                                                        <div class="fs-14">Skills </div>
                                                                        <div class="fs-14 d-flex flex-wrap mt-3 mt-sm-0"
                                                                            style="gap: 14px 10px">
                                                                            <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <span>
                                                                                    <span
                                                                                        id="pointer-alt"><?php echo e($item->name); ?></span>
                                                                                </span>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 align-self-start mt-3 mt-lg-0">
                                                        <div class="btns d-flex flex-column">
                                                            <?php if(auth()->check()): ?>
                                                                
                                                                <?php if(auth()->user()->candidate != null): ?>
                                                                    <?php if(auth()->user()->role == 'user'): ?>
                                                                        <?php if($row->jobApp == '[]'): ?>
                                                                            <a class="btn open-apply-modal default-btn mb-3"
                                                                                id="<?php echo e($row->id); ?>"
                                                                                href="javascript:;">Apply
                                                                                Now</a>
                                                                        <?php else: ?>
                                                                            <button disabled="" style="opacity: 0.5;"
                                                                                class="btn open-apply-modal default-btn w-100 mb-3"
                                                                                id="18"
                                                                                href="javascript:;">Applied</button>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                
                                                            <?php else: ?>
                                                                <a class="btn default-btn mb-3"
                                                                    href="<?php echo e(route('job.session')); ?>">Apply
                                                                    Now</a>
                                                            <?php endif; ?>
                                                            <div
                                                                class="social-btn-sp d-flex justify-content-between align-items-center">
                                                                <?php echo Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin(); ?>

                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mt-3"
                                                                style="gap: 0 20px;">
                                                                <?php if($row->company != null): ?>
                                                                    <a href="mailto:<?php echo e($row->company->user->email); ?>"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                <?php elseif($row->recruiter != null): ?>
                                                                    <a href="mailto:<?php echo e($row->recruiter->user->email); ?>"
                                                                        class="icons__box">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::check()): ?>
                                                                    <?php if(isset(auth()->user()->candidate)): ?>
                                                                        <?php if(isset(auth()->user()->wishlist($row->id)->post_id)): ?>
                                                                            <div class="wishlist_box-<?php echo e($row->id); ?>">
                                                                                <a href=""
                                                                                    class="icons__box active"
                                                                                    onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                                                                    <i class="fas fa-heart "></i>
                                                                                </a>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="wishlist_box-<?php echo e($row->id); ?>">
                                                                                <a href="" class="icons__box"
                                                                                    onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </a>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('login')); ?>" class="icons__box"><i
                                                                            class="fas fa-heart"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script>
        function fitTextTitle(id) {
            var value = $("#para-" + id).html();
            console.log(value);
            $("#search-title").val(value);
        }

        function fitTextLoc(id) {
            var value = $("#para-" + id).html();
            console.log(value);
            $("#search-location").val(value);
        }

        function fitText(id) {
            var value = $("#para-" + id).html();
            console.log(value);
            $("#search-company").val(value);
        }
        const searchLogic = function() {

            $("#search-title-search").append("");

            formData = {
                value: $(this).val(),
            }
            // console.log(formData);
            $("#search-title-select").addClass('d-none');
            $("#search-title-location").addClass('d-none');
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('search.title')); ?>",
                data: {
                    value: $('#search-title').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-search").removeClass('d-none');
                $("#search-title-search").html('');
                html = '';
                if (data['title'].length == 0) {
                    $("#search-title-search").html("No Record Found");
                } else {
                    $.each(data['title'], function(index, value) {
                        html +=
                            "<a class='d-block border-bottom py-2 fs-14' href='<?php echo e(route('job.listing.details', '')); ?>/" +
                            value['slug'] +
                            "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")'>" +
                            value['post'] + "</a>";
                    });
                }
                if ($("#search-title").val().length == 0) {
                    $("#search-title-search").addClass('d-none');
                }
                $("#search-title-search").append(html);
                this.value = "";
            });
        }
        const getInterval = setInterval(() => {
            if ($('#search-title').length) {
                $('#search-title').unbind("keydown", searchLogic);
                $('#search-title').on("keydown", searchLogic);
            }
        }, 1000);

        const searchLogic2 = function() {

            $("#search-title-location").append("");

            formData = {
                value: $(this).val(),
            }
            // console.log(formData);
            $("#search-title-search").addClass('d-none');
            $("#search-title-select").addClass('d-none');
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('search.location')); ?>",
                data: {
                    value: $('#search-location').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-location").removeClass('d-none');
                $("#search-title-location").html('');
                html = '';
                if (data['location'].length == 0) {
                    $("#search-title-location").html("Invalid Location");
                } else {
                    $.each(data['location'], function(index, value) {
                        html += "<p class='d-block border-bottom py-2 fs-14 mb-0' id='para-" + value[
                                'id'] +
                            "' onclick='fitTextLoc(" + value['id'] +
                            ")'>" +
                            value['location'] + "</p>";
                    });
                }
                if ($("#search-location").val().length == 0) {
                    $("#search-title-location").addClass('d-none');
                }
                $("#search-title-location").append(html);
                this.value = "";
            });
        }
        const getInterval2 = setInterval(() => {
            if ($('#search-location').length) {
                $('#search-location').unbind("keydown", searchLogic2);
                $('#search-location').on("keydown", searchLogic2);
            }
        }, 1000);

        const searchLogic3 = function() {

            $("#search-title-select").append("");

            formData = {
                value: $(this).val(),
            }
            // console.log(formData);
            $("#search-title-search").addClass('d-none');
            $("#search-title-location").addClass('d-none');
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('search.company')); ?>",
                data: {
                    value: $('#search-company').val(),
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                $("#search-title-select").removeClass('d-none');
                $("#search-title-select").html('');
                html = '';
                if (data['comp'].length == 0) {
                    $("#search-title-select").html("No Employer Found");
                } else {
                    $.each(data['comp'], function(index, value) {
                        html += "<p class='d-block border-bottom py-2 fs-14 mb-0' id='para-" + value[
                                'id'] +
                            "' onclick='fitText(" + value['id'] + ")'>" +
                            value['name'] + "</p>";
                    });
                    if ($("#search-company").val().length == 0) {
                        $("#search-title-select").addClass('d-none');
                    }
                }
                $("#search-title-select").append(html);
                this.value = "";
            });
        }
        const getInterval3 = setInterval(() => {
            if ($('#search-company').length) {
                $('#search-company').unbind("keydown", searchLogic3);
                $('#search-company').on("keydown", searchLogic3);
            }
        }, 1000);



        $(function() {
            $("#search-title-hide").on("click", function(a) {
                // $("#search-title-search").addClass("d-none");
                a.stopPropagation()
            });
            $(document).on("click", function(a) {
                if ($(a.target).is("#search-title-search") === false) {
                    $("#search-title-search").addClass("d-none");
                }
            });
        });
        $(function() {
            $("#search-location-hide").on("click", function(a) {
                // $("#search-title-search").addClass("d-none");
                a.stopPropagation()
            });
            $(document).on("click", function(a) {
                if ($(a.target).is("#search-title-location") === false) {
                    $("#search-title-location").addClass("d-none");
                }
            });
        });
        $(function() {
            $("#search-select-hide").on("click", function(a) {
                // $("#search-title-search").addClass("d-none");
                a.stopPropagation()
            });
            $(document).on("click", function(a) {
                if ($(a.target).is("#search-title-select") === false) {
                    $("#search-title-select").addClass("d-none");
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erec\resources\views/company/jobpost.blade.php ENDPATH**/ ?>