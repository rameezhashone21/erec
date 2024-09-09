

<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<?php $__env->stopSection(); ?>

<style>
    /* HTML: <div class="loader"></div> */
    .loader_hired {
          width: 50px;
          aspect-ratio: 1;
          border-radius: 50%;
          padding: 6px;
          background:
            conic-gradient(from 135deg at top,currentColor 90deg, #0000 0) 0 calc(50% - 4px)/17px 8.5px,
            radial-gradient(farthest-side at bottom left,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) top right/50%  50% content-box content-box,
            radial-gradient(farthest-side at top        ,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) bottom   /100% 50% content-box content-box;
          background-repeat: no-repeat;
          animation: l11 1s infinite linear;
        }
        @keyframes  l11{ 
          100%{transform: rotate(1turn)}
        }
        .loader_hired_container {
            background-color: #00000059;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
      
        }  
    </style>

<?php $__env->startSection('content'); ?>
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-flex aling-items-center mb-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center">Job Post Details</h2>
            </div>
            <ul class='row row-cols-md-4 row-cols-1 g-0 job_detail_links'>
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
            <div id="hired_loader" class='loader_hired_container d-none justify-content-center align-items-center'> 
            <div class='loader_hired'> </div> 
            </div>
            <div class="table table-border table-responsive">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. #</th>
                            <th>Candidate Name</th>
                            <th>Candidate Docs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($job)): ?>
                            <?php if(count($job->jobAppRecComp) > 0): ?>
                                <?php $__currentLoopData = $job->jobAppRecComp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$key); ?>. </td>
                                        <td><?php echo e($row->candidate->first_name); ?> <?php echo e($row->candidate->last_name); ?></td>
                                        <td>
                                            <?php if($row->candidateDocument != null): ?>
                                                <?php if($row->candidateDocument->document != null): ?>
                                                    <a href="<?php echo e(asset('candidateDoc/doc/' . $row->candidateDocument->document)); ?>"
                                                        target="_blank" class='text-decoration-underline d-flex text-dark'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.5"
                                                            height="27.5" viewBox="0 0 27.5 27.5">
                                                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                                                                <path id="Path_3217" data-name="Path 3217"
                                                                    d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                                                    transform="translate(-3.143 -2)" fill="#8b91a7" />
                                                                <path id="Path_3218" data-name="Path 3218"
                                                                    d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                                                    transform="translate(-1.857 -2)" fill="#8b91a7" />
                                                                <path id="Path_3219" data-name="Path 3219"
                                                                    d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                                                    transform="translate(-0.571 -2)" fill="#8b91a7" />
                                                                <path id="Path_3220" data-name="Path 3220"
                                                                    d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                                                    transform="translate(0)" fill="#8b91a7" />
                                                            </g>
                                                        </svg>
                                                        <span class='align-self-end ms-1'>
                                                            Click to view
                                                            
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                Candidate has removed their Resume
                                            <?php endif; ?>
                                        </td>
                                        <td id="hireTr-<?php echo e($row->id); ?>">
                                        <?php if($row->status == 2): ?>
                                        <p>Hired</p>
                                        <?php elseif($row->status == 1): ?>
                                        <input type="radio" class="btn-check" name="setStatus<?php echo e($row->id); ?>"
                                            value="2" autocomplete="off" id="setStatus1">
                                            <label class="btn btn-outline-primary fs-14" for="hire<?php echo e($row->id); ?>"
                                            onclick="hireStatus('<?php echo e($row->id); ?>')">Hire</label>
                                            

                                            <!-- <input type="radio" class="btn-check" name="setStatus<?php echo e($row->id); ?>"
                                            value="5" autocomplete="off" id="setStatus2">
                                            <label class="btn btn-outline-primary fs-14" for="reject<?php echo e($row->id); ?>"
                                            onclick="rejectStatus('<?php echo e($row->id); ?>')">Reject</label> -->
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>

<script>
    function hireStatus(value) {

      var element = document.getElementById('hired_loader');
      element.classList.remove('d-none');
      element.classList.add('d-flex');
      
      var url = '<?php echo e(route('hireReject.candidate.comp')); ?>';
      var status = $('#setStatus1').val();
      var statText = "";

      console.log(status)

      if (status == 1) {
        statText = "Hired";
      } else if (status == 5) {
        statText = "Rejected";
      }
      

      $.ajax({
        type: 'POST',
        url: url,
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          id: value,
          status: status
        },
        crossDomain: true,
        success: function(data) {
          console.log(data);
        }
      }).done(function() {

        var element = document.getElementById('hired_loader');
        element.classList.remove('d-flex');
        element.classList.add('d-none');

        var f = $('#hireTr-' + value).html('<p class="p-2 disabled" disabled> Hired </p>');
        
         console.log(f)
        
        successModal(statText + "...");
      });
    }
    
    function rejectStatus(value) {
      
      var url = '<?php echo e(route('hireReject.candidate.comp')); ?>';
      var status = $('#setStatus2').val();
      var statText = "";
      
      console.log(status)

      if (status == 1) {
        statText = "Hired";
      } else if (status == 5) {
        statText = "Rejected";
      }

      $.ajax({
        type: 'POST',
        url: url,
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          id: value,
          status: status
        },
        crossDomain: true,
        success: function(data) {
          console.log(data);
        }
      }).done(function() {

        var f = $('#hireTr-' + value).html('<p class=" p-2 disabled" disabled> Rejected</p>');

        successModal(statText + "...");
      });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/companypanel/pages/jobs/jobs_shortlisted.blade.php ENDPATH**/ ?>