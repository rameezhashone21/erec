 <?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <div class="d-flex aling-items-center my-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center">Saved Jobs</h2>
                
            </div>
            <div class="px-1">
                <?php if(count($post) > 0): ?>
                    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="theme_box_2 p-4 mb-4 recentlyPostedJobsContent">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <?php if($row->post->banner != null): ?>
                                        <img src="<?php echo e(asset('public/storage/' . $row->post->banner)); ?>" alt=""
                                            class="candidate_thumb rounded-50">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7">
                                    <a href="<?php echo e(route('job.listing.details', $row->post->slug)); ?>"><span
                                            class="title fw-bold text-dark"><?php echo e($row->post->post); ?></span></a>
                                    <p class="fs-14 text_grey_999 mb-4 mt-2">
                                        <?php echo \Illuminate\Support\Str::limit($row->post->description, 200, $end = '...'); ?>

                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <?php if(auth()->check() && auth()->user()->candidate != null): ?>
                                        <?php if(auth()->user()->role == 'user'): ?>
                                            <?php if($row->post->jobApp == '[]'): ?>
                                                <a class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center open-apply-modal"
                                                    id="<?php echo e($row->post->id); ?>" href="javascript:;">Apply
                                                    Now</a>

                                                
                                            <?php else: ?>
                                                <button disabled="" style="opacity: 0.5;"
                                                    class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center"
                                                    id="18" href="javascript:;">Applied</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php elseif(auth()->user()->role == 'company' && auth()->user()->role == 'rec'): ?>
                                        <a class="btn default-btn mb-3" href="<?php echo e(route('job.session')); ?>">Apply
                                            Now</a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('job.listing.details', $row->post->slug)); ?>"
                                        class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center">View
                                        Details</a>
                                    
                                    
                                </div>
                                <div class="col-md-10 offset-md-2">
                                    <ul class="d-flex flex-md-row flex-column align-items-lg-center" style="gap:14px;">
                                        <li class="text_grey_999 fs-14">
                                            <i class="fa-solid fa-calendar me-2"></i>
                                            <span><?php echo e($row->post->expiry_date); ?></span>
                                        </li>
                                        <li class="text_grey_999 fs-14 d-flex align-items-center">
                                            <i class="fa-solid fa-location-dot me-2"></i>
                                            <span class="shortName d-inline-block"><?php echo e($row->post->location); ?></span>
                                        </li>
                                        <li class="text_grey_999 fs-14 d-flex align-items-center">
                                            <span class="me-2">Posted by :</span>
                                            
                                            <span class="text_primary">
                                                <?php if($row->post->rec_id != 0): ?>
                                                    <?php if($row->post->recruiter): ?>
                                                        <?php echo e($row->post->recruiter->name); ?>

                                                    <?php else: ?>
                                                        Recruiter not available
                                                    <?php endif; ?>
                                                <?php elseif($row->post->comp_id != 0): ?>
                                                    <?php if($row->post->company): ?>
                                                        <?php echo e($row->post->company->name); ?>

                                                    <?php else: ?>
                                                        Company not available
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center mt-5">
                        <a href="#" class="btn_viewall fw-500 px-4 py-2" id="loadMore">Load
                            More</a>
                    </div>
                <?php else: ?>
                    <p>You
                        have not saved any job yet.
                        <a href="<?php echo e(route('job.browse')); ?>" class="text-dark text-decoration-underline">
                            Start saving
                            now!</a>
                    </p>
                <?php endif; ?>
                
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
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Documents\erec\resources\views/candidatepanel/pages/savedJobs.blade.php ENDPATH**/ ?>