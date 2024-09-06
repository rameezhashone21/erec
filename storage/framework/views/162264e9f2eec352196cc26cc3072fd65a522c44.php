<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4" id="msg-btn">
            <h2 class="fw-500 text_primary fs-5 mb-4">My Employers</h2>
            
            <?php if(count($comp) != 0): ?>
                <div class="row gy-lg-5 gy-4">
                    <div class="col-12">
                        <h2 class="fw-500 text_primary fs-5">New</h2>
                    </div>
                    <?php
                        $checkNullNew = 0;
                    ?>
                    <?php $__currentLoopData = $comp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($row->status != 1): ?>
                            <?php
                                $checkNullNew = 1;
                            ?>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="new-recruter-box d-flex flex-column">
                                    
                                    <?php if(isset($row->company->user->banner)): ?>
                                        <img src="<?php echo e(asset('storage/' . $row->company->user->banner)); ?>"
                                            alt="profile-img" class="user_banner img-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('dashboard/images/Company.png')); ?>" alt=""
                                            class="user_banner img-fluid">
                                    <?php endif; ?>
                                    <?php if($row->company->logo != null): ?>
                                        <img src="<?php echo e(isset($row->company->logo) ? asset('storage/' . $row->company->logo) : asset('images/profile-img.png')); ?>"
                                            alt="profile-img" class="user_logo">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="profile-img"
                                            class="user_logo">
                                    <?php endif; ?>
                                    <div class="text-center px-3 pb-4 my-auto">
                                        <h2 class="title">
                                            <a href="<?php echo e(route('job.details', $row->company->slug)); ?>">
                                                <?php echo e($row->company->name); ?>

                                            </a>
                                        </h2>
                                        <p class="job_type mb-3"><?php echo e($row->company->type); ?></p>
                                        
                                        <?php
                                            $posted_jobs = App\Models\Posts::where('status', 1)
                                                ->where('comp_id', $row->company->id)
                                                ->where('expiry_date', '>=', \Carbon\Carbon::today())
                                                ->count();

                                        ?>
                                        <?php if($posted_jobs > 0): ?>
                                            <p class="job_type">
                                                Open Jobs - (<?php echo e($posted_jobs); ?>)
                                            </p>
                                        <?php else: ?>
                                            
                                            <p class="job_type">No Open Jobs</p>
                                        <?php endif; ?>
                                        <?php if($row->sender != 'rec'): ?>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                            <?php else: ?>
                                                <div class="row row-cols-12 button gx__0 gy-3">
                                        <?php endif; ?>
                                        
                                        <?php if($row->status == 1): ?>
                                            
                                            <div class="col message__button__mt-0">
                                                <open-box :openBoxFunction="openBox"
                                                    :id="<?php echo e($row->company->user->id); ?>"></open-box>
                                            </div>
                                            
                                        <?php else: ?>
                                            <?php if($row->sender != 'rec'): ?>
                                                <div class="col">
                                                    <a href="<?php echo e(route('recruiters.accept', $row->id)); ?>"
                                                        class="view_profile_button d-block w-100 text-center">Accept</a>
                                                </div>
                                                <div class="col">
                                                    <a href="" class="view_profile_button d-block w-100 text-center"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#newModal<?php echo e($row->id); ?>">Ignore</a>
                                                </div>
                                            <?php else: ?>
                                                <button type="button" class="btn default-btn text-center btn-disabled"
                                                    disabled style="padding: 6px 24px, font-size: 14px;"><i
                                                        class="fas fa-user-plus me-1"></i> Request
                                                    Sent
                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="newModal<?php echo e($row->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body py-md-4 py-3">
                                <p class="text-center fs-4" style="font-weight:600;">Are you really want to
                                    delete?
                                </p>
                            </div>
                            <div class="modal-footer border-0 justify-content-center">
                                <a class="btn btn-danger" id="delete-edu"
                                    href="<?php echo e(route('recruiters.reject', $row->id)); ?>">Yes</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($checkNullNew == 0): ?>
                <div class="">
                    No Recruiters are in connection. <a href="<?php echo e(route('recruiter.list')); ?>">Connect
                        recruiters</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="row gy-lg-5 gy-4 mt-4">
            <div class="col-12">
                <h2 class="fw-500 text_primary fs-5">Connected</h2>
            </div>
            <?php
                $checkNullNew = 0;
            ?>
            <?php $__currentLoopData = $comp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($row->status == 1): ?>
                    <?php
                        $checkNullNew = 1;
                    ?>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="new-recruter-box d-flex flex-column">
                            
                            <?php if(isset($row->company->user->banner)): ?>
                                <img src="<?php echo e(asset('storage/' . $row->company->user->banner)); ?>" alt="profile-img"
                                    class="user_banner img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(asset('dashboard/images/Company.png')); ?>" alt=""
                                    class="user_banner img-fluid">
                            <?php endif; ?>
                            <?php if($row->company->logo != null): ?>
                                <img src="<?php echo e(isset($row->company->logo) ? asset('storage/' . $row->company->logo) : asset('images/profile-img.png')); ?>"
                                    alt="profile-img" class="user_logo">
                            <?php else: ?>
                                <img src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>" alt="profile-img"
                                    class="user_logo">
                            <?php endif; ?>
                            <div class="text-center px-3 pb-4 my-auto">
                                <h2 class="title"><a
                                        href="<?php echo e(route('job.details', $row->company->slug)); ?>"><?php echo e($row->company->name); ?></a>
                                </h2>
                                <p class="job_type mb-3"><?php echo e($row->company->type); ?></p>
                                
                                <?php
                                    $posted_jobs = App\Models\Posts::where('status', 1)
                                        ->where('comp_id', $row->company->id)
                                        ->where('expiry_date', '>=', \Carbon\Carbon::today())
                                        ->count();

                                ?>
                                <?php if($posted_jobs > 0): ?>
                                    <p class="job_type">
                                        Open Jobs - (<?php echo e($posted_jobs); ?>)
                                    </p>
                                <?php else: ?>
                                    
                                    <p class="job_type">No Open Jobs</p>
                                <?php endif; ?>
                                <div class="row row-cols-2 button gx__0 gy-3">
                                    <div class="col">
                                        <a href="<?php echo e(route('job.details', $row->company->slug)); ?>"
                                            class="view_profile_button d-block w-100 text-center">View
                                            Profile</a>
                                    </div>
                                    <?php if($row->status == 1): ?>
                                        
                                        <div class="col message__button__mt-0">
                                            <open-box :openBoxFunction="openBox"
                                                :id="<?php echo e($row->company->user->id); ?>"></open-box>
                                        </div>
                                        
                                    <?php else: ?>
                                        <div class="col">
                                            <a href="<?php echo e(route('recruiters.accept', $row->id)); ?>"
                                                class="view_profile_button d-block w-100 text-center">Accept</a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="view_profile_button d-block w-100 text-center"
                                                data-bs-toggle="modal"
                                                data-bs-target="#newModal<?php echo e($row->id); ?>">Ignore</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="newModal<?php echo e($row->id); ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body py-md-4 py-3">
                                    <p class="text-center fs-4" style="font-weight:600;">Are you really want
                                        to
                                        delete?
                                    </p>
                                </div>
                                <div class="modal-footer border-0 justify-content-center">
                                    <a class="btn btn-danger" id="delete-edu"
                                        href="<?php echo e(route('recruiters.reject', $row->id)); ?>">Yes</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($checkNullNew == 0): ?>
                <div class="">
                    No Recruiters are in connection. <a href="<?php echo e(route('recruiter.list')); ?>">Connect
                        recruiters</a>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <h3>Your are not connected to any Employer</h3>
        <?php endif; ?>
    </div>
    </div>
    
    
    
    

    


    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('recruterpanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/recruterpanel/pages/company/index.blade.php ENDPATH**/ ?>