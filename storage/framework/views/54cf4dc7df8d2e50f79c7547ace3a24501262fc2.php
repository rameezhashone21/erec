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
                    <a href="<?php echo e(route('company.markNotificationsRead')); ?>" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Mark as all read</a>
                </div>
            </div>
            
            <?php if(session('message')): ?>
            <div id="flash-message" class="alert alert-success">
                <?php echo e(session('message')); ?>

                <button type="button" class="close" aria-label="Close" onclick="closeMessage()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <?php
            $notifications = App\Models\ExamNotification::latest('id','asc')->where('receiver_id',Auth::user()->id)->take(5)->get();
            $unread_notifications_count = App\Models\ExamNotification::latest('id','asc')->where('read',0)->where('receiver_id',Auth::user()->id)->take(5)->get();
            ?>
            
            
            
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $job = App\Models\Posts::where('id',$notification->job_id)->first();
                $sender_name = App\Models\User::where('id',$notification->sender_id)->value('name');
                $sender_image = App\Models\User::where('id',$notification->sender_id)->value('avatar');
                $date = \Carbon\Carbon::parse($notification->created_at);
            ?>
            
            <?php if($notification->read == 0): ?> 
            <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                <a href="<?php echo e(route('company.job.applicantsById', ['id' => $notification->job_id, 'notification_id' => $notification->id])); ?>" class="notifications__wrapper unread">
            <?php else: ?>
                <a href="<?php echo e(route('company.recruiters.notification', ['notification_id' =>$notification->id])); ?>" class="notifications__wrapper unread">
            <?php endif; ?>                
            <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="<?php echo e(asset('storage/'.$sender_image)); ?>" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                            <div>
                                <span class="title fw-bold text-dark"><?php echo e($job->post); ?></span>
                            </div>
                            <?php else: ?>
                            <div>
                                <span class="title fw-bold text-dark"><?php echo e($sender_name); ?></span>
                            </div>
                            <?php endif; ?>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        <?php echo e($date->diffForHumans()); ?>

                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            <?php echo e($notification->content); ?>

                        </p>
                    </div>
                </div>
            </a>
            <?php else: ?>
            <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                <a href="<?php echo e(route('company.job.applicantsById', ['id' => $notification->job_id, 'notification_id' => $notification->id])); ?>" class="notifications__wrapper">
            <?php else: ?>
                <a href="<?php echo e(route('company.recruiters.notification', ['notification_id' =>$notification->id])); ?>" class="notifications__wrapper">
            <?php endif; ?>
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="<?php echo e(asset('storage/'.$sender_image)); ?>" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <?php if($notification->status == "exam_status" || $notification->status == "job_apply"): ?>
                            <div>
                                <span class="title fw-bold text-dark"><?php echo e($job->post); ?></span>
                            </div>
                            <?php else: ?>
                            <div>
                                <span class="title fw-bold text-dark"><?php echo e($sender_name); ?></span>
                            </div>
                            <?php endif; ?>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        <?php echo e($date->diffForHumans()); ?>

                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            <?php echo e($notification->content); ?>

                        </p>
                    </div>
                </div>
            </a>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            


            
        </div>
    </div>
    

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/companypanel/pages/notifications/index.blade.php ENDPATH**/ ?>