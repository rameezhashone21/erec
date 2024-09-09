

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
        <div class="dashboard_content bg-white rounded_10 p-4">
            <h2 class="fw-500 text_primary fs-5 mb-4">My Candidates</h2>
            <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 gy-lg-5 gy-4 gx-2" id="msg-btn">
                <?php if(count($can) > 0): ?>
                    <?php $__currentLoopData = $can; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <div class="new_candidate_box">
                                <?php if($row->candidate->user->avatar != null): ?>
                                    <img src="<?php echo e(asset('public/storage/' . $row->candidate->user->avatar)); ?>"
                                        alt="profile-img" class="profile img-fluid">
                                    
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/profile-img.png')); ?>" alt="profile-img"
                                        class="profile img-fluid">
                                <?php endif; ?>
                                <div class="content">
                                    <div class="user__info">
                                        <h3 class="title">
                                            <?php echo e($row->candidate->first_name . ' ' . $row->candidate->last_name); ?>

                                        </h3>
                                        <?php if($row->candidate->head_line != null): ?>
                                            <p class="designation">
                                                <?php echo \Illuminate\Support\Str::limit($row->candidate->head_line, 25, $end = '...'); ?>

                                            </p>
                                        <?php else: ?>
                                            <p class="designation"></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="<?php echo e(route('candidate.detail', $row->candidate->slug)); ?>"
                                                class="d-flex aling-items-center button">
                                                <span>
                                                    View Profile
                                                </span>
                                                <span>
                                                    <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" width="16.997"
                                                        height="9.916" viewBox="0 0 16.997 9.916">
                                                        <path id="Path_3242" data-name="Path 3242"
                                                            d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                            transform="translate(6.831 -10.123)" fill="#007ba7"
                                                            fill-rule="evenodd"></path>
                                                        <path id="Path_3243" data-name="Path 3243"
                                                            d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                            transform="translate(-5.625 -12.625)" fill="#007ba7"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div>
                                            <open-box :openBoxFunction="openBox":id="<?php echo e($row->candidate->user->id); ?>"></open-box>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-12">
                        No data available
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/companypanel/pages/candidate/index.blade.php ENDPATH**/ ?>