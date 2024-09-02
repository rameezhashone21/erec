 <?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('content'); ?>

  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
      
      <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-xl-0 gy-3">
        <a href="<?php echo e(route('candidates.job.index')); ?>">
          <div class="col">
            <div class="progress_card p-4 first_div">
              <h3 class="text-white fw-bold">Applications Sent</h3>
              <h4 class="text-white fs-1 fw-bold"><?php echo e(count($apps)); ?></h4>
            </div>
          </div>
        </a>
        <a href="<?php echo e(route('candidates.cvList')); ?>">
          <div class="col">
            <div class="progress_card p-4 second_div">
              <h3 class="text-white fw-bold">My Documents</h3>
              <h4 class="text-white fs-1 fw-bold"><?php echo e(count($docs)); ?></h4>
            </div>
          </div>
        </a>
        <a href="<?php echo e(route('candidates.saved.jobs')); ?>">
          <div class="col">
            <div class="progress_card p-4 third_div">
              <h3 class="text-white fw-bold">Save Jobs</h3>
              <h4 class="text-white fs-1 fw-bold"><?php echo e(count(auth()->user()->wishlistCount)); ?></h4>
            </div>
          </div>
        </a>
      </div>
      <div class="d-flex aling-items-center my-3">
        <h2 class="fw-500 text_primary fs-5 align-self-center">Recent Jobs</h2>
        <a href="<?php echo e(route('job.browse')); ?>" class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">View all</a>
      </div>
      <div class="px-2">
        <?php if(count($post) > 0): ?>
          <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="theme_box_2 p-4 mb-4 recentlyPostedJobsContent">
              <div class="row align-items-center">
                <div class="col-md-2 text-center">
                  <img src="<?php echo e(asset('storage/' . $row->banner)); ?>" alt="" class="candidate_thumb rounded-50">
                </div>
                <div class="col-md-7">
                  <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>"><span
                      class="title fw-bold text-dark"><?php echo e($row->post); ?></span></a>
                  <p class="fs-14 mb-4 mt-2">
                    <?php echo \Illuminate\Support\Str::limit($row->description, 200, $end = '...'); ?>

                  </p>

                </div>
                <div class="col-md-3">
                  
                  
                  <?php if(auth()->check() && auth()->user()->candidate != null): ?>
                    <?php if(auth()->user()->role == 'user'): ?>
                      <?php if($row->jobApp == '[]'): ?>
                        <a class="btn_box_1 px-xl-4 open-apply-modal px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center"
                          id="<?php echo e($row->id); ?>" href="javascript:;">Apply
                          Now</a>
                      <?php else: ?>
                        <button disabled="" style="opacity: 0.5;"
                          class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center" id="18"
                          href="javascript:;">Applied</button>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php elseif(auth()->user()->role == 'company' && auth()->user()->role == 'rec'): ?>
                    <a class="btn default-btn  mb-3" href="<?php echo e(route('job.session')); ?>">Apply
                      Now</a>
                  <?php endif; ?>

                  <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>"
                    class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center">View
                    Details</a>
                </div>
                <div class="col-md-10 offset-md-2">
                  <ul class="d-flex flex-md-row flex-column align-items-lg-center " style="gap:14px;">
                    <li class=" fs-14">
                      <i class="fa-solid fa-calendar me-2 text_grey_999"></i>
                      <span>
                        
                        <?php echo e(\Carbon\Carbon::parse($row->expiry_date)->isoFormat('DD MMM YYYY')); ?>

                      </span>
                    </li>
                    <li class=" fs-14 d-flex aling-items-center">
                      <i class="fa-solid fa-location-dot me-2 d-inline-block align-self-center text_grey_999"></i>
                      <span class="shortName d-inline-block">
                        
                        <a href="https://www.google.com/maps/place/<?php echo e($row->location); ?>" target="_blank">
                          <?php echo e($row->location); ?>

                        </a>
                        
                      </span>
                    </li>
                    <li class=" fs-14 d-flex align-items-center">
                      <span class="me-2">Posted by :</span>
                      
                      <span class="text_primary">
                        <?php if($row->recruiter != null): ?>
                          
                          <a
                            href="<?php echo e(route('recruiter.detail', $row->recruiter->slug)); ?>"><?php echo e($row->recruiter->name); ?></a>
                        <?php elseif($row->company != null): ?>
                          
                          <a href="<?php echo e(route('job.details', $row->company->slug)); ?>"><?php echo e($row->company->name); ?></a>
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
          <p>Currently no job available that matches your skills</p>
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

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/candidatepanel/pages/index.blade.php ENDPATH**/ ?>