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
      <div class="d-flex aling-items-center">
        <h2 class="fw-500 text_primary fs-5 align-self-center">All Job Applications</h2>
      </div>
      <div class="table table-border table-responsive">
        <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Post</th>
              <th>Candidate</th>
              <th>Assign Test</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($jobApp) > 0): ?>
            <?php $__currentLoopData = $jobApp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($row->post)): ?>
                  <tr>
                    <td><?php echo e(++$key); ?>. </td>
                    <td><?php echo e($row->post->post); ?></td>
                    <td>
                      <a href="<?php echo e(route('candidate.detail', $row->candidate->slug)); ?>">
                        <?php echo e($row->candidate->first_name); ?>

                        <?php echo e($row->candidate->last_name); ?>

                      </a>
                    </td>
                    
                    <td class="jopAssignSelectbox" id="td_id<?php echo e($row->id); ?>">
                      <?php if($row->status == 0): ?>
                        
                        <select name="assign_test" onchange="assign_test(<?php echo e($row->id); ?>)"
                          id="assign_test<?php echo e($row->id); ?>" class="select2-multiple form-control fs-14  h-50px"
                          required>
                          <option selected disabled value="">Select Test</option>
                          <?php $__currentLoopData = $row->test($row->class_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($col['id']); ?>"><?php echo e($col['exam_title']); ?></option>
                            
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      <?php else: ?>
                      
                        <?php if($row->qst_id != '0'): ?>
                          <p><?php echo e($row->qst($row->qst_id)); ?></p>
                        <?php endif; ?>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($row->status == 0): ?>
                        <button role="button" id="blue_shortlist<?php echo e($row->id); ?>" class="btn btn-success btn-sm">
                          <i class="fa-solid fa-exclamation"></i>
                          Task Not Assigned Yet.
                        </button>
                      <?php elseif($row->status == 1): ?>
                        <button role="button" class="btn btn-success btn-sm">
                          <i class="fa fa-check" id="green_shortlist<?php echo e($row->id); ?>" style="font-size:18px"></i>
                          Shortlist
                        </button>
                      <?php endif; ?>
                    </td>
                  </tr>
                  
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <tr>
                <td colspan="6" allign="center" class="text-center">No data available</td>
              </tr>
            <?php endif; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
  <script>
    function assign_test(id) {
      console.log(id);
      var selectedId = document.getElementById("assign_test" + id).value;
      console.log(selectedId);
      url = "<?php echo e(route('company.job.assign')); ?>";
      $.ajax({
          type: 'GET',
          url: url,
          data: {
            'id': id,
            'selectedId': selectedId,
          },
          crossDomain: true,
          // success: function(data) {
          //     console.log(data);
          // }
        }).done(function(data) {
          console.log(data);
          // if(data == 1)
          // {
          //     $('#blue_shortlist'+id).hide();
          $('#green_shortlist' + id).show();
          $('#td_id' + id).html('');
          $('#td_id' + id).html(data);
          $('#td_shortlist' + id).html('');
          $('#td_shortlist' + id).html(
            '<p class="btn btn-success btn-sm"><i class="fa fa-check" style = "font-size:18px"></i> Shortlist</p> '
          );
          successModal("Your Data Has Been Successfully Updated...");
          // }
          // else
          // {

          // }
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);

        });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/companypanel/pages/jobs/jobApplications.blade.php ENDPATH**/ ?>