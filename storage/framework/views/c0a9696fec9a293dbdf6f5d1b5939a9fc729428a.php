

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
      <div class="heading">
        <h3 class="fw-500 text_primary fs-5 mb-4">Update Exam</h3>

        <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
              <?php echo e($error); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <form class="dashboard-form needs-validation" method="post"
        action="<?php echo e(route('company.exam.update', ['id' => $exam->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Title*</label>
              <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="title" required
                value="<?php echo e($exam->exam_title); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group set-cross-icon" id="criteria">
              <label for="exam-time" class="form-label fs-14 text-theme-primary fw-bold">Time in
                minutes</label>
              <select name="exam_time" class="select2-multiple form-control fs-14 h-50px" id="exam-time">
                <option selected disabled value="">Select exam completion time</option>
                <option value="30"<?php if($exam->exam_completion_in_minutes == 30): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>30 minutes</option>
                <option value="45"<?php if($exam->exam_completion_in_minutes == 45): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>45 minutes</option>
                <option value="60"<?php if($exam->exam_completion_in_minutes == 60): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>60 minutes</option>
                <option value="70"<?php if($exam->exam_completion_in_minutes == 70): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>70 minutes</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Total questions show to
                condidate*</label>
              <input type="number" autocomplete="off" class="form-control fs-14 h-50px" name="question_showto_condidate"
                value="<?php echo e($exam->question_showto_condidate); ?>" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group set-cross-icon" id="criteria">
              <label for="status" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
              <select name="status" class="select2-multiple form-control fs-14 h-50px" id="status">
                <option selected disabled value="">Select exam status</option>
                <option value="0"<?php if($exam->status == 0): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Deactive</option>
                <option value="1"<?php if($exam->status == 1): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Active</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                Update
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/companypanel/pages/exam/edit.blade.php ENDPATH**/ ?>