

<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  
  <div class="col-xl-9 col-lg-8 col-md-7">
    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="d-flex aling-items-center">
        <h2 class="fw-500 text_primary fs-5 align-self-center">All Job Applications List</h2>
        
        <?php if(session('error')): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo e(session('error')); ?>

          </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo e(session('success')); ?>

          </div>
        <?php endif; ?>
      </div>
      <?php if(session($key ?? 'status')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo session($key ?? 'status'); ?>

        </div>
      <?php endif; ?>
      <div class="table table-border table-responsive">
        <table id="example" class="table table-striped table-payment display nowrap dataTable no-footer"
          style="width:100%">
          <thead>
            <tr>
              <th class="set-width-table-1">#</th>
              <th class="set-width-table-2">Title</th>
              <th class="set-width-table-2">Job Type</th>
              <th class="set-width-table-3">Experience</th>
              <th class="set-width-table-2">Status</th>
              <th class="set-width-table-3">Assigned Test</th>
              <th class="set-width-table-1">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($apps) > 0): ?>
              <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="set-width-table-1"><?php echo e(++$key); ?>. </td>
                  <td><?php echo e($row->post->post); ?></td>
                  <td class="set-width-table-2"><?php echo e($row->post->job_type); ?></td>
                  <td class="set-width-table-3"><?php echo e($row->post->experience); ?></td>
                  <td class="set-width-table-2">
                    <?php if(isset($row->result)): ?>
                      <?php if($row->result->status == 'fail'): ?>
                        <p class="text-danger" style="color:#fff;">Failed</p>
                      <?php else: ?>
                        <p class="text-success" style="color:#fff;">Success</p>
                      <?php endif; ?>

                      
                    <?php else: ?>
                      <p class="text-danger" style="color:#fff;">Pending</p>
                    <?php endif; ?>
                  </td>
                  <td class="set-width-table-3">
                    
                    <?php
                      $class = $row->getSingleClass($row->class_id);
                      $qstest = $row->qst($row->qst_id);
                      $candidate_id = App\Models\User::where('id',Auth::user()->id)->value('new_user_id');
                      $attempt = App\Models\ExamResult::where('job_application_id',$row->id)->where('condidate_id',$candidate_id)->first();

                    ?>
                    
                    <?php if($row->status == 0 && $row->qst_id == '0'): ?>
                      <p class="text-danger" style="color:#fff;">Not Assigned</p>
                    <?php elseif($row->status == 2 && $row->qst_id == '0'): ?>
                      <p class="text-success" style="color:#fff;">Hired</p>
                    <?php elseif($row->status == 2 && $row->qst_id != '0'): ?>
                      <p class="text-success" style="color:#fff;">Hired</p>
                    <?php else: ?>
                      <?php if(isset($attempt) == true): ?>
                        <p class="text-success" style="color:#fff;">Given</p>
                      <?php else: ?>
                        <?php if($row->status == 0 && $row->qst_id > 0): ?>
                          <span ID="display5" style="">
                            <table>
                              
                              
                              <tr>
                                <td align="center">
                                  <font class="btn btn_viewall" STYLE="cursor: pointer"
                                    <?php if($row->qst_id != '0'): ?> onClick="openWindow1('<?php echo e($key); ?>')" <?php endif; ?>
                                    size="-1">
                                    Start
                                  </font>
                                </td>
                              </TR>
                            </TABLE>
                          </span>
                          <form method="POST" name="form<?php echo e($key); ?>" action="<?php echo e(route('candidate.test.start')); ?>"
                            id="form<?php echo e($key); ?>" target="_blank">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="qst" value="<?php echo e($row->qst_id); ?>">
                            <input type="hidden" name="jobApplication" value="<?php echo e($row->id); ?>">
                          </form>
                        <?php else: ?>
                          <p class="text-danger" style="color:#fff;">Not Assigned</p>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                  <td class="set-width-table-1">
                    <a href="<?php echo e(route('job.listing.details', $row->post->slug)); ?>" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="View" class="btn btn_viewall" style='font-size: 14px;'>
                      <i class="fa fa-eye"></i>
                    </a>
                    
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <tr>
                <td colspan="7" align="center">No data available</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
  <script type="text/javascript">
    function openWindow1(display) {
      if (confirm("You are about to begin'. \n\nClick Submit Test when you are done.")) {
        let form = document.getElementById('form' + display);
        form.submit()
      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/candidatepanel/pages/jobApplications/index.blade.php ENDPATH**/ ?>