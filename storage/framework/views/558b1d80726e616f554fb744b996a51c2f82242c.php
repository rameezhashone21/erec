<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- start new box here  -->
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4" id="msg-btn">
            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>
            <h2 class="fw-500 text_primary fs-5 mb-4">My Recruiters</h2>
            <div class="row gy-lg-5 gy-4">
                <div class="col-12">
                    <h2 class="fw-500 text_primary fs-5">New</h2>
                </div>
                
                <?php if(count($rec) > 0): ?>
                    <?php
                        $checkNull = 0;
                    ?>
                    <?php $__currentLoopData = $rec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                            <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id)->status != 1): ?>
                                <?php
                                    $checkNull = 1;
                                ?>
                                
                                
                                
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="new-recruter-box">
                                        <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>">
                                            
                                            <?php if($row->user->banner != null): ?>
                                                <img src="<?php echo e(asset('storage/' . $row->user->banner)); ?>"
                                                    alt="profile-img" class="user_banner img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('dashboard/images/RecruiterSM.png')); ?>" alt=""
                                                    class="user_banner img-fluid">
                                            <?php endif; ?>
                                        </a>
                                        <div class="text-center px-3 pb-4">
                                            <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>">
                                                
                                                <?php if($row->avatar != null): ?>
                                                    <img src="<?php echo e(asset('storage/' . $row->avatar)); ?>"
                                                        alt="profile-img" class="user_logo">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                        alt="profile-img" class="user_logo">
                                                <?php endif; ?>
                                            </a>
                                            <h2 class="title"><a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>"><?php echo e($row->name); ?></a></h2>
                                            <p class="job_type mb-3">No Open Jobs</p>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                                <form class="col" method="get" action="<?php echo e(route('company.accept',['id' => $row->id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="view_profile_button d-block w-100 text-center">Accept</button>
                                                </form>
                                                <form class="col" method="get" action="<?php echo e(route('company.reject',['id' => $row->id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="view_profile_button d-block w-100 text-center">Ignore</button>
                                                </form>
                                            </div>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                                <?php if(auth()->user()->role == 'company'): ?>
                                                    <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                                                    <?php else: ?>
                                                        <div class="col">
                                                            <a href="<?php echo e(route('company.recruiters.send', $row->id)); ?>"
                                                                class="default-btn w-100 text-center">Connect</a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="col">
                                                        <a href="<?php echo e(route('login')); ?>"
                                                            class="default-btn w-100 text-center">Connect</a>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                
                                                    
                                                <div class="col message__button__mt-0" style="margin:0 auto;">
                                                    <open-box :openBoxFunction="openBox"
                                                        :id="<?php echo e($row->user->id); ?>"></open-box>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($checkNull == 0): ?>
                        <div class="">
                            You didn't send any new connection request to the recruiter. <a href="<?php echo e(route('recruiter.list')); ?>">Connect recruiters</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="">
                        You didn't send any new connection request to the recruiter. <a href="<?php echo e(route('recruiter.list')); ?>">Connect recruiters</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row gy-lg-5 gy-4 mt-4">
                <div class="col-12">
                    <h2 class="fw-500 text_primary fs-5">Connected Recruiters</h2>
                </div>
                <?php if(count($rec) > 0): ?>
                    <?php
                        $checkNullNew = 0;
                    ?>
                    <?php $__currentLoopData = $rec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                            <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1): ?>
                                <?php
                                    $checkNullNew = 1;
                                ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="new-recruter-box">
                                        <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>">
                                            
                                            <?php if($row->user->banner != null): ?>
                                                <img src="<?php echo e(asset('storage/' . $row->user->banner)); ?>"
                                                    alt="profile-img" class="user_banner img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('dashboard/images/RecruiterSM.png')); ?>" alt=""
                                                    class="user_banner img-fluid">
                                            <?php endif; ?>
                                        </a>
                                        <div class="text-center px-3 pb-4">
                                            <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>">
                                                
                                                <?php if($row->avatar != null): ?>
                                                    <img src="<?php echo e(asset('storage/' . $row->avatar)); ?>"
                                                        alt="profile-img" class="user_logo">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                        alt="profile-img" class="user_logo">
                                                <?php endif; ?>
                                            </a>
                                            <h2 class="title"><?php echo e($row->name); ?></h2>
                                            <p class="job_type mb-3">No Open Jobs</p>
                                            <div class="row row-cols-2 button gx__0 gy-3">
                                                <?php if(auth()->user()->role == 'company'): ?>
                                                    <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                                                        <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1): ?>
                                                            
                                                            
                                                            
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div class="col">
                                                            <a href="<?php echo e(route('company.recruiters.send', $row->id)); ?>"
                                                                class="default-btn w-100 text-center">Connect</a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="col">
                                                        <a href="<?php echo e(route('login')); ?>"
                                                            class="default-btn w-100 text-center">Connect</a>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                
                                                
                                                <div class="col">
                                                    <div>
                                                        <?php if(Auth::check()): ?>
                                                            
                                                            <?php if(auth()->user()->role == 'company'): ?>
                                                                <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                                                                    <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1): ?>
                                                                        <a href="<?php echo e(route('delRelation', [$row->id, auth()->user()->company->id])); ?>"
                                                                            class="view_profile_button d-block w-100 text-center">
                                                                            <i class="fas fa-user-plus me-1"></i>
                                                                            Unfollow</a>
                                                                    <?php endif; ?>
                                                                    
                                                                <?php endif; ?>
                                                                
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    </a>
                                                </div>
                                                <div class="col message__button__mt-0">
                                                    <open-box :openBoxFunction="openBox"
                                                        :id="<?php echo e($row->user->id); ?>"></open-box>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($checkNullNew == 0): ?>
                        <div class="">
                            No Recruiters are in connection. <a href="<?php echo e(route('recruiter.list')); ?>">Connect recruiters</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="">
                        No Recruiters are in connection. <a href="<?php echo e(route('recruiter.list')); ?>">Connect recruiters</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
    </div>
    <!-- end new box here  -->
    
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/companypanel/pages/request/index.blade.php ENDPATH**/ ?>