<div class="col-xl-3 col-lg-4 col-md-5 sidebar_container
<?php if(Route::is('candidates.cvParser') ||
        Route::is('candidates.cvParser.contact') ||
        Route::is('candidates.cvParser.experience') ||
        Route::is('candidates.cvParser.education') ||
        Route::is('candidates.cvParser.others') ||
        Route::is('candidates.cvParser.skills') ||
        Route::is('candidates.cvParser.about')): ?> d-none <?php endif; ?>">
  <i class="fa-solid fa-xmark side_bar_close d-lg-none"></i>
  <div class="bg-white position-relative rounded_10 h-sm-100per">
    <img src="<?php echo e(asset('dashboard/images/side_bar_top.png')); ?>" alt="" class="img-fluid ">
    <div class="text-center">
      <div class="upload-profile-image mt-minus">
        <form id="upload_form" action="<?php echo e(route('candidates.profile.update')); ?>" enctype="multipart/form-data"
          method="POST">
          <?php echo csrf_field(); ?>
          <label for="profileImage"><i class="fa-solid fa-camera"></i> </label>
          <input type="file" name="avatar" id="profileImage">
          <?php if(isset(auth()->user()->candidate)): ?>
            <?php if(auth()->user()->avatar != null): ?>
              <img class="side_bar_author rounded-50 " src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>"
                alt="">
            <?php else: ?>
              <img class="side_bar_author rounded-50 " src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                alt="">
            <?php endif; ?>
          <?php else: ?>
            <img class="side_bar_author rounded-50 " src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
              alt="">
          <?php endif; ?>
        </form>
      </div>
      <h3 class="fs-5 fw-600 text_primary px-3 mb-2">
        <?php echo e(auth()->user()->candidate->first_name); ?>

        <?php echo e(\Illuminate\Support\Str::limit(auth()->user()->candidate->last_name, 20, $end = '...')); ?>

      </h3>
      <p class="mb-2 fs-14 px-3">
        
        <?php if(auth()->user()->candidate->tagline != null): ?>
          <?php echo e(\Illuminate\Support\Str::limit(auth()->user()->candidate->tagline, 50, $end = '...')); ?>

        <?php else: ?>
          <?php echo e(\Illuminate\Support\Str::limit(auth()->user()->candidate->head_line, 50, $end = '...')); ?>

        <?php endif; ?>
      </p>
      <p class="mb-2 fs-14 px-3">
        <?php
        $user = auth()->user();
        if (isset($user->candidatePro) && count($user->candidatePro) > 0) {
            $pro = $user->candidatePro->first();
            // echo $pro->designation . '<br>' . $pro->company_name . '<br>' . auth()->user()->email . '<br>' . auth()->user()->candidate->country_code . auth()->user()->candidate->number;
            echo $pro->designation;
        }
        ?>
      </p>
      <p class="mb-2 px-3 fs-14 fw-bolder">Profile: Candidate</p>

    </div>
    <div class="px-4 d-flex my-3 align-items-center">
      <label for="" class="me-auto text_grey_999 fs-14">
        Open to work
      </label>
      <div class="form-check form-switch ">
        <input class="form-check-input" type="checkbox" <?php if(auth()->user()->candidate->status == 1): ?> checked <?php endif; ?>
          value="<?php echo e(auth()->user()->candidate->status); ?>" onchange="status(<?php echo e(auth()->user()->candidate->status); ?>)"
          id="flexSwitchCheckChecked">
      </div>
    </div>

    <ul class="side_bar_menu" id="side_bar_dashboard">
      <li <?php if(Route::is('candidate.dashboard')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo e(route('candidate.dashboard')); ?>"
          <?php if(Route::is('candidate.dashboard')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
          <img src="<?php echo e(asset('dashboard/images/dashboard.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/dashboard-2.png')); ?>" alt="" class="me-4 two">
          <span>Dashboard</span>
        </a>
      </li>
      <li class="collapse_button_parent d-flex justify-content-between align-items-center">
        
        <a class="d-flex align-items-center" href="<?php echo e(route('candidates.details.view')); ?>"
          <?php if(Route::is('candidates.details.view')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>

          <img src="<?php echo e(asset('dashboard/images/Profile.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/Profile-1.png')); ?>" alt="" class="me-4 two">
          <span>My Profile</span>
        </a>
        <span class="mx-auto not_collapsed collapsed" data-bs-toggle="collapse" href="#myProfile" role="button"
          aria-expanded="false" aria-controls="myProfile">
          <i class="fa-solid fa-plus"></i>
          <i class="fa-solid fa-minus"></i>
        </span>
        

        
      </li>
      <li class="collapse_items">
        <ul class="collapse" id="myProfile">
          <li>
            <a href="<?php echo e(route('candidates.education.view')); ?>"
              <?php if(Route::is('candidates.education.view')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
              <img src="<?php echo e(asset('dashboard/images/suitcase.png')); ?>" alt="" class="three me-4">
              <img src="<?php echo e(asset('dashboard/images/suitcase-white.png')); ?>" alt="" class="four me-4">
              <span>Education Details</span>
            </a>
          </li>
          <li>
            <a href="<?php echo e(route('candidates.profession.view')); ?>"
              <?php if(Route::is('candidates.profession.view')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
              <img src="<?php echo e(asset('dashboard/images/companies-av.png')); ?>" alt="" class="three me-4">
              <img src="<?php echo e(asset('dashboard/images/companies-av-white.png')); ?>" alt="" class="four me-4">
              <span>Professional Details</span>
            </a>
          </li>
          <li>
            <a href="<?php echo e(route('candidates.profile.view')); ?>"
              <?php if(Route::is('candidates.profile.view')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
              <img src="<?php echo e(asset('dashboard/images/edit.png')); ?>" alt="" class="three me-4">
              <img src="<?php echo e(asset('dashboard/images/edit-2.png')); ?>" alt="" class="four me-4">
              <span>Profile Settings</span>
            </a>
          </li>
        </ul>
      </li>
      
      
      
      <li>
        <a href="<?php echo e(route('candidates.cvList')); ?>"
          <?php if(Route::is('candidates.cvList')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
          <img src="<?php echo e(asset('dashboard/images/CV.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/CV-1.png')); ?>" alt="" class="me-4 two">
          <span>My Resumes</span>
        </a>
      </li>
      <li>
        <a href="<?php echo e(route('candidates.cvParser')); ?>"
          <?php if(Route::is('candidates.cvParser')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
          <img src="<?php echo e(asset('dashboard/images/CV.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/CV-1.png')); ?>" alt="" class="me-4 two">
          <span>Digital CV Builder</span>
        </a>
      </li>
      
      <li <?php if(Route::is('candidates.job.index')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo e(route('candidates.job.index')); ?>"
          <?php if(Route::is('candidates.job.index')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
          <img src="<?php echo e(asset('dashboard/images/application.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/application-white.png')); ?>" alt="" class="me-4 two">
          <span>My Job Applications</span>
        </a>
      </li>
      <li <?php if(Route::is('candidates.saved.jobs')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo e(route('candidates.saved.jobs')); ?>"
          <?php if(Route::is('candidates.saved.jobs')): ?> class="d-flex align-items-center active" <?php else: ?> class="d-flex align-items-center" <?php endif; ?>>
          <img src="<?php echo e(asset('dashboard/images/application.png')); ?>" alt="" class="me-4 one">
          <img src="<?php echo e(asset('dashboard/images/application-white.png')); ?>" alt="" class="me-4 two">
          <span>My Saved Jobs</span>
        </a>
      </li>
    </ul>
    
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function status(value) {
    var url = 0;
    if (value == 1) {
      url = "<?php echo e(route('change.status', 0)); ?>";
    } else {
      url = "<?php echo e(route('change.status', 1)); ?>";
    }
    $.ajax({
      type: 'GET',
      url: url,
      crossDomain: true,
      success: function(data) {
        console.log(data);
      }
    });
  }

  $('#profileImage').change(function(event) {
    $("#upload_form").submit();
  });
  // $('#upload_form').on('submit',function(event) {
  //     // event.preventDefault();
  //     var formdata = ($("#upload_form").serialize());
  //     console.log(formdata);
  //     $.ajax({
  //         url: "<?php echo e(route('candidates.profile.update')); ?>",
  //         method: "POST",
  //         data: formdata,
  //         dataType: 'JSON',
  //         contentType: false,
  //         cache: false,
  //         processData: false,
  //         success: function(data) {
  //             $('#message').css('display', 'block');
  //             $('#message').html(data.message);
  //             $('#message').addClass(data.class_name);
  //             $('#uploaded_image').html(data.uploaded_image);
  //         },
  //         error: function(data) {
  //             console.log("error");
  //             console.log(data);
  //         }
  //     })
  // });
</script>
<?php /**PATH C:\Users\Rameez Ali\Documents\erec\resources\views/candidatepanel/includes/sidebar.blade.php ENDPATH**/ ?>