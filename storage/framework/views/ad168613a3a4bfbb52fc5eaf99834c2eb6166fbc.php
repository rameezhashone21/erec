 <?php $__env->startSection('page_title', 'E-Rec Notifications'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex align-items-center justify-content-between my-3 border-bottom pb-3 mb-4">
                <h2 class="fw-500 text_primary fs-5 mb-3 mb-md-0">Notifications</h2>
                <div>
                    <a href="" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Mark as all read</a>
                </div>
            </div>
            

            
            <a href="" class="notifications__wrapper unread">
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="https://backend.hostingladz.com/webapp/erec/public/storage/banner.png" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div>
                                <span class="title fw-bold text-dark">Alfred laravel job</span>
                            </div>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        5 min ago
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            abc
                        </p>
                    </div>
                </div>
            </a>
            

            
            <a href="" class="notifications__wrapper">
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="https://backend.hostingladz.com/webapp/erec/public/storage/banner.png" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div>
                                <span class="title fw-bold text-dark">Alfred laravel job</span>
                            </div>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        5 min ago
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            abc
                        </p>
                    </div>
                </div>
            </a>
            


            
        </div>
    </div>
    <?php if(session('message')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erec\resources\views/companypanel/pages/notifications/index.blade.php ENDPATH**/ ?>