<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <style>
    .expandable-text {
      overflow: hidden;
      max-height: 3em;
      /* Show only 3 lines initially */
    }

    .show-more-button {
      display: none;
      background-color: #fff;
      color: #000;
      border: 0;
      padding: 0;
      text-decoration: underline
        /* Hide the "Show More" button initially */
    }
  </style>
  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="d-flex aling-items-center mb-3">
        <h2 class="fw-500 text_primary fs-5 align-self-center">Job Post Details</h2>
        
      </div>
      <ul class='row row-cols-md-4 row-cols-1 g-0 job_detail_links mb-3'>
        <li class='col'>
          <a href="<?php echo e(route('company.job.details', $post->slug)); ?>"
            <?php if(Route::is('company.job.details', $post->slug)): ?> class="active" <?php endif; ?>>Job Detail</a>
        </li>
        <li class='col'>
          <a href="<?php echo e(route('company.job.applicants', $post->slug)); ?>"
            <?php if(Route::is('company.job.applicants', $post->slug)): ?> class="active" <?php endif; ?>>Applicants</a>
        </li>
        <li class='col'>
          <a href="<?php echo e(route('company.job.shortlisted', $post->slug)); ?>"
            <?php if(Route::is('company.job.shortlisted', $post->slug)): ?> class="active" <?php endif; ?>>Shortlisted</a>
        </li>
        <li class='col'>
          <a href="<?php echo e(route('company.exam.result', $post->slug)); ?>"
            <?php if(Route::is('company.exam.result', $post->slug)): ?> class="active" <?php endif; ?>>Hired</a>
        </li>
      </ul>
      <h2 class='job-title'>Job Title</h2>
      <h3 class='job-name mb-3'><?php echo e($post->post); ?></h3>
      <img src="<?php echo e(asset('storage/' . $post->banner)); ?>" alt="" class="job-detail-banner">
      <h3 class='fw-500 fs-5 my-3'>Job Description</h3>
      <p class="fs-14 text_grey_999">
        <?php echo $post->description; ?>

      </p>
      <div class="my-4">
        <ul class='row row-cols-xl-3 row-cols-1 gy-4'>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Job Category</h3>
            <p class="fs-14 text_grey_999">
              <?php if($post->getSingleClass($post->class_id) == null): ?>
                Class Not Assigned
              <?php else: ?>
                <?php echo e($post->getSingleClass($post->class_id)['title']); ?>

              <?php endif; ?>
            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Job Type</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->job_type); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Experience</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->experience); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Gender</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->gender); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'> Base Salary</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->offer_salary); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Company Name</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->company->name); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Job Posted Date</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e(\Carbon\Carbon::parse($post->created_at)->isoFormat('DD MMM YYYY')); ?>

            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Job Closing Date</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e(\Carbon\Carbon::parse($post->expiry_date)->isoFormat('DD MMM YYYY')); ?>

              
            </p>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Location</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->location); ?>

            </p>
          </li>
          <!-- this li should be empty -->
          
          <!-- this li should be empty -->
          <li class='col expandable-container'>
            <h3 class='fw-500 fs-5 mb-1 '>Key Responsibility</h3>
            <p class="fs-14 text_grey_999 expandable-text">
              <?php echo $post->key_responsibility; ?>

            </p>
            <button class="show-more-button">Show More</button>
          </li>
          <li class='col'>
            <h3 class='fw-500 fs-5 mb-1'>Qualification</h3>
            <p class="fs-14 text_grey_999">
              <?php echo e($post->qualification); ?>

            </p>
          </li>
          <li class='col expandable-container'>
            <h3 class='fw-500 fs-5 mb-1'>Skills & Experience</h3>
            <p class="fs-14 text_grey_999 expandable-text">
              <?php echo $post->skill_exp; ?>

            </p>
            <button class="show-more-button">Show More</button>
          </li>
        </ul>
      </div>
      <h3 class='fw-500 fs-5 mb-1'>Skills</h3>
      <ul class='tags'>
        <?php $__currentLoopData = $post->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="d-inline-block">
            <a href="javascript:void 0;"><?php echo e($row->name); ?></a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </ul>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
  <script>
    $(document).ready(function() {
      $('.expandable-container').each(function() {
        const $container = $(this);
        const $text = $container.find('.expandable-text');
        const $showMoreButton = $container.find('.show-more-button');

        if ($text[0].scrollHeight > $text[0].clientHeight + 5) {
          $showMoreButton.css('display', 'inline-block');

          $showMoreButton.on('click', function() {
            if ($text.css('max-height') === 'none') {
              $text.css('max-height', '3em'); // Show only 3 lines
              $showMoreButton.text('Show More');
            } else {
              $text.css('max-height', 'none'); // Allow full height
              $showMoreButton.text('Show Less');
            }
          });
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Documents\erec1\resources\views/companypanel/pages/jobs/job_detail.blade.php ENDPATH**/ ?>